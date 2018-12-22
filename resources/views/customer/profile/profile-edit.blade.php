@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
@php
 $time = array_keys($arrTime);
@endphp
<div class="container-">
	<div class="row u-mb-large">
		<div class="col-12">
			<div class="c-tabs">

				<ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
					<li class="c-tabs__item"><a class="c-tabs__link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ trans('customer.company_profile')}}</a></li>
				</ul>

				<div class="c-tabs__content tab-content" id="nav-tabContent">
					<div class="c-tabs__pane active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<form name="editCustomer" id="editCustomer" action="{{ route('customer-edit-profile') }}" method="post">
							<div class="row">
								<!-- <div class="col-lg-2 u-text-center">
									<div class="c-avatar c-avatar--xlarge u-inline-block">
										<img class="c-avatar__img" src="{{ url('uploads/employee/'.$detail['user_image']) }}" alt="Avatar">
									</div>
									<input type="file" name="profile_pic" value="">
								</div> -->
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-lg-2 u-text-center">
		                       	<div class="c-avatar c-avatar--xlarge u-inline-block">
		                            @php
		                            $filename= url('uploads/employee/'.$detail['user_image']);
		                            $file_headers = @get_headers($filename);
		                            @endphp
		                            @if($file_headers[0] == 'HTTP/1.1 200 OK')
		                            <img class="c-avatar__img" src="{{ url('uploads/employee/'.$detail['user_image']) }}" alt="Avatar">
		                            @else
		                            <img class="c-avatar__img"  src="{{ url('uploads/no-image.png') }}" alt="Avatar">
		                            @endif
		                            <p> <label class="c-field__label" for="fileSelect">{{ trans('employee.edit-avatar') }}</label></p>
		                            <p>800px * 800px</p>
		                            {{ Form::file('profile_pic', ['class' => 'c-input', 'id'=>'fileSelect', 'style' => 'visibility:hidden;']) }}
		                        </div>
                    		</div>
								<div class="col-lg-5">
									<div class="c-field u-mb-small">
										<label class="c-field__label" for="firstName">{{ trans('customer.customer_number')}}</label> 
										<input class="c-input" id="firstName" readonly="readonly" name="customer_number" value="{{ $arrCustomer['customer_number'] }}" placeholder="CA021" type="text"> 
									</div>
									<div class="c-field u-mb-small">
										<label class="c-field__label" for="lastName">{{ trans('customer.name')}}</label> 
										<input class="c-input" id="first_name" name="first_name" value="{{ $arrCustomer['fullname'] }}" placeholder="Clark" type="text"> 
										<input class="c-input" name="custId" value="{{ $arrCustomer['customer_id'] }}" type="hidden"> 
									</div>

									<div class="c-field u-mb-small">
										<label class="c-field__label"  for="select1">{{ trans('customer.package')}}</label>

                                                                                <select class="c-select" id="select1" name="pacet" disabled="disabled">
											<option value="">Select Packages</option>
											@foreach($getServiceName as $value)
											<option value="{{$value->id}}" {{ ($value->id == $arrCustomer['is_package'] ? 'selected="selected"' : '') }}>
												{{$value->packages_name}}
											</option>
											<!--<option value='Business Packet Stander'>Business Packet Stander</option>-->
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-lg-5">
									<div class="c-field u-mb-small">
										<label class="c-field__label" for="companyName">{{ trans('customer.company_name')}}</label>
										<input class="c-input" id="companyName" name="company_name" value="{{ $arrCustomer['company_name'] }}" placeholder="Dashboard Ltd." type="text">
									</div>
									<div class="c-field u-mb-small">
										<label class="c-field__label" for="email">{{ trans('customer.email')}}</label>
										<input class="c-input" id="email" readonly="readonly" name="email" value="{{ $arrCustomer['email'] }}" placeholder="jason@clark.com" type="email">
									</div>

									<div class="c-field u-mb-small">
										<label class="c-field__label" for="website">{{ trans('customer.telephone')}}</label>
										<input class="c-input" id="telephone" name="telephone" value="{{ $arrCustomer['phone'] }}" placeholder="zawiastudio.com" type="text">
									</div>  
								</div>
							</div>

							<div class="">
								<label class="c-field__label col-lg-offset-4" for=""></label>
								<div class="col-lg-2 ">
									<div class="col u-mb-medium">
										<input type="submit" class="c-btn c-btn--info c-btn--fullwidth" value="{{ trans('customer.edit')}}">
									</div>
								</div>
							</div> 

							<div class="row">
								<div class="col-lg-2 u-text-center">
								</div>
								<div class="col-lg-5">
									<div class="row">
										<div class="col-lg-12">
											<div class="c-field u-mb-small">
												<label class="c-field__label" for="callbacksms">{{ trans('customer.call_transfer')}}</label> 
												<div class="c-choice c-choice--checkbox">
													<input class="c-choice__input" id="call_transfer_telephone" name="call_transfer_telephone" value="1" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['call_transfer_telephone']  == '1' ? 'checked="checked"' : '') }}>
													<label class="c-choice__label" for="call_transfer_telephone">{{ trans('customer.incoming_telephone')}}</label>
												</div>
											</div>
				
											<div class="c-field u-mb-small">
												<div class="c-choice c-choice--checkbox">
													<input class="c-choice__input" id="call_transfer_mobile_phone" name="call_transfer_mobile_phone" value="1" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['call_transfer_mobile_phone']  == '1' ? 'checked="checked"' : '') }}>
													<label class="c-choice__label" for="call_transfer_mobile_phone">{{ trans('customer.incoming_mobile')}}</label>
												</div>
											</div>
										</div>
									</div> 

									<div class="row">
										<div class="col-lg-12">
											<div class="c-field u-mb-small">
												<label class="c-field__label" for="callbacksms">{{ trans('customer.call_notification')}}</label> 
												<div class="c-choice c-choice--checkbox">
													<input class="c-choice__input" id="transfer_notification_to_call" name="transfer_notification_to_call" value="1" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['transfer_notification_to_call']  == '1' ? 'checked="checked"' : '') }}>
													<label class="c-choice__label" for="transfer_notification_to_call">{{ trans('customer.incoming_telephone')}}</label>
												</div>
											</div>
											<div class="c-field u-mb-small">
												<div class="c-choice c-choice--checkbox">
													<input class="c-choice__input" id="transfer_notification_to_mobile_phone" name="transfer_notification_to_mobile_phone" value="1" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['transfer_notification_to_mobile_phone']  == '1' ? 'checked="checked"' : '') }}>
													<label class="c-choice__label" for="transfer_notification_to_mobile_phone">{{ trans('customer.incoming_mobile')}}</label>
												</div>
											</div>
										</div>
									</div>   
								</div>

								<div class="col-lg-5">
									<div class="">
										<div class="col-md-12">
											<a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-panel" aria-expanded="false" aria-controls="stage-panel">
												<h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.bussiness_hours')}}</h6>
												<i class="fa fa-plus" aria-hidden="true"></i>
											</a>

											<div class="c-stage__panel c-stage__panel--mute collapse" id="stage-panel" style="">
												@php
												$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
												@endphp 
												@for($m = 0;$m < count($days);$m++)
												@if($m == 0)
												<div class="row u-mb-xlarge" style="margin-bottom: -0.75rem!important;margin-top: 10px;">
													@else
													<div class="row u-mb-xlarge" style=" margin-bottom: -0.75rem!important;">
														@endif
														@php
														$dayName = $days[$m];
														@endphp
														<div class="col-md-4 u-mb-medium">
															<div class="c-choice c-choice--checkbox">
																{{ Form::checkbox('day['.$days[$m].']',  $days[$m] , true,array('class' => 'c-choice__input', 'id' => $days[$m].$m)) }}
																<label class="c-choice__label" for="{{ $days[$m].$m }}">{{ $days[$m] }}</label>
															</div>
														</div>
														<div class="col-md-4 u-mb-medium">
                                                                                                                    <select name="{{ 'start['.$days[$m].']' }}" class="c-select" id="{{ 'start['.$days[$m].']' }}">
                                                                                                                        @php
                                                                                                                        for($i=0; $i < count($arrTime); $i++ )
                                                                                                                        {@endphp
                                                                                                                        <option value="{{ $time[$i] }}"  {{ ($time[$i] == '09:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                                                                                        @php}
                                                                                                                        @endphp
                                                                                                                    </select>
															
														</div>
														<div class="col-md-4 u-mb-medium">
                                                                                                                    <select name="{{ 'end['.$days[$m].']' }}" class="c-select" id="{{ 'end['.$days[$m].']' }}">
                                                                                                                        @php
                                                                                                                       for($i=0; $i < count($arrTime); $i++ )
                                                                                                                       {@endphp
                                                                                                                       <option value="{{ $time[$i] }}" {{ ($time[$i] == '18:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                                                                                       @php}
                                                                                                                       @endphp
                                                                                                                    </select>
															
														</div>
													</div>
													@endfor
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane2" aria-expanded="false" aria-controls="stage-pane2">
														<h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.lanch_time')}}</h6>
														<i class="fa fa-plus" aria-hidden="true"></i>
													</a>

													<div class="c-stage__panel c-stage__panel--mute collapse" id="stage-pane2" style="">
														<div class="row u-mb-xlarge" style="margin-top: 10px!important;    margin-bottom: 0px !important;">
															<div class="col-md-4 u-mb-medium">
																<div class="c-choice c-choice--checkbox">
																	<input class="c-choice__input" id="launch_time" name="launch_time" value="1" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['is_lunch_time']  == '1' ? 'checked="checked"' : '') }}>
																	<label class="c-choice__label" for="launch_time">&nbsp;</label>
																</div>
															</div>
															<div class="col-md-4 u-mb-medium">
                                                                                                                            <select name="global_start_time" class="c-select col-md-2" id="global_start_time">
                                                                                                                                    @php
                                                                                                                                   for($i=0; $i < count($arrTime); $i++ )
                                                                                                                                   {@endphp
                                                                                                                                   <option value="{{ $time[$i] }}" {{ ($time[$i] == '12:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                                                                                                   @php}
                                                                                                                                   @endphp
                                                                                                                            </select>
																
															</div>
															<div class="col-md-4 u-mb-medium">
                                                                                                                            <select name="global_end_time" class="c-select col-md-2" id="global_end_time">
                                                                                                                                @php
                                                                                                                               for($i=0; $i < count($arrTime); $i++ )
                                                                                                                               {@endphp
                                                                                                                               <option value="{{ $time[$i] }}" {{ ($time[$i] == '14:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                                                                                               @php}
                                                                                                                               @endphp
                                                                                                                            </select>
																
															</div>
														</div>   
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12">
													<div class="c-choice c-choice--checkbox">
														<input class="c-choice__input" id="no_business_hour_adjust" value="1" name="no_business_hour_adjust" type="checkbox" {{ (!empty($customer_info[0]) && $customer_info[0]['no_business_hour_adjust']  == '1' ? 'checked="checked"' : '') }}>
														<label class="c-choice__label" for="no_business_hour_adjust">{{ trans('customer.no_business_hours')}}</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane3" aria-expanded="true" aria-controls="stage-pane3">
														<h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.g_holidays')}}</h6>
														<i class="fa fa-plus" aria-hidden="true"></i>
													</a>
													<div class="c-stage__panel c-stage__panel--mute collapse show" id="stage-pane3" style="">
														<div class="u-p-medium">
															<div class="form-group">
																<div class="c-field has-addon-left">
																	<label class="c-field__label" for="holidayfrom">{{ trans('customer.holiday_from')}}</label> 
																	<input class="c-input form-control"  id="startdate1" value="{{ (empty($customer_info[0]) ? '' : date('d.m.Y',strtotime($customer_info[0]['holiday_global_from']))) }}" name="holidayfrom" type="text" >
																</div>
															</div>
															<br>
															
															<div class="form-group">
																<div class="c-field has-addon-left">
																	<label class="c-field__label" for="holidayto">{{ trans('customer.holiday_to')}}</label> 
																	<input class="c-input form-control"  id="enddate1" value="{{ (empty($customer_info[0]) ? '' : date('d.m.Y',strtotime($customer_info[0]['holiday_global_to']))) }}" name="holidayto" type="text" >
																</div>
															</div>
														</div> 
													</div>
												</div>
											</div>
											<br/>

										</div>
									</div>
								</div>


							</form>
						</div>

					</div>
				</div>

			</div><!-- // .col-12 -->
		</div>
	</div><!-- // .container -->
	<style>
	input.has-error {
		border-color: red;
	}
</style>
@endsection
