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
		<div class="vertical-box-column bg-white">
			<!-- begin vertical-box -->
			<div class="vertical-box">

				<!-- begin wrapper -->
						<div class="wrapper bg-silver-lighter">
							<!-- begin btn-toolbar -->
							<div class="btn-toolbar">
								
								<!-- begin btn-group -->
								<div class="btn-group ml-auto">
									<button class="btn btn-white btn-sm">
										<i class="fa fa-chevron-left f-s-14 t-plus-1"></i>
									</button>
									<button class="btn btn-white btn-sm">
										<i class="fa fa-chevron-right f-s-14 t-plus-1"></i>
									</button>
								</div>
								<!-- end btn-group -->
							</div>
							<!-- end btn-toolbar -->
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
								
					
					<div class="panel-body bg-white">
						<div class="chats">
							@foreach ($messages as $value)
								
							<div class="@if(Auth::user()->id == $value->author_id) right @else left @endif">
								<span class="date-time">{{ $value->created_at }}@if($value->view == 0) Непрочитано@endif</span>
								<a href="javascript:;" class="name">{{ $value->author->name }}</a>
								<a href="javascript:;" class="image"><img alt="" src="{{ asset('/assets/img/user/'.$value->author->avatar) }}" /></a>
								@if(Auth::user()->id == $value->author_id)

								@else

								
								@endif
								<div class="message @if(Auth::user()->id == $value->author_id) color @else @endif">
									{{ $value->text }}
								</div>
							</div>

							@endforeach
						</div>
					</div>


							</div>
							<!-- end scrollbar -->
						</div>
						<!-- end vertical-box-inner-cell -->
					</div>
					<!-- end vertical-box-cell -->
				</div>
				<!-- end vertical-box-row -->


				<!-- begin wrapper -->
				<div class="wrapper bg-silver-lighter clearfix">
					
						<form action="{{ route('chat.store') }}" method="post" name="send_message_form" data-id="message-form">
							<div class="input-group">
								<input type="text" class="form-control" name="message" placeholder="Введите сообщение." value="@if(old('message')){{ old('message') }}@else{{old('message') ?? ''}}@endif">
								<span class="input-group-append">
									<button class="btn btn-primary" type="button"><i class="fa fa-paperclip"></i></button>
									
									<input type="hidden" name="recipient_id" value="{{ $recipient_id }}">
									{{ csrf_field() }} 
									<button type="submit" class="btn btn-primary" type="button">Отправить</i></button>
								</span>
							</div>
						</form>
					
				</div>
				<!-- end wrapper -->

		


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