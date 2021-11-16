@extends('layouts.admin')

@section('page-title')
    {{__('Join Training List')}}
    @endsection

    @section('action-button')
    @endsection


@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    @if(\Auth::user()->type != 'employee')
                        {{ Form::open(array('route' => array('training.joinTrainingList'),'method'=>'get','id'=>'jointraining_filter')) }}
                        <div class="row d-flex justify-content-end mt-2">
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        {{Form::label('Name',__('Name'),['class'=>'text-type'])}}
                                        {{Form::text('name',isset($_GET['name'])?$_GET['name']:'',array('class'=>'month-btn form-control'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        {{Form::label('start_date',__('Start Date'),['class'=>'text-type'])}}
                                        {{Form::text('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control datepicker'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        {{Form::label('end_date',__('End Date'),['class'=>'text-type'])}}
                                        {{Form::text('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control datepicker'))}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto my-auto">
                                <a href="#" class="apply-btn" onclick="document.getElementById('jointraining_filter').submit(); return false;" data-toggle="tooltip" data-original-title="{{__('apply')}}">
                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                </a>
                                <a href="{{route('training.joinTrainingList')}}" class="reset-btn" data-toggle="tooltip" data-original-title="{{__('Reset')}}">
                                    <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                                </a>

                            </div>
                        </div>
                        {{ Form::close() }}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable" >
                            <thead>
                            <tr>
                                <th>{{__('Applied Date')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Program Title')}}</th>
                                <th>{{__('Date Start')}}</th>
                                <th>{{__('Date End')}}</th>
                                <th>{{__('Organizer')}} </th>
                                <th>{{__('HOD Approved Status')}} </th>
                                <th>{{__('HR Verify Status')}} </th>
                                @if(\Auth::user()->type != 'employee')
                                    <th width="200px">{{__('Action')}}</th>
                                @endif
                                @if(\Auth::user()->type == 'employee')
                                    <th>{{__('Join Training')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style" id="customejointrainer">
                            @foreach ($join_train as $training)
                                <tr>
                                    <td>{{\Auth::user()->dateFormat($training->start_date)}}</td>
                                    <td>
                                        @foreach ($employees as $item)
                                                @if($item->id==$training->employee)
                                                {{$item->name}}
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $training->program_title }} </td>
                                    <td>{{\Auth::user()->dateFormat($training->start_date)}} </th>
                                    <th>{{\Auth::user()->dateFormat($training->end_date)}}</td>
                                    <th>{{$training->organize}}</td>
                                    <th>
                                        @if(\Auth::user()->type != 'employee')
                                            @if($training->hod_cost_approval==0)
                                            <div class="badge badge-pill badge-warning">Pending</div>
                                            @elseif($training->hod_cost_approval==1)
                                            <div class="badge badge-pill badge-success">Approve</div>
                                            @elseif($training->hod_cost_approval==2)
                                            <div class="badge badge-pill badge-danger">Reject</div>
                                            @else
                                            @endif
                                        @else
                                            @if($training->hod_cost_approval==0)
                                            <div class="badge badge-pill badge-warning">Pending</div>
                                            @elseif($training->hod_cost_approval==1)
                                            <div class="badge badge-pill badge-success">Approve</div>
                                            @elseif($training->hod_cost_approval==2)
                                            <div class="badge badge-pill badge-danger">Reject</div>
                                            @else
                                            @endif

                                        @endif

                                    </td>
                                    <th>
                                        @if(\Auth::user()->type != 'employee')
                                            @if($training->hr_cost_approval == "0")
                                                     <div class="badge badge-pill badge-warning">Pending</div>
                                            @elseif($training->hr_cost_approval == "1")
                                               <div class="badge badge-pill badge-success">Approve</div>
                                            @elseif($training->hr_cost_approval == "2")
                                                <div class="badge badge-pill badge-danger">Reject</div>
                                             @else
                                             @endif
                                        @else
                                            @if($training->hr_cost_approval=="0")
                                             <div class="badge badge-pill badge-warning">Pending</div>
                                            @elseif($training->hr_cost_approval=="1")
                                               <div class="badge badge-pill badge-success">Approve</div>
                                            @elseif($training->hr_cost_approval=="2")
                                                <div class="badge badge-pill badge-danger">Reject</div>
                                            @else
                                            @endif
                                        @endif

                                    </td>

                                   @if(\Auth::user()->type != 'employee')

                                    <th>
                                        <a href="#"  data-url="{{ route('training.approve-status',$training->user_id) }}" data-size="lg" data-ajax-popup="true" @if(\Auth::user()->type == 'hr') data-title="{{__('HR Approved Amount Details')}}" @else data-title="{{__('HOD Approved Amount Details')}}" @endif  data-toggle="tooltip"  data-original-title="{{__('status ')}}" class="edit-icon"><i class="fas fa-eye"></i></a>

                                    </th>
                                    @endif
                                    @if(\Auth::user()->type == 'employee')
                                               @if($training->join_status==0)
                                    <th>
                                    <a href="#"  data-url="{{ route('training.join-status',$training->user_id) }}" data-size="lg" data-ajax-popup="true" @if(\Auth::user()->type == 'employee') data-title="{{__('Join Training Details')}}"  @endif  data-toggle="tooltip"  data-original-title="{{__('Join Training ')}}" class="edit-icon"><i class="fas fa-user-plus"></i></a>
                                    </th>
                                            @else
                                            <th>
                                            <a href="#"  data-size="lg" data-ajax-popup="true" data-toggle="tooltip" data-original-title="{{__('Done Training ')}}" class="edit-icon"><i class="fas fa-check"></i></a>
                                            @php
                                            $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($training->end_date)));
                                             $today=date('Y-m-d');
                                            @endphp

                                                @if(strtotime($effectiveDate) <= strtotime($today) )

                                                        @if($training->user_id==\Auth::user()->id)
                                                        <a href="#"  data-url="{{ route('training.rating-form',$training->user_id) }}" data-size="lg" data-ajax-popup="true" data-toggle="tooltip" data-title="{{__('Training Evaluation Form')}}"  data-original-title="{{__('Rating Training ')}}" class="edit-icon"><i class="fas fa-star"></i></a>
                                                        @else

                                                        @endif
                                                @else

                                                @endif


                                            </th>
                                            @endif
                                    @endif


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



