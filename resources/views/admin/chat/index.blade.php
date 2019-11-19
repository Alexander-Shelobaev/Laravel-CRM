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

									<div class="chat-search-form">
										<form class="navbar-form">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Поиск контактов и групп">
												<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
											</div>
										</form>
									</div>	

									<div class="chat-groop-button">
										<button type="button" class="btn btn-success"><i class="fas fa-edit"></i> Создать группу</button>
									</div>
									
									<div class="nav-title"><b>Контакты</b></div>
									<ul class="nav nav-inbox">

										<!--<li><a href="email_inbox.html"><img src="../assets/img/user/user-14.jpg" alt="" /> Alex </a></li>
										<li><a href="email_inbox.html"><img src="../assets/img/user/user-15.jpg" alt="" /> Alex </a></li> -->

										@foreach ($arr_users as $value)

											@if(Auth::user()->id != $value['id'])
												<li>
													<a href="{{ route('chat.show',[$value['id']]) }}">
														<img src="{{ asset('/assets/img/user/'.$value['avatar']) }}" class="img-rounded height-30 rounded-corner mr-2"> 
														{{ $value['name'] }} 
														<span class="badge pull-right">
															{{ $value['count'] }}
														</span>
													</a>
												</li>
											@endif
											
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
		<div class="vertical-box-column bg-silver">
			<!-- begin vertical-box -->
			<div class="vertical-box">

				<div class="vertical-box-inner-cell chat-greeting-wrapper">
					<div class="chat-greeting">
						<h2>Добро пожаловать, {{Auth::user()->name}}</h2>
						<img src="{{ asset('/assets/img/user/'.Auth::user()->avatar) }}" class="img-rounded chat-rounded-corner ">
						<p>Найдите кого-то и начните беседу или зайдите в <br>
						"Контакты", чтобы узнать, кто сейчас в сети</p>
					</div>
				</div>
					
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