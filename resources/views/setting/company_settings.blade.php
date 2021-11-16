@extends('layouts.admin')
@section('page-title')
    {{__('Settings')}}
@endsection
@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $company_favicon=Utility::getValByName('company_favicon');
@endphp

@push('script-page')
    <script>
        $(document).on('change', '.email-template-checkbox', function () {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {

                },
            });
        });
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="nav-tabs">
                <div class="col-lg-12 our-system">
                    <div class="row">
                        <ul class="nav nav-tabs my-4">
                            <li>
                                <a data-toggle="tab" class="active" id="contact-tab4" href="#business-setting">{{__('Business Setting')}}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="contact-tab4" href="#system-setting">{{__('System Setting')}}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab3" href="#company-setting">{{__('Company Setting')}}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab2" href="#email-setting">{{__('Email Notification Setting')}}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab2" href="#ip-restrict-setting">{{__('Ip Restrict Setting')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="business-setting">
                        {{Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))}}
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                <h4 class="h4 font-weight-400 float-left pb-2">{{__('Business settings')}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Logo')}}</h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                        <img src="{{$logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')}}" class="big-logo">
                                    </div>
                                    <div class="choose-file mt-5">
                                        <label for="company_logo">
                                            <div>{{__('Choose file here')}}</div>
                                            <input type="file" class="form-control" name="company_logo" id="company_logo" data-filename="edit-logo">
                                        </label>
                                        <p class="edit-logo"></p>
                                    </div>

                                    @error('company_logo')
                                    <span class="invalid-logo" role="alert">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Favicon')}}</h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                        <img src="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" class="small-logo">
                                    </div>
                                    <div class="choose-file mt-5">
                                        <label for="company_favicon">
                                            <div>{{__('Choose file here')}}</div>
                                            <input type="file" class="form-control" name="company_favicon" id="company_favicon" data-filename="edit-favicon">
                                        </label>
                                        <p class="edit-favicon"></p>
                                    </div>
                                    @error('company_favicon')
                                    <span class="invalid-logo" role="alert">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title">{{__('Settings')}}</h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="form-group">
                                        {{Form::label('title_text',__('Title Text'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))}}
                                        @error('title_text')
                                        <span class="invalid-title_text" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="submit" value="{{__('Save Change')}}" class="btn-create btn-xs radius-10px badge-blue">
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane" id="system-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('System Settings')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none p-4">
                                {{Form::model($settings,array('route'=>'system.settings','method'=>'post'))}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{Form::label('site_currency',__('Currency *'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('site_currency',null,array('class'=>'form-control font-style'))}}
                                        @error('site_currency')
                                        <span class="invalid-site_currency" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('site_currency_symbol',__('Currency Symbol *'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('site_currency_symbol',null,array('class'=>'form-control'))}}
                                        @error('site_currency_symbol')
                                        <span class="invalid-site_currency_symbol" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark" for="example3cols3Input">{{__('Currency Symbol Position')}}</label>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <div class="d-flex radio-check">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="pre_symbol" name="site_currency_symbol_position" class="custom-control-input" value="pre" @if($settings['site_currency_symbol_position'] == 'pre') checked @endif>
                                                            <label class="custom-control-label" for="pre_symbol">{{__('Pre')}}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="post_symbol" name="site_currency_symbol_position" class="custom-control-input" value="post" @if($settings['site_currency_symbol_position'] == 'post') checked @endif>
                                                            <label class="custom-control-label" for="post_symbol">{{__('Post')}}</label>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="site_date_format" class="form-control-label text-dark">{{__('Date Format')}}</label>
                                        <select type="text" name="site_date_format" class="form-control select2" id="site_date_format">
                                            <option value="M j, Y" @if(@$settings['site_date_format'] == 'M j, Y') selected="selected" @endif>Jan 1,2015</option>
                                            <option value="d-m-Y" @if(@$settings['site_date_format'] == 'd-m-Y') selected="selected" @endif>d-m-y</option>
                                            <option value="m-d-Y" @if(@$settings['site_date_format'] == 'm-d-Y') selected="selected" @endif>m-d-y</option>
                                            <option value="Y-m-d" @if(@$settings['site_date_format'] == 'Y-m-d') selected="selected" @endif>y-m-d</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="site_time_format" class="form-control-label text-dark">{{__('Time Format')}}</label>
                                        <select type="text" name="site_time_format" class="form-control select2" id="site_time_format">
                                            <option value="g:i A" @if(@$settings['site_time_format'] == 'g:i A') selected="selected" @endif>10:30 PM</option>
                                            <option value="g:i a" @if(@$settings['site_time_format'] == 'g:i a') selected="selected" @endif>10:30 pm</option>
                                            <option value="H:i" @if(@$settings['site_time_format'] == 'H:i') selected="selected" @endif>22:30</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('employee_prefix',__('Employee Prefix'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('employee_prefix',null,array('class'=>'form-control'))}}
                                        @error('employee_prefix')
                                        <span class="invalid-employee_prefix" role="alert">
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-right">
                                        <input type="submit" value="{{__('Save Change')}}" class="btn-create badge-blue">
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="company-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('Company Setting')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none p-4">
                                {{Form::model($settings,array('route'=>'company.settings','method'=>'post'))}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_name *',__('Company Name *'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_name',null,array('class'=>'form-control font-style'))}}
                                        @error('company_name')
                                        <span class="invalid-company_name" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_address',__('Address'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_address',null,array('class'=>'form-control font-style'))}}
                                        @error('company_address')
                                        <span class="invalid-company_address" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_city',__('City'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_city',null,array('class'=>'form-control font-style'))}}
                                        @error('company_city')
                                        <span class="invalid-company_city" role="alert">
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_state',__('State'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_state',null,array('class'=>'form-control font-style'))}}
                                        @error('company_state')
                                        <span class="invalid-company_state" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_zipcode',__('Zip/Post Code'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_zipcode',null,array('class'=>'form-control'))}}
                                        @error('company_zipcode')
                                        <span class="invalid-company_zipcode" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-md-6">
                                        {{Form::label('company_country',__('Country'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_country',null,array('class'=>'form-control font-style'))}}
                                        @error('company_country')
                                        <span class="invalid-company_country" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_telephone',__('Telephone'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_telephone',null,array('class'=>'form-control'))}}
                                        @error('company_telephone')
                                        <span class="invalid-company_telephone" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_email',__('System Email *'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_email',null,array('class'=>'form-control'))}}
                                        @error('company_email')
                                        <span class="invalid-company_email" role="alert">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('company_email_from_name',__('Email (From Name) *'),['class'=>'form-control-label text-dark']) }}
                                        {{Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))}}
                                        @error('company_email_from_name')
                                        <span class="invalid-company_email_from_name" role="alert">
                                                                <small class="text-danger">{{ $message }}</small>
                                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {{Form::label('company_start_time',__('Company Start Time *'),['class'=>'form-control-label text-dark']) }}

                                                {{Form::text('company_start_time',null,array('class'=>'form-control timepicker_format'))}}
                                                @error('company_start_time')
                                                <span class="invalid-company_start_time" role="alert">
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{Form::label('company_end_time',__('Company End Time *'),['class'=>'form-control-label text-dark']) }}
                                                {{Form::text('company_end_time',null,array('class'=>'form-control timepicker_format'))}}
                                                @error('company_end_time')
                                                <span class="invalid-company_end_time" role="alert">
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{Form::label('timezone',__('Timezone'),['class'=>'form-control-label text-dark'])}}
                                        <select type="text" name="timezone" class="form-control select2" id="timezone">
                                            <option value="">{{__('Select Timezone')}}</option>
                                            @foreach($timezones as $k=>$timezone)
                                                <option value="{{$k}}" {{(env('TIMEZONE')==$k)?'selected':''}}>{{$timezone}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 py-5">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="ip_restrict" id="ip_restrict" {{ $settings['ip_restrict'] == 'on' ? 'checked="checked"' : '' }} >
                                            <label class="custom-control-label form-control-label" for="ip_restrict">{{__('Ip Restrict')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <input type="submit" value="{{__('Save Change')}}" class="btn-create badge-blue">
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="email-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('Email Notification Setting')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none ">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0 dataTable">
                                            <thead>
                                            <tr>
                                                <th>{{__('Module')}}</th>
                                                <th class="text-right">{{__('On/Off')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Utility::$emailStatus as $key=>$email)
                                                <tr class="font-style odd" role="row">
                                                    <td class="sorting_1">{{$email}}</td>
                                                    <td class="action text-right">
                                                        <label class="switch">
                                                            <input type="checkbox" class="email-template-checkbox" name="{{$key}}" {{\App\Utility::getValByName("$key") ==1 ?'checked':''}} value="{{\App\Utility::getValByName("$key") ==1 ?'1':'0'}}" data-url="{{route('company.email.setting',$key)}}">
                                                            <span class="slider1 round"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="ip-restrict-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('Ip Restrict Setting')}}</h4>
                                </div>
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0 text-right">
                                    <a href="#" data-url="{{ route('create.ip') }}" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New IP')}}">
                                        <i class="fa fa-plus"></i> {{__('Create')}}
                                    </a>
                                </div>
                            </div>
                            <div class="card bg-none ">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0 dataTable">
                                            <thead>
                                            <tr>
                                                <th>{{__('IP')}}</th>
                                                <th class="">{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ips as $ip)
                                                <tr class="font-style odd" role="row">
                                                    <td class="sorting_1">{{$ip->ip}}</td>
                                                    <td class="">
                                                        @can('Manage Company Settings')
                                                            <a href="#" data-url="{{ route('edit.ip',$ip->id)  }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit IP')}}" class="edit-icon" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                                        @endcan
                                                        @can('Manage Company Settings')
                                                            <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$ip->id}}').submit();"><i class="fas fa-trash"></i></a>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['destroy.ip', $ip->id],'id'=>'delete-form-'.$ip->id]) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
