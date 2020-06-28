<?php

/*
 * ------------------------------------------------------------------------------
 * WordPress添加自定义菜单
 * ------------------------------------------------------------------------------
 */

register_nav_menus(
	array(
		'head-nav' => __( '顶部菜单' ),
		'page-nav' => __( '页面菜单' ),
	)
); 



/*
 * ------------------------------------------------------------------------------
 * WordPress分类描述删除p标签
 * ------------------------------------------------------------------------------
 */

function deletehtml($description) {
	$description = trim($description);
	$description = strip_tags($description,'');
	return ($description);
}
add_filter('category_description', 'deletehtml');



/*
 * ------------------------------------------------------------------------------
 * WordPress分页
 * ------------------------------------------------------------------------------
 */

function fenye(){
	$args = array(
		'prev_next'          => 0,
		'format'       => '?paged=%#%',
		'before_page_number' => '',
		'mid_size'           => 2,
		'current' => max( 1, get_query_var('paged') ),
		'prev_next'    => True,
		'prev_text'    => __('上一页'),
		'next_text'    => __('下一页'),

	);
	$page_arr=paginate_links($args); 
	if ($page_arr) {
		echo $page_arr;
	}else{

	}
}


/*
 * ------------------------------------------------------------------------------
 * 使子分类的category页面渲染父category页面的模板
 * ------------------------------------------------------------------------------
 */
add_filter('category_template', 'f_category_template');
function f_category_template($template){
	$category = get_queried_object();
	if($category->parent !='0'){
		while($category->parent !='0'){
			$category = get_category($category->parent);
		}
	}
	
	$templates = array();
 
	if ( $category ) {
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";
	}
	$templates[] = 'category.php';
	return locate_template( $templates );
}




/*
 * ------------------------------------------------------------------------------
 * WordPress去掉分类链接中的category
 * ------------------------------------------------------------------------------
 */

add_action( 'load-themes.php', 'no_category_base_refresh_rules');
add_action('created_category', 'no_category_base_refresh_rules');
add_action('edited_category', 'no_category_base_refresh_rules');
add_action('delete_category', 'no_category_base_refresh_rules');
function no_category_base_refresh_rules() {
	global $wp_rewrite;
	$wp_rewrite -> flush_rules();
}
add_action('init', 'no_category_base_permastruct');
function no_category_base_permastruct() {
	global $wp_rewrite, $wp_version;
	if (version_compare($wp_version, '3.4', '<')) {
		// For pre-3.4 support
		$wp_rewrite -> extra_permastructs['category'][0] = '%category%';
	} else {
		$wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
	}
}
// Add our custom category rewrite rules
add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
function no_category_base_rewrite_rules($category_rewrite) {
	//var_dump($category_rewrite);// For Debugging
	$category_rewrite = array();
	$categories = get_categories(array('hide_empty' => false));
	foreach ($categories as $category) {
		$category_nicename = $category -> slug;
		if ($category -> parent == $category -> cat_ID)// recursive recursion
			$category -> parent = 0;
		elseif ($category -> parent != 0)
			$category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
		$category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
	}
	// Redirect support from Old Category Base
	global $wp_rewrite;
	$old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
	$old_category_base = trim($old_category_base, '/');
	$category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
	//var_dump($category_rewrite);// For Debugging
	return $category_rewrite;
}
// Add 'category_redirect' query variable
add_filter('query_vars', 'no_category_base_query_vars');
function no_category_base_query_vars($public_query_vars) {
	$public_query_vars[] = 'category_redirect';
	return $public_query_vars;
}
// Redirect if 'category_redirect' is set
add_filter('request', 'no_category_base_request');
function no_category_base_request($query_vars) {
	//print_r($query_vars);// For Debugging
	if (isset($query_vars['category_redirect'])) {
		$catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
		status_header(301);
		header("Location: $catlink");
		exit();
	}
	return $query_vars;
}