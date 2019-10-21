@extends('layouts.admin', ['contentFullHeight' => true])
@section('title', 'Чат')
@section('content')


<style type="text/css">
	/*.chat .nav.nav-inbox li{height: 20px;}*/
</style>

<!-- begin vertical-box -->
	<div class="vertical-box with-grid inbox chat">
		<!-- begin vertical-box-column -->
		<div class="vertical-box-column width-300 bg-silver hidden-xs">
			<!-- begin vertical-box -->
			<div class="vertical-box">
				<!-- begin wrapper -->
				<!--<form class="navbar-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Поиск людей, групп, чатов">
						<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
					</div>
				</form>-->
				<div class="wrapper bg-silver text-center">
					<a href="email_compose.html" class="btn btn-inverse p-l-40 p-r-40 btn-sm">
						Создать чат
					</a>
				</div>
				<!-- end wrapper -->
				<!-- begin vertical-box-row -->
				<div class="vertical-box-row">
					<!-- begin vertical-box-cell -->
					<div class="vertical-box-cell">
						<!-- begin vertical-box-inner-cell -->
						<div class="vertical-box-inner-cell">
							<!-- begin scrollbar -->
							<div data-scrollbar="true" data-height="100%">
								<!-- begin wrapper -->
								<div class="wrapper p-0">
									<div class="nav-title"><b>FOLDERS</b></div>
									<ul class="nav nav-inbox"><!--<li><a href="email_inbox.html"><img src="../assets/img/user/user-14.jpg" alt="" /> Alex </a></li>
										<li><a href="email_inbox.html"><img src="../assets/img/user/user-15.jpg" alt="" /> Alex </a></li> -->
										@foreach ($users as $value)
											<li class="active"><a href="email_inbox.html"> {{ $value->name }} <span class="badge pull-right">52</span></a></li>
										@endforeach
										
									</ul>
									
								</div>
								<!-- end wrapper -->
							</div>
							<!-- end scrollbar -->
						</div>
						<!-- end vertical-box-inner-cell -->
					</div>
					<!-- end vertical-box-cell -->
				</div>
				<!-- end vertical-box-row -->
			</div>
			<!-- end vertical-box -->
		</div>
		<!-- end vertical-box-column -->
		<!-- begin vertical-box-column -->
		<div class="vertical-box-column bg-white">
			<!-- begin vertical-box -->
			<div class="vertical-box">


<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="index-5">
				<div class="bg-silver">
					<div class="wrapper bg-silver text-center">
						<a href="email_compose.html" class="btn btn-inverse p-l-40 p-r-40 btn-sm">
							Создать чат
						</a>
					</div>
					
				</div>
				<div class="panel-body">
					<div class="height" data-scrollbar="true">
						<ul class="media-list media-list-with-divider media-messaging">
							
							@foreach ($messages as $value)
							@if(Auth::user()->id == $value->author_id) right @else left @endif
							<li class="media media-sm">
								<a href="javascript:;" class="pull-left">
									<img src="/assets/img/user/user-5.jpg" alt="" class="media-object rounded-corner" />
								</a>
								<div class="media-body">
									<h5 class="media-heading">{{ $value->author_id }}</h5>
									<p>{{ $value->text }}</p>
								</div>
							</li>

							@endforeach

							<li class="media media-sm">
								<a href="javascript:;" class="pull-left">
									<img src="/assets/img/user/user-5.jpg" alt="" class="media-object rounded-corner" />
								</a>
								<div class="media-body">
									<h5 class="media-heading">John Doe</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id nunc non eros fermentum vestibulum ut id felis. Nunc molestie libero eget urna aliquet, vitae laoreet felis ultricies. Fusce sit amet massa malesuada, tincidunt augue vitae, gravida felis.</p>
								</div>
							</li>
							<li class="media media-sm">
								<a href="javascript:;" class="pull-left">
									<img src="/assets/img/user/user-6.jpg" alt="" class="media-object rounded-corner" />
								</a>
								<div class="media-body">
									<h5 class="media-heading">Terry Ng</h5>
									<p>Sed in ante vel ipsum tristique euismod posuere eget nulla. Quisque ante sem, scelerisque iaculis interdum quis, eleifend id mi. Fusce congue leo nec mauris malesuada, id scelerisque sapien ultricies.</p>
								</div>
							</li>
							<li class="media media-sm">
								<a href="javascript:;" class="pull-left">
									<img src="/assets/img/user/user-8.jpg" alt="" class="media-object rounded-corner" />
								</a>
								<div class="media-body">
									<h5 class="media-heading">Fiona Log</h5>
									<p>Pellentesque dictum in tortor ac blandit. Nulla rutrum eu leo vulputate ornare. Nulla a semper mi, ac lacinia sapien. Sed volutpat ornare eros, vel semper sem sagittis in. Quisque risus ipsum, iaculis quis cursus eu, tristique sed nulla.</p>
								</div>
							</li>
							<li class="media media-sm">
								<a href="javascript:;" class="pull-left">
									<img src="/assets/img/user/user-7.jpg" alt="" class="media-object rounded-corner" />
								</a>
								<div class="media-body">
									<h5 class="media-heading">John Doe</h5>
									<p>Morbi molestie lorem quis accumsan elementum. Morbi condimentum nisl iaculis, laoreet risus sed, porta neque. Proin mi leo, dapibus at ligula a, aliquam consectetur metus.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-footer">
					<form>
						<div class="input-group">
							<input type="text" class="form-control bg-silver" placeholder="Enter message" />
							<span class="input-group-append">
								<button class="btn btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<!-- end panel -->


			</div>
			<!-- end vertical-box -->
		</div>
		<!-- end vertical-box-column -->
	</div>
	<!-- end vertical-box -->
@endsection

@push('scripts')
	<script src="/assets/js/demo/email-inbox.demo.js"></script>
	<script>
		$(document).ready(function() {
			InboxV2.init();
		});
	</script>
@endpush