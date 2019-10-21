@php
	$headerClass = (!empty($headerClass)) ? $headerClass : 'navbar-transparent';
@endphp
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta name="description" content="@yield('description')">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets-landing/img/favicon/favicon-32x32.png')}}">
	<meta name="author" content="A. S. Shelobaev">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{asset('/assets-landing/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="{{asset('/assets-landing/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('/assets-landing/plugins/animate/animate.min.css')}}" rel="stylesheet">
	<link href="{{asset('/assets-landing/css/one-page-parallax/style.min.css')}}" rel="stylesheet">
	<link href="{{asset('/assets-landing/css/one-page-parallax/style-responsive.min.css')}}" rel="stylesheet">
	<link href="{{asset('/assets-landing/css/one-page-parallax/theme/default.css')}}" id="theme" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('/assets-landing/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	<style type="text/css">
	body {
		font-size: 16px;
	}
	.content .content-desc {
		text-align: center;
		margin-top: -20px;
		margin-bottom: 20px;
		color: #707478;
	}
	.service:nth-child(3n+1) {
		clear: both;
	}
	.newslist-container{
		margin-bottom: 30px;
	}
	.newslist-container:nth-child(3n+1) {
		clear: both;
	}
	.newslist-block .image img{
		max-width: 100%;
		padding-bottom: 15px;
		transition: all .5s ease;
    	-webkit-transition: all .5s ease;
	}
	.newslist-title{
		color: #333;
		margin: 0;
		font-weight: 600;
		padding: 0px 0 4px;
		text-transform: uppercase;
		font-size: 16px;
	}
	.newslist-content{
		padding-bottom: 5px;
		font-size: 15px;
	}
	.newslist-date{
		padding-bottom: 7px;
	}
	.btn-sm{
		padding: 6px 20px;
	}
	.work .desc {
		height: 100%;
		padding: 0;
	}
	.work-cont-desc{
		padding: 10px;
		margin: auto;
		top: 50%;
		position: absolute;
		transform: translateY(-50%);
		-webkit-transform: translateY(-50%);
	}
	.work:hover .desc, .work:focus .desc {
		margin-top: 0;
		height: 100%;
		top: 0;
	}
	.work .desc .desc-title {
		text-align: center;
	}
	.work .desc .desc-text {
		text-align: center;margin-top: 10px;margin-bottom: 10px;
	}
	.work .desc .desc-btn{
		display: block;text-align: center;
	}
	.work .desc .btn.btn-theme.btn-sm{
		
	}
	.pagination > li.active > .page-link {
		color: #fff;
		margin-left: 5px;
		-webkit-border-radius: 3px!important;
		-moz-border-radius: 3px!important;
		border-radius: 3px!important;
	}
	.pagination > li.page-item.disabled span{
		margin-left: 5px;
	}
	.pagination>li:last-child>a, .pagination>li:last-child>span {
		border-top-right-radius: 4px!important;
		border-bottom-right-radius: 4px!important;
	}
	.tableinfooter td {
		padding: 5px 0px;
		vertical-align: top;
	}
</style>
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-fixed-top {{ $headerClass }}">
			<!-- begin container -->
			<div class="container">
				<!-- begin navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{ route('landingHome') }}" class="navbar-brand">
						<span class="brand-logo"></span>
						<span class="brand-text">
							<span class="text-theme"></span>«Software Provider» Ltd
						</span>
					</a>
				</div>
				<!-- end navbar-header -->
				<!-- begin navbar-collapse -->
				<div class="collapse navbar-collapse" id="header-navbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="#home" data-click="scroll-to-target">Главная</a>
						</li>
						<li><a href="#about" data-click="scroll-to-target">О нас</a></li>
						<li><a href="#team" data-click="scroll-to-target">Команда</a></li>
						<li><a href="#service" data-click="scroll-to-target">Услуги</a></li>
						<li><a href="#work" data-click="scroll-to-target">Портфолио</a></li>
						<li><a href="#partners" data-click="scroll-to-target">Партнеры</a></li>
						<li><a href="#news" data-click="scroll-to-target">Новости</a></li>
						<li><a href="#contact" data-click="scroll-to-target">Контакты</a></li>
					</ul>
				</div>
				<!-- end navbar-collapse -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #header -->
		@yield('content')
		<!-- begin #footer -->
		<div id="footer" class="footer">
			<div class="container">
				<p>&copy; Software Provider, 2010-<?=strftime('%Y');?> <br />
					An admin & front end theme with serious impact. Created by <a href="#">SeanTheme</a></p>
				<!-- <p>
					&copy; Copyright Color Admin 2017 <br />
					An admin & front end theme with serious impact. Created by <a href="#">SeanTheme</a>
				</p> -->
				<p class="social-list">
					<a href="#"><i class="fa fa-facebook fa-fw"></i></a>
					<a href="#"><i class="fa fa-instagram fa-fw"></i></a>
					<a href="#"><i class="fa fa-twitter fa-fw"></i></a>
					<a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
					<a href="#"><i class="fa fa-dribbble fa-fw"></i></a>
				</p>
			</div>
		</div>
		<!-- end #footer -->
		
		
	</div>
	<!-- end #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('/assets-landing/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('/assets-landing/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="{{asset('assets/crossbrowserjs/html5shiv.js')}}"></script>
		<script src="{{asset('assets/crossbrowserjs/respond.min.js')}}"></script>
		<script src="{{asset('assets/crossbrowserjs/excanvas.min.js')}}"></script>
	<![endif]-->
	<script src="{{asset('/assets-landing/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('/assets-landing/plugins/scrollMonitor/scrollMonitor.js')}}"></script>
	<script src="{{asset('/assets-landing/js/one-page-parallax/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>    
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>