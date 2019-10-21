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
									<div class="nav-title"><b>Контакты</b></div>
									<ul class="nav nav-inbox"><!--<li><a href="email_inbox.html"><img src="../assets/img/user/user-14.jpg" alt="" /> Alex </a></li>
										<li><a href="email_inbox.html"><img src="../assets/img/user/user-15.jpg" alt="" /> Alex </a></li> -->
										@foreach ($users as $value)
											@if(Auth::user()->id != $value->id)
												<li class="active"><a href="{{ route('chat.show',[$value->id]) }}"> {{ $value->name }} <span class="badge pull-right">52</span></a></li>
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

				<!-- begin vertical-box-row -->
				<div class="vertical-box-row">
					<!-- begin vertical-box-cell -->
					<div class="vertical-box-cell">
						<!-- begin vertical-box-inner-cell -->
						<div class="vertical-box-inner-cell">
							<!-- begin scrollbar -->
							<div data-scrollbar="true" data-height="100%">
								
					
					<div class="panel-body bg-silver">
						<div class="chats">
							@foreach ($messages as $value)
								
							<div class="@if(Auth::user()->id == $value->author_id) right @else left @endif">
								<span class="date-time">{{ $value->created_at }}</span>
								<a href="javascript:;" class="name">{{ $value->author->name }}</a>
								<a href="javascript:;" class="image"><img alt="" src="{{ asset('/assets/img/user/'.$value->author->avatar) }}" /></a>
								<div class="message">
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
					<div class="panel-footer">
						<form name="send_message_form" data-id="message-form">
							<div class="input-group">
								<input type="text" class="form-control" name="message" placeholder="Enter your message here.">
								<span class="input-group-append">
									<button class="btn btn-primary" type="button"><i class="fa fa-camera"></i></button>
									<button class="btn btn-primary" type="button"><i class="fa fa-link"></i></button>
								</span>
							</div>
						</form>
					</div>
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