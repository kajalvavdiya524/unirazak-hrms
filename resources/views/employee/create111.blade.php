@extends('layouts.admin')
@section('page-title')
    {{__('Create Employee')}}
@endsection
@section('content')

        {{Form::open(array('route'=>array('employee.store'),'method'=>'post','enctype'=>'multipart/form-data'))}}
        {{--        <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">--}}
        {{--    @csrf--}}

 <div class="row">
        <div class="col-md-6 ">
             <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Personal Detail')}}</h6></div>
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('phone', __('Phone'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::number('phone',old('phone'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('dob', old('dob'), ['class' => 'datepicker form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                {!! Form::label('gender', __('Gender'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_male">{{__('Male')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_female">{{__('Female')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::email('email',old('email'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                {!! Form::label('marital_status', __('Marital Status'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_married" value="Married" name="marital_status" class="custom-control-input">
                                        <label class="custom-control-label" for="m_married">{{__('Married')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_unmarried" value="Unmarried" name="marital_status" class="custom-control-input">
                                        <label class="custom-control-label" for="m_unmarried">{{__('Unmarried')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            {!! Form::label('title', __('Title'),['class'=>'form-control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('ic_number', __('IC Number'),['class'=>'form-control-label']) !!}
                            {!! Form::text('ic_number', old('ic_number'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('epf_number', __('EPF No.'),['class'=>'form-control-label']) !!}
                            {!! Form::text('epf_number', old('epf_number'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('race', __('Race'),['class'=>'form-control-label']) !!}
                            {!! Form::text('race', old('race'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('office_number', __('Office Phone'),['class'=>'form-control-label']) !!}
                            {!! Form::text('office_number',old('office_number'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('old_ic_number', __('Old IC Number'),['class'=>'form-control-label']) !!}
                            {!! Form::text('old_ic_number', old('old_ic_number'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('socso_number', __('SOCSO  No.'),['class'=>'form-control-label']) !!}
                            {!! Form::text('socso_number', old('socso_number'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('religion', __('Religion'),['class'=>'form-control-label']) !!}
                            {!! Form::text('religion', old('religion'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('extension', __('Extension'),['class'=>'form-control-label']) !!}
                            {!! Form::text('extension', old('extension'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            {!! Form::label('address', __('Address'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]) !!}
                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid">
                    <div class="card-header"><h6 class="mb-0">{{__('Employment Information')}}</h6></div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Join Date', __('Join Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('join_date', null, ['class' => 'form-control datepicker']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Staff Number', __('Staff Number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('Staff_Number', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('Employmentdepartment_id', __('Department'),['class'=>'form-control-label']) }}<span class="text-danger pl-1">*</span>
                                {{ Form::select('Emp_department_id', $departments,null, array('class' => 'form-control  select2','required'=>'required')) }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('centre', __('Centre'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('centre', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Position', __('Position'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('Position', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('EmploymentType', __('Employment Type'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('emp_type', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Retirement Age', __('Retirement Age'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('Retirement_Age', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    {!! Form::label('Confirmation Status', __('Confirmation Status'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status" value="yes" name="emp_confimrationStatus" class="custom-control-input">
                                            <label class="custom-control-label" for="conf_status">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status1" value="no" name="emp_confimrationStatus" class="custom-control-input">
                                            <label class="custom-control-label" for="conf_status1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Confirmation Period', __('Confirmation Period'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::number('empConfirmation_Period', null, ['class' => 'form-control','min'=>0]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Confirmation Date', __('Confirmation Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('empConfirmation_date', null, ['class' => 'datepicker form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('work Permit No', __('work Permit No'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::number('workPermitNO', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('work permit Issued Date', __('work permit Issued Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('empWorkPermit_issuedate', null, ['class' => 'datepicker form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('work permit Expiry Date', __('work permit Expiry Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('empWorkPermit_Expirydate', null, ['class' => 'datepicker form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Contract Start Date', __('Contract Start Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('ContractStartdate', null, ['class' => 'datepicker form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Contract Expiry Date', __('Contract Expiry Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('ContractExpirydate', null, ['class' => 'datepicker form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Teching Permit No', __('Teching Permit No'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('TechingPermitNo', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Teching Permit Expipry Date', __('Teching Permit Expipry Date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('techingExpirydate', null, ['class' => 'datepicker form-control']) !!}
                            </div>

                            <div class="form-group col-md-6">
                                {!! Form::label('Category Employee', __('Category Employee'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('empCategory', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Company Detail')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <div class="row">

                        <div class="form-group col-md-12">
                            {!! Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']) !!}
                            {!! Form::text('employee_id', $employeesId, ['class' => 'form-control','disabled'=>'disabled']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('branch_id', __('Branch'),['class'=>'form-control-label']) }}
                            {{ Form::select('branch_id', $branches,null, array('class' => 'form-control  select2','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('department_id', __('Department'),['class'=>'form-control-label']) }}
                            {{ Form::select('department_id', $departments,null, array('class' => 'form-control  select2','id'=>'department_id','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-12">
                            {{ Form::label('designation_id', __('Designation'),['class'=>'form-control-label']) }}
                            <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="{{ __('Select Designation ...') }}">
                                <option value="">{{__('Select any Designation')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 ">
                            {!! Form::label('company_doj', __('Company Date Of Joining'),['class'=>'form-control-label']) !!}
                            {!! Form::date('company_doj', null, ['class' => 'form-control datepicker','required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Spouse Detail')}}</h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('nric', __('NRIC Number'),['class'=>'form-control-label']) !!}
                        {!! Form::text('nric', old('nric'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}
                        {!! Form::text('dob', old('dob'), ['class' => 'form-control datepicker']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('company_name', __('Company'),['class'=>'form-control-label']) !!}
                        {!! Form::text('company_name', old('company_name'), ['class' => 'form-control ']) !!}
                    </div>
                        <div class="form-group col-md-6">
                        {!! Form::label('nationality', __('Nationality'),['class'=>'form-control-label']) !!}
                        {!! Form::text('nationality', old('nationality'), ['class' => 'form-control ']) !!}
                    </div>
                        <div class="form-group col-md-6">
                        {!! Form::label('old_ic', __('Old IC Number'),['class'=>'form-control-label']) !!}
                        {!! Form::text('old_ic', old('old_ic'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group ">
                            {!! Form::label('gender', __('Gender'),['class'=>'form-control-label']) !!}
                            <div class="d-flex radio-check">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="gender_male" value="Male" name="spouse_gender" class="custom-control-input">
                                    <label class="custom-control-label" for="gender_male">{{__('Male')}}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="gender_female" value="Female" name="spouse_gender" class="custom-control-input">
                                    <label class="custom-control-label" for="gender_female">{{__('Female')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('positioin', __('Position'),['class'=>'form-control-label']) !!}
                        {!! Form::text('positioin', old('positioin'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Famaily  Detail')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="dynamicAddRemove">
                        <tr>
                            <th>{!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('relation', __('Relation'),['class'=>'form-control-label']) !!}</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][name]" placeholder="Enter name" class="form-control" />
                            </td>
                            <td><input type="text" name="addMoreInputFields[0][relation]" placeholder="Enter relation" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</div>

  <div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Document')}}</h6></div>
            <div class="card-body employee-detail-create-body">
                @foreach($documents as $key=>$document)
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="float-left col-4">
                                <label for="document" class="float-left pt-1 form-control-label">{{ $document->name }} @if($document->is_required == 1) <span class="text-danger">*</span> @endif</label>
                            </div>
                            <div class="float-right col-8">
                                <input type="hidden" name="emp_doc_id[{{ $document->id}}]" id="" value="{{$document->id}}">
                                <div class="choose-file form-group">
                                    <label for="document[{{ $document->id }}]">
                                        <div>{{__('Choose File')}}</div>
                                        <input class="form-control  @error('document') is-invalid @enderror border-0" @if($document->is_required == 1) required @endif name="document[{{ $document->id}}]" type="file" id="document[{{ $document->id }}]" data-filename="{{ $document->id.'_filename'}}">
                                    </label>
                                    <p class="{{ $document->id.'_filename'}}"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Bank Account Detail')}}</h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']) !!}
                        {!! Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('account_number', __('Account Number'),['class'=>'form-control-label']) !!}
                        {!! Form::number('account_number', old('account_number'), ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('bank_name', __('Bank Name'),['class'=>'form-control-label']) !!}
                        {!! Form::text('bank_name', old('bank_name'), ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('bank_identifier_code', __('Bank Identifier Code'),['class'=>'form-control-label']) !!}
                        {!! Form::text('bank_identifier_code',old('bank_identifier_code'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('branch_location', __('Branch Location'),['class'=>'form-control-label']) !!}
                        {!! Form::text('branch_location',old('branch_location'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('tax_payer_id', __('Tax Payer Id'),['class'=>'form-control-label']) !!}
                        {!! Form::text('tax_payer_id',old('tax_payer_id'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Staff Address')}}</h6></div>
            <div class="card-body employee-detail-create-body">
                {!! Form::label('post_address', __('PostAddress'),['class'=>'form-control-label']) !!}
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('post_address', __('Address'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::textarea('post_address',old('post_address'), ['class' => 'form-control','rows'=>2]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('post_postcode', __('code'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::text('post_postcode', old('post_postcode'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('post_state', __('State'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::text('post_state', old('post_state'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::label('per_address', __('PermenantAddress'),['class'=>'form-control-label']) !!}
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('per_address', __('Address'),['class'=>'form-control-label']) !!}
                        {!! Form::textarea('per_address',old('per_address'), ['class' => 'form-control','rows'=>2]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('per_postcode', __('code'),['class'=>'form-control-label']) !!}
                        {!! Form::text('per_postcode', old('per_postcode'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('per_state', __('State'),['class'=>'form-control-label']) !!}
                        {!! Form::text('per_state', old('per_state'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Emergency Contact')}}</h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-12">
                          {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('relation',__('Relation'),['class'=>'form-control-label'])}}
                        {{Form::select('relation',$options,null,array('class'=>'form-control select2','required'=>'required'))}}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Country', __('Country'),['class'=>'form-control-label']) !!}
                        {!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('state', __('State'),['class'=>'form-control-label']) !!}
                        {!! Form::text('state', old('state'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('city', __('City'),['class'=>'form-control-label']) !!}
                        {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('postcode', __('Postcode'),['class'=>'form-control-label']) !!}
                        {!! Form::text('postcode', old('postcode'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                            {!! Form::label('phone', __('Phone(H)'),['class'=>'form-control-label']) !!}
                            {!! Form::number('phone',old('phone'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                            {!! Form::label('phone_hp', __('Phone(HP)'),['class'=>'form-control-label']) !!}
                            {!! Form::number('phone_hp',old('phone_hp'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12 ">
                         {!! Form::label('address', __('Address'),['class'=>'form-control-label']) !!}
                        {!! Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Employment  History')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="history">
                        <tr>
                            <th>{!! Form::label('company_name', __('Company Name'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('position', __('Position'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('start_date', __('StartDate'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('end_date', __('EndDate'),['class'=>'form-control-label']) !!}</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="historyadd[0][company_name]" placeholder="Enter name" class="form-control" />
                            </td>
                            <td><input type="text" name="historyadd[0][position]" placeholder="Enter relation" class="form-control" />
                            </td>
                            <td><input class="form-control" type="date" name="historyadd[0][start_date]"/>
                            </td>
                            <td><input class="form-control" type="date" name="historyadd[0][end_date]"/>
                            </td>
                            <td><button type="button" name="add" id="dynamic-hr" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Dependant  information')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="information">
                        <tr>
                            <th>{!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('relation', __('relation'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('dob', __('Dob'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('status', __('Status'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('ic_number', __('Icnumber'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('handicap', __('Handicap'),['class'=>'form-control-label']) !!}</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="informationadd[0][name]" class="form-control" />
                            </td>
                            <td><input type="text" name="informationadd[0][relation]" class="form-control" />
                            </td>
                            <td><input class="form-control" type="date" name="informationadd[0][dob]"/>
                            </td>
                            <td><input type="text" name="informationadd[0][status]" class="form-control" />
                            </td>
                            <td><input type="text" name="informationadd[0][ic_number]" class="form-control" />
                            </td>
                             <td><input type="text" name="informationadd[0][handicap]" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-de" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Qualification')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="qualification">
                        <tr>
                            <th>{!! Form::label('qualification', __('Qualification'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('specialization', __('Specialization'),['class'=>'form-control-label']) !!}</th>
                             <th>{!! Form::label('insitution_name', __('InsitutionName'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('start_date', __('StartDate'),['class'=>'form-control-label']) !!}</th>
                            <th>{!! Form::label('end_date', __('EndDate'),['class'=>'form-control-label']) !!}</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="qualificationadd[0][qualification]" class="form-control" />
                            </td>
                            <td><input type="text" name="qualificationadd[0][specialization]" class="form-control" />
                            </td>
                            <td><input type="text" name="qualificationadd[0][insitution_name]" class="form-control" />
                            </td>
                            <td><input class="form-control" type="date" name="qualificationadd[0][start_date]"/>
                            </td>
                            <td><input class="form-control" type="date" name="qualificationadd[0][end_date]"/>
                            </td>
                            <td><button type="button" name="add" id="dynamic-qu" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="row" id="position">
    <div class="col-md-12 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Job Position')}}</h6>
            <button type="button" name="add" id="dynamic-po" class="btn btn-xs badge-blue ">Add</button>
            </div>
            <div class="card-body employee-detail-create-body">

                <div class="row">
                        <div class="form-group col-md-6 ">
                             <label class="form-control-label">Start date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][start_date]">

                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">End date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][end_date]">

                        </div>
                         <div class="form-group col-md-6">
                              <label class="form-control-label">Department</label>
                                                        <select class="form-control" name="positionadd[0][department_id]" id="department">
                                                             @foreach($jobposition as $department)
                                                                <option value="{{$department->id}}">{{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Position</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][position]">
                        </div>
                        <div class="form-group col-md-6">
                             <label class="form-control-label">EmploymentType</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][employment_type]">
                        </div>
                       <div class="form-group col-md-6 ">
                               <label class="form-control-label">Salary Code</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="code" value="Code" name="positionadd[0][salary_code]" class="custom-control-input">
                                        <label class="custom-control-label" for="code">{{__('Code')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="class_a" value="ClassA" name="positionadd[0][salary_code]" class="custom-control-input">
                                        <label class="custom-control-label" for="class_a">{{__('Class')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="grade" value="Grade" name="positionadd[0][salary_code]" class="custom-control-input">
                                        <label class="custom-control-label" for="grade">{{__('Grade')}}</label>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Remark</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][remark]">
                        </div>
                        <div class="form-group col-md-6 ">
                                <label class="form-control-label">Salary Code</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="yes" value="Yes" name="positionadd[0][confirmation_status]" class="custom-control-input">
                                        <label class="custom-control-label" for="yes">{{__('Yes')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="no" value="No" name="positionadd[0][confirmation_status]" class="custom-control-input">
                                        <label class="custom-control-label" for="no">{{__('No')}}</label>
                                    </div>
                                </div>
                        </div>
                         <div class="form-group col-md-6 ">
                             <label class="form-control-label">confirmation date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][confirmation_date]">
                        </div>
                        <div class="form-group col-md-6">
                             <label class="form-control-label">Confirmation Period</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][confirmation_period]">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Status</label>
                            <input type="text" class="form-control" id="" name="positionadd[0][status]">
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" id="language">
    <div class="col-md-12 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0">{{__('Linguistic Ability')}}</h6>
            <button type="button" name="add" id="dynamic-la" class="btn btn-xs badge-blue ">Add</button>
            </div>
            <div class="card-body employee-detail-create-body">

                <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Language</label>
                             <input type="text" class="form-control" id="" name="languageadd[0][position]">
                        </div>
                       <div class="form-group col-md-6 ">
                               <label class="form-control-label">Spoken</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excellent" value="Excellent" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="excellent">{{__('Excellent')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="very_good" value="Very Good" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="very_good">{{__('Very Good')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="good" value="Good" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="good">{{__('Good')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="poor" value="Poor" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="poor">{{__('Poor')}}</label>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-6 ">
                               <label class="form-control-label">Written</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excellents" value="Excellent" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="excellents">{{__('Excellent')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="very_goods" value="Very Good" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="very_goods">{{__('Very Good')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="goods" value="Good" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="goods">{{__('Good')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="poors" value="Poor" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="poors">{{__('Poor')}}</label>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        {!! Form::submit('Create', ['class' => 'btn btn-xs badge-blue float-right radius-10px']) !!}
            {{--</form>--}}
        {{Form::close()}}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

 @php
    $test=$jobposition;
    $store_dept='';
    foreach($jobposition as $value)
    {
        $store_dept.="<option value=".$value->id.">$value->name</option>";
    }



    @endphp

@push('script-page')

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields['+i+'][name]" placeholder="Enter name" class="form-control" /><td><input type="text" name="addMoreInputFields['+i+'][relation]" placeholder="Enter relation" class="form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

    </script>
     <script type="text/javascript">
        var l = 0;
        $("#dynamic-hr").click(function () {
            ++l;
            $("#history").append('<tr><td><input type="text" name="historyadd['+l+'][company_name]" placeholder="Enter name" class="form-control"/><td><input type="text" name="historyadd['+l+'][position]" placeholder="Enter position" class="form-control" /><td><input   class="form-control" type="date" name="historyadd['+l+'][start_date]"  class="datepicker form-control" /><td><input type="date"  class=" form-control" name="historyadd['+l+'][end_date]"  class="datepicker form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">
        var m = 0;
        $("#dynamic-de").click(function () {
            ++m;
            $("#information").append('<tr><td><input type="text" name="informationadd['+m+'][name]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="informationadd['+m+'][relation]" placeholder="Enter relation" class="form-control" /></td><td><input   class="form-control" type="date" name="informationadd['+m+'][dob]"  class=" form-control" /></td><td><input type="text"  class=" form-control" name="informationadd['+m+'][status]"  class="form-control" /></td><td><input type="text" name="informationadd['+m+'][ic_number]"  class="form-control"/></td><td><input type="text" name="informationadd['+m+'][handicap]"  class="form-control"/></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
     <script type="text/javascript">
        var n = 0;
        $("#dynamic-qu").click(function () {
            ++n;
            $("#qualification").append('<tr><td><input type="text" name="qualificationadd['+n+'][qualification]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="qualificationadd['+n+'][specialization]" placeholder="Enter position" class="form-control" /></td><td><input type="text" name="qualificationadd['+n+'][insitution_name]" placeholder="Enter name" class="form-control"/></td><td><input   class="form-control" type="date" name="qualificationadd['+n+'][start_date]"  class="datepicker form-control" /></td><td><input type="date"  class=" form-control" name="qualificationadd['+n+'][end_date]"  class="datepicker form-control" /></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">
        var n = 0;
        var p=1;
      $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">

        var g ='<?php echo  $store_dept ?>';


        var p = 1;
        $("#dynamic-po").click(function () {

            $("#position").append('<div class="row" id="textbox'+manicnt+'"><button type="button" class="btn btn-xs badge-danger remove">Delete</button><div class="col-md-12 "><div class="card card-fluid"><div class="card-header"></div><div class="card-body employee-detail-create-body"><div class="row">'+
            '<div class="form-group col-md-6 "><label class="form-control-label">Start date</label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][start_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">End date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][end_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Department</label> <select class="form-control" name="positionadd['+p+'][department_id]" id="department">'+g+'</select></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Position</label><input type="text" class="form-control" id="" name="positionadd['+p+'][position]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">EmploymentType</label><input type="text" class="form-control" id="" name="positionadd['+p+'][employment_type]"></div>'+
            '<div class="form-group col-md-6 "><label class="form-control-label">Salary Code</label><div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline">'+
            '<input type="radio" id="code['+p+']" value="Coded" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="code['+p+']">Code</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="class['+p+']" value="ClassA" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="class['+p+']">ClassA</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="grade['+p+']" value="Grade" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="grade['+p+']">Grade</label></div></div></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Remark</label><input type="text" class="form-control" id="" name="positionadd['+p+'][remark]"></div><div class="form-group col-md-6 "><label class="form-control-label">Salary Code</label>'+
            '<div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="yes['+p+']" value="Yes" name="positionadd['+p+'][confirmation_status]" class="custom-control-input"><label class="custom-control-label"  for="yes['+p+']">Yes</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="no['+p+']" value="No" name="positionadd['+p+'][confirmation_status]" class="custom-control-input"><label class="custom-control-label" for="no['+p+']">No</label></div></div></div>'+
            '<div class="form-group col-md-6 "><label class="form-control-label">confirmation date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][confirmation_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Confirmation Period</label><input type="text" class="form-control" id="" name="positionadd['+p+'][confirmation_period]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Status</label><input type="text" class="form-control" id="" name="positionadd['+p+'][status]"></div></div></div></div></div></div>'

            );
            p++;
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
        $(document).on('click', '.remove', function() {
        var del=$(this).parent().attr('id');
        $("#"+del).remove();
    });
    </script>
    <script>

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '{{route('employee.json')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }



var ij=190;
    $("#dynamic-la").click(function(){

        $("#language").append('<div class="container card-header" id="textbox'+ij+'"><button type="button" class="btn btn-xs badge-danger remove">Delete</button> <div class="col-md-12 " >'+
                '<div class="card card-fluid"><div class="card-body employee-detail-create-body">'+
                '<div class="row"><div class="form-group col-md-6"><label class="form-control-label">Language</label>'+
                '<input type="text" class="form-control" id="" name="languageadd['+ij+'][position]"></div>'+
                '<div class="form-group col-md-6 "><label class="form-control-label">Spoken</label><div class="d-flex radio-check">'+
                '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="excellent'+ij+'" value="Excellent" name="languageadd['+ij+'][spoken]" class="custom-control-input">'+
                '<label class="custom-control-label" for="excellent'+ij+'">Excellent</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="very_good'+ij+'" value="Very Good" name="languageadd['+ij+'][spoken]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="very_good'+ij+'">Very Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="good'+ij+'" value="Good" name="languageadd['+ij+'][spoken]"   class="custom-control-input">'+
                '<label class="custom-control-label" for="good'+ij+'">Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="poor'+ij+'" value="Poor" name="languageadd['+ij+'][spoken]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="poor'+ij+'">Poor</label></div></div></div><div class="form-group col-md-6 "><label class="form-control-label">Written</label>'+
                '<div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="excellents'+ij+'" value="Excellent" name="languageadd['+ij+'][written]"    class="custom-control-input">'+
                '<label class="custom-control-label" for="excellents'+ij+'">Excellent</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="very_goods'+ij+'" value="Very Good" name="languageadd['+ij+'][written]" class="custom-control-input">'+
                '<label class="custom-control-label" for="very_goods'+ij+'">Very Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
        '<input type="radio" id="goods'+ij+'" value="Good" name="languageadd['+ij+'][written]"  class="custom-control-input">'+
            '<label class="custom-control-label" for="goods'+ij+'">Good</label></div><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="poors'+ij+'" value="Poor" name="languageadd['+ij+'][written]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="poors'+ij+'">Poor</label></div></div></div></div></div></div></div></div>');
                ij++;
    });

    </script>
@endpush
