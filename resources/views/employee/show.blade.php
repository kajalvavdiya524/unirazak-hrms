@extends('layouts.admin')

@section('page-title')
    {{__('Employee')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Edit Employee')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="{{route('employee.edit',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))}}" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Personal Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('EmployeeId')}}</strong>
                                    <span>{{$employeesId}}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Name')}}</strong>
                                    <span>{{$employee->name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Email')}}</strong>
                                    <span>{{$employee->email}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Date of Birth')}}</strong>
                                    <span>{{\Auth::user()->dateFormat($employee->dob)}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Phone')}}</strong>
                                    <span>{{$employee->phone}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Address')}}</strong>
                                    <span>{{$employee->address}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Salary Type')}}</strong>
                                    <span>{{!empty($employee->salaryType)?$employee->salaryType->name:''}}</span>
                                </div>
                            </div>
                            @if(\Auth::user()->type == 'company')
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Basic Salary')}}</strong>
                                     <span id="demo" style="visibility:hidden;" data-salary="{{$employee->salary}}"></span>
                                  <i  class="fa fa-eye" onclick="myFunction()"></i>
                                 
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Title')}}</strong>
                                    <span>{{$employee->title}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('IC Number')}}</strong>
                                    <span>{{$employee->ic_number}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Gender')}}</strong>
                                    <span>{{$employee->gender}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('EPF No.')}}</strong>
                                    <span>{{$employee->epf_number}}</span>
                                </div>
                            </div>
                             
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Race')}}</strong>
                                    <span>{{$employee->race}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Office Phone')}}</strong>
                                    <span>{{$employee->office_number}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Old IC Number')}}</strong>
                                    <span>{{$employee->old_ic_number}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__(' Marital Status')}}</strong>
                                    <span>{{$employee->marital_status}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('SOCSO No.')}}</strong>
                                    <span>{{$employee->socso_number}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Religion')}}</strong>
                                    <span>{{$employee->religion}}</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Extension')}}</strong>
                                    <span>{{$employee->extension}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            

        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Company Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Branch')}}</strong>
                                    <span>{{!empty($employee->branch)?$employee->branch->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Department')}}</strong>
                                    <span>{{!empty($employee->department)?$employee->department->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Designation')}}</strong>
                                    <span>{{!empty($employee->designation)?$employee->designation->name:''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Date Of Joining')}}</strong>
                                    <span>{{\Auth::user()->dateFormat($employee->company_doj)}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Document Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            @php
                                $employeedoc = $employee->documents()->pluck('document_value',__('document_id'));
                            @endphp
                            @foreach($documents as $key=>$document)
                                <div class="col-md-12">
                                    <div class="info text-sm">
                                        <strong>{{$document->name }}</strong>
                                        <span><a href="{{ (!empty($employeedoc[$document->id])?asset(Storage::url('uploads/document')).'/'.$employeedoc[$document->id]:'') }}" target="_blank">{{ (!empty($employeedoc[$document->id])?$employeedoc[$document->id]:'') }}</a></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="employee-detail-wrap">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{__('Bank Account Detail')}}</h6>
                    </div>
                    <div class="card-body employee-detail-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Account Holder Name')}}</strong>
                                    <span>{{$employee->account_holder_name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Account Number')}}</strong>
                                    <span>{{$employee->account_number}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm font-style">
                                    <strong>{{__('Bank Name')}}</strong>
                                    <span>{{$employee->bank_name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Bank Identifier Code')}}</strong>
                                    <span>{{$employee->bank_identifier_code}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Branch Location')}}</strong>
                                    <span>{{$employee->branch_location}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info text-sm">
                                    <strong>{{__('Tax Payer Id')}}</strong>
                                    <span>{{$employee->tax_payer_id}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction() {
        var salaryid =document.getElementById("demo");
        var salary = salaryid.getAttribute('data-salary');
        console.log("salary",salary);
        if (salaryid.style.visibility === "hidden") {
            salaryid.style.visibility= "visible";
            salaryid.innerHTML = salary;
        } else {
            salaryid.style.visibility = "hidden";
        }
    }   
     
</script>


