@extends('layouts.admin')
@section('page-title')
    {{__('Manage Termination')}}
@endsection
@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Termination')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('termination.create') }}" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Termination')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
            </div>
        @endcan
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable" >
                            <thead>
                            <tr>
                                @role('company')
                                <th>{{__('Employee Name')}}</th>
                                @endrole
                                <th>{{__('Termination Type')}}</th>
                                <th>{{__('Notice Date')}}</th>
                                <th>{{__('Termination Date')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Document')}}</th>
                                <th>{{__('Hod Approved ')}}</th>
                                <th>{{__('Hr Approved')}}</th>
                                @if(Gate::check('Edit Termination') || Gate::check('Delete Termination'))
                                    <th width="200px">{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($terminations as $termination)
                             @php
                            $documentPath=asset(Storage::url('uploads/documentUpload'));
                            @endphp
                                <tr>
                                    @role('company')
                                    <td>{{ !empty($termination->employee())?$termination->employee()->name:'' }}</td>
                                    @endrole
                                    <td>{{ !empty($termination->terminationType())?$termination->terminationType()->name:'' }}</td>
                                    <td>{{  \Auth::user()->dateFormat($termination->notice_date) }}</td>
                                    <td>{{  \Auth::user()->dateFormat($termination->termination_date) }}</td>
                                    <td>{{ $termination->description }}</td>
                                    <td>
                                        @if(!empty($termination->documents))
                                        <a href="{{$documentPath.'/'.$termination->documents}}" target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        @else
                                        <p>-</p>
                                        @endif
                                    </td>
                                     <td>
                                         @if($termination->hod_termination_approve=="0")
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                        @elseif($termination->hod_termination_approve=="1")
                                        <div class="badge badge-pill badge-success">Approve</div>
                                        @else($termination->hod_termination_approve=="2")
                                        <div class="badge badge-pill badge-danger">Reject</div>
                                        @endif
                                    </td>
                                    <td>
                                         @if($termination->hr_termination_approve=="0")
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                        @elseif($termination->hr_termination_approve=="1")
                                        <div class="badge badge-pill badge-success">Approve</div>
                                        @else($termination->hr_termination_approve=="2")
                                        <div class="badge badge-pill badge-danger">Reject</div>
                                        @endif
                                    </td>
                                    @if(Gate::check('Edit Termination') || Gate::check('Delete Termination'))
                                        <td>
                                             @role('company||hr')
                                             <a href="#" data-url="{{ route('termination.show',$termination->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Termination Detail')}}" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="{{__('View Detail')}}"><i class="fas fa-eye"></i></a>
                                               @endrole
                                            @can('Edit Termination')
                                                <a href="#" data-url="{{ URL::to('termination/'.$termination->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Termination')}}" class="edit-icon" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('Delete Termination')
                                                <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$termination->id}}').submit();"><i class="fas fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['termination.destroy', $termination->id],'id'=>'delete-form-'.$termination->id]) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
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
