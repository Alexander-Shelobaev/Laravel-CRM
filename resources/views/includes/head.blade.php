<meta charset="utf-8" />
<title>Проект | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon/favicon-32x32.png')}}">
<meta content="A. S. Shelobaev" name="author" />

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
<link href="/assets/css/bundle.css" rel="stylesheet" />
<link href="/assets/css/default/style.min.css" rel="stylesheet" />
<link href="/assets/css/default/style-responsive.min.css" rel="stylesheet" />
<link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
<!-- ================== END BASE CSS STYLE ================== -->
<style type="text/css">
	body {
		font-size: 15px;
		color: #3b3e42;
	}
	.sidebar, .sidebar-bg {
    width: 270px;
	}
	.content {
    margin-left: 270px;
	}
	.page-title{
		border-bottom: 1px solid #b7b7b7;
		padding-bottom: 10px;
		margin-bottom: 25px;
		font-size: 24px;
		font-weight: 500;
	}
	.panel-body h4{
		padding-top: 10px;
	}
	code {padding: 0px 0px;}
	.hljs-wrapper{
		margin-top: -14px;
	}


	td.with-img.picture-announce{
		padding-top: 20px;padding-left: 3px;padding-right: 3px;
	}
	img.picture-announce{
		text-align: center; width:100px;
	}
	form.delete-btn{
		display: inline-block;
	}
	
	.old_picture_announce{
		margin-top: -15px;margin-bottom: 15px; max-width: 436px;
	}
	.old_detailed_picture{
		margin-top: -15px;margin-bottom: 15px; max-width: 1140px;
	}

	/*.chats .message{
		border-top-left-radius: 0;
	}
	.chats .right .message{
		border-top-left-radius: 14px;
		border-bottom-right-radius: 0;
	}*/

	
	/* chat */
	.chat-search-form{
		padding: 16px 12px 0px;
	}
	.chat-search-form .form-control{
		width: 275px;
	    padding: 5px 15px;
	    height: 32px;
	    background: #ffffff;
	    border-color: #f2f3f4;
	    border-radius: 30px;
	}
	.chat-search-form .btn-search {
	    position: absolute;
	    right: 15px;
	    top: 16px;
	    height: 32px;
	    padding-top: 5px;
	    padding-bottom: 5px;
	    border: none;
	    background: 0 0;
	    border-radius: 0 30px 30px 0;
	}

	.chat-greeting-wrapper{
		
		
	}
	.chat-greeting{
		padding: 30px 40px;

		width: 450px;
		margin: 0 auto;
	}
	.chat-rounded-corner{
		margin:20px;
		border-radius: 100px!important;
	}

	.chat-groop-button{
		padding: 0 10px;
    	text-align: center;
	}
	.chat-groop-button .btn{
		width: 272px;
	}

	.inbox .nav-title {
	    border-top: 1px solid #dfe4e6;
	    font-size: 10px;
	    color: #929ba1;
	    padding: 15px 13px 7px;
	    margin-top: 15px;
	}

	.chat .badge.pull-right{
		margin-top: 6px !important;
	}

	.chat-greeting{
		text-align: center;
	}


	.chats .right .message:before {
		right: -21px;
		border-left-color: #def4f4;
	}
	.chats .message:before {
		top: 1px;
		left: -21px;
		border: 14px solid transparent;
		border-right-color: #f0f3f4;
	}

	.chats .message{
		background: #f0f3f4;
	}
	.chats .message.color{
		background: #def4f4;
	}
</style>
<!-- ================== BEGIN BASE JS ================== -->
<script src="/assets/plugins/pace/pace.min.js"></script>
<!-- ================== END BASE JS ================== -->

@stack('css')
