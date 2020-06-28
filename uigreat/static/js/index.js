$(document).ready(function(){

	//顶部导航添加样式
	$('.nav>ul>li .sub-menu').addClass('b-a uk-text-left uk-animation-slide-left-small uk-background-default');

	//获取日期
	var myDate = new Date;
	var year = myDate.getFullYear(); //获取当前年
	var mon = myDate.getMonth() + 1; //获取当前月
	var date = myDate.getDate(); //获取当前日
	var week = myDate.getDay();
	var weeks = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
	$(".home-time").html(year + "年" + mon + "月" + date + "日 " + weeks[week]);

	//返回顶部
	$(window).scroll(function(){
		var scroll_top = $(window).scrollTop();
		if(scroll_top>=200){
			$(".gotop").fadeIn();
		}else{
			$(".gotop").fadeOut();
		}
	})
	
	//添加灯箱
	$('.wp-block-gallery').attr( 'uk-lightbox' ,'animation: fade' );
	$('.wp-block-image').attr( 'uk-lightbox' ,'animation: fade' );
	$('.single-content img').parent('a').parent('p').addClass('uk-display-block').attr( 'uk-lightbox' ,'animation: fade' );
	
	//点击加载更多
	$('#pagination a').click(function() {
		$this = $(this);
		$this.addClass('loading').text("正在努力加载..."); //给a标签加载一个loading的class属性，可以用来添加一些加载效果
		var href = $this.attr("href"); //获取下一页的链接地址
		if (href != undefined) { //如果地址存在
			$.ajax({ //发起ajax请求
				url: href, //请求的地址就是下一页的链接
				type: "get", //请求类型是get
				error: function(request) {
					//如果发生错误怎么处理
				},
				success: function(data) { //请求成功
					setTimeout(function(){
						$this.removeClass('loading').text("点击查看更多"); //移除loading属性
						var $res = $(data).find(".ajax-item"); //从数据中挑出文章数据，请根据实际情况更改
						$('.ajax-main').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
						var newhref = $(data).find("#pagination a").attr("href"); //找出新的下一页链接
						if (newhref != undefined) {
							$("#pagination a").attr("href", newhref);
						} else {
							$("#pagination").html('我主题君有底线的！'); //如果没有下一页了，隐藏
						}
					},500);
				}
			});
		}
		return false;
	});

	//点赞
	$.prototype.postLike = function () {
		if ($(this).hasClass('done')) {
			UIkit.notification({
				message: '<i class="iconfont icon-icon-test30"></i> 您已经点过赞了！！！',
				status: 'warning',
			});
			return false;
		} else {
			$(this).addClass('done');
			var id = $(this).data("id"),
				action = $(this).data('action'),
				rateHolder = $(this).children('.count');
			var ajax_data = {
				action: "dotGood",
				um_id: id,
				um_action: action
			};
			$.post("/wp-admin/admin-ajax.php", ajax_data,
				   function (data) {
				$(rateHolder).html(data);
			});
			return false;
		}
	};
	$(".dotGood").click(function () {
		$(this).postLike();
	});
	

});