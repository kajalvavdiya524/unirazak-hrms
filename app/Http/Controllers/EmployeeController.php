<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Department;
use App\Designation;
use App\Document;
use App\Employee;
use App\EmployeeDocument;
use App\Mail\UserCreate;
use App\Plan;
use App\User;
use App\Spouse;
use App\Family;
use App\StaffAddress;
use App\EmploymentHistory;
use App\DependantInformation;
use App\Qualification;
use App\JobPosition;
use App\Utility;
use App\EmergencyContact;
use App\LinguisticAbility;
use App\JobCategory;
use File;
use App\EmploymentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

//use Faker\Provider\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Auth::user()->can('Manage Employee'))
        {
            if(Auth::user()->type == 'employee')
            {
                $employees = Employee::where('user_id', '=', Auth::user()->id)->get();
            }
            else
            {
                // $employees = Employee::where('created_by', \Auth::user()->creatorId())->get();
                $employees = Employee::orderBy('employees.id', 'desc')
                ->leftjoin('employmentinformation', 'employmentinformation.user_id', '=', 'employees.id')
                ->where('created_by', \Auth::user()->creatorId())
                ->select('employmentinformation.Staff_Number','employmentinformation.Employment_Type','employees.id', 'employees.name','employees.email','employees.employee_id','employees.branch_id','employees.department_id','employees.department_id','employees.designation_id','employees.company_doj')
                ->get();

            }

            return view('employee.index', compact('employees'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Employee'))
        {
            $company_settings = Utility::settings();
            $documents        = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches         = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments      = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations     = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees        = User::where('created_by', \Auth::user()->creatorId())->get();
            $employeesId      = \Auth::user()->employeeIdFormat($this->employeeNumber());
            $jobposition      = Department::where('created_by', \Auth::user()->creatorId())->get();
            $options       = EmergencyContact::$options;
            $emp_type      =Employee::$options;
            $emp_addtype= Employee::$options_ADDEmp;
            $category = JobCategory::where('created_by', \Auth::user()->creatorId())->get()->pluck('title','id');

            return view('employee.create', compact('category','emp_addtype','emp_type','employees', 'employeesId','jobposition','options', 'departments', 'designations', 'documents', 'branches', 'company_settings'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Employee'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'username' => 'required',
                                   'dob' => 'required',
                                   'gender' => 'required',
                                   'phone' => 'required',
                                   'address' => 'required',
                                   'email' => 'required|unique:users',
                                   'password' => 'required',
                                   'join_date'=> 'required',
                                   'Staff_Number'=> 'required',
                                   'department_id' => 'required',
                                   'centre' => 'required',
                                   'Retirement_Age' => 'required',
                                   'empConfirmation_Period' => 'required',
                                   'document.*' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->withInput()->with('error', $messages->first());
            }


            $objUser        = User::find(\Auth::user()->creatorId());
            $total_employee = $objUser->countEmployees();
            $plan           = Plan::find($objUser->plan);

           if($total_employee < $plan->max_employees || $plan->max_employees ==-1 )
            {
                $user = User::create(
                    [
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'type' => 'employee',
                        'lang' => 'en',
                        'created_by' => \Auth::user()->creatorId(),
                    ]
                );
                $user->save();
                $user->assignRole('Employee');
            }

            else
            {

                return redirect()->back()->with('error', __('Your employee limit is over, Please upgrade plan.'));
            }


            if(!empty($request->document) && !is_null($request->document))
            {
                $document_implode = implode(',', array_keys($request->document));
            }
            else
            {
                $document_implode = null;
            }

            $employee = Employee::create(
                [
                    'user_id' => $user->id,
                    'name' => $request['username'],
                    'dob' => $request['dob'],
                    'gender' => $request['gender'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'employee_id' => $this->employeeNumber(),
                    'branch_id' => $request['branch_id'],
                    'department_id' => $request['department_id'],
                    'designation_id' => $request['designation_id'],
                    'company_doj' => $request['company_doj'],
                    'documents' => $document_implode,
                    'account_holder_name' => $request['account_holder_name'],
                    'account_number' => $request['account_number'],
                    'bank_name' => $request['bank_name'],
                    'bank_identifier_code' => $request['bank_identifier_code'],
                    'branch_location' => $request['branch_location'],
                    'tax_payer_id' => $request['tax_payer_id'],
                    'title' => $request['title'],
                    'ic_number' => $request['ic_number'],
                    'epf_number' => $request['epf_number'],
                    'race' => $request['race'],
                    'office_number' => $request['office_number'],
                    'old_ic_number' => $request['old_ic_number'],
                    'marital_status' => $request['marital_status'],
                    'socso_number' => $request['socso_number'],
                    'religion' => $request['religion'],
                    'extension' => $request['extension'],
                    'created_by' => \Auth::user()->creatorId(),
                ]
            );

                $EmploymentInformation =EmploymentInformation::create(
                    [
                        'user_id'=> $user->id,
                        'Join_Date' => $request['join_date'],
                        'Staff_Number' =>$request['Staff_Number'],
                        'Department' =>$request['Emp_department_id'],
                        'Centre' =>$request['centre'],
                        'Position' =>$request['Position'],
                        'Employment_Type' =>$request['emp_type'],
                        'Retirement_Age' =>$request['Retirement_Age'],
                        'Confirmation_Status' =>$request['emp_confimrationStatus'],
                        'Confirmation_Period' =>$request['empConfirmation_Period'],
                        'Confirmation_Date' =>$request['empConfirmation_date'],
                        'work_Permit_No' =>$request['workPermitNO'],
                        'work_permit_Issued_Date' =>$request['empWorkPermit_issuedate'],
                        'work_permit_Expiry_Date' =>$request['empWorkPermit_Expirydate'],
                        'Contract_Start_Date' =>$request['ContractStartdate'],
                        'Contract_Expiry_Date' =>$request['ContractExpirydate'],
                        'Teching_Permit_No' =>$request['TechingPermitNo'],
                        'Teching_Permit_Expipry_Date' =>$request['techingExpirydate'],
                        'Category_Employee' =>$request['empCategory'],
                        'setting_emp'=>$request['emp_setting'],
                    ]
                );




              $spouse = Spouse::create(
                [
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'nric' => $request['nric'],
                    'dob' => $request['dob'],
                    'company_name' => $request['company_name'],
                    'nationality' => $request['nationality'],
                    'old_ic' => $request['old_ic'],
                    'gender' => $request['spouse_gender'],
                    'positioin' => $request['positioin'],

                ]
            );

          		if($request->addMoreInputFields){


            foreach($request->addMoreInputFields as $key => $value){
                Family::create([
                     'user_id' => $user->id,
                     'name' => $value['name'],
                     'relation' => $value['relation'],
                 ]);
            }
                }

             $staff = StaffAddress::create(
                [
                    'user_id' => $user->id,
                    'post_address' => $request['post_address'],
                    'post_postcode' => $request['post_postcode'],
                    'post_state' => $request['post_state'],
                    'per_address' => $request['per_address'],
                    'per_postcode' => $request['per_postcode'],
                    'per_state' => $request['per_state'],
                ]
            );

          		if($request->historyadd){
             foreach($request->historyadd as $key => $value){
                EmploymentHistory::create([
                     'user_id' => $user->id,
                     'company_name' => $value['company_name'],
                     'position' => $value['position'],
                     'start_date' => $value['start_date'],
                     'end_date' => $value['end_date'],
                 ]);
            }
                }

          if($request->informationadd)
			{
            foreach($request->informationadd as $key => $value){
                DependantInformation::create([
                    'user_id' => $user->id,
                    'name' => $value['name'],
                    'relation' => $value['relation'],
                    'dob' => $value['dob'],
                    'ic_number' => $value['ic_number'],
                    'status' => $value['status'],
                    'handicap' => $value['handicap'],

                 ]);
            }
          }

          if($request->qualificationadd){


            foreach($request->qualificationadd as $key => $value){
                Qualification::create([
                     'user_id' => $user->id,
                     'qualification' => $value['qualification'],
                     'specialization' => $value['specialization'],
                     'insitution_name' => $value['insitution_name'],
                     'start_date' => $value['start_date'],
                     'end_date' => $value['end_date'],
                 ]);
            }
          }

          if($request->positionadd){
            foreach($request->positionadd as $key => $value){
                JobPosition::create([
                     'user_id' => $user->id,
                     'start_date' => $value['start_date'],
                     'end_date' => $value['end_date'],
                    'department_id' => $value['department_id'],
                     'position' => $value['position'],
                     'employment_type' => $value['employment_type'],
                      'salary_code' => $value['salary_code'],
                     'remark' => $value['remark'],
                     'confirmation_status' => $value['confirmation_status'],
                     'status' => $value['status'],
                     'confirmation_date' => $value['confirmation_date'],
                     'confirmation_period' => $value['confirmation_period'],

                 ]);
            }
          }

             $emergency = EmergencyContact::create(
                [
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'relation' => $request['relation'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'country' => $request['country'],
                    'city' => $request['city'],
                    'phone' => $request['phone'],
                    'phone_hp' => $request['phone_hp'],
                    'postcode' => $request['postcode'],
                    'address' => $request['address'],

                ]
            );

          	if($request->languageadd){
            foreach($request->languageadd as $key => $value){
                LinguisticAbility::create([
                     'user_id' =>$user->id,
                     'language' => $value['position'],
                     'spoken' => $value['spoken'],
                    'written' => $value['written'],
                 ]);
            }
            }

            if($request->hasFile('document'))
            {

                foreach($request->document as $key => $document)
                {

                    $filenameWithExt = $request->file('document')[$key]->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('document')[$key]->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $dir             = storage_path('uploads/document/');
                    $image_path      = $dir . $filenameWithExt;

                    if(File::exists($image_path))
                    {
                        File::delete($image_path);
                    }

                    if(!file_exists($dir))
                    {
                        mkdir($dir, 0777, true);
                    }
                    $path              = $request->file('document')[$key]->storeAs('uploads/document/', $fileNameToStore);
                    $employee_document = EmployeeDocument::create(
                        [
                            'employee_id' => $employee['employee_id'],
                            'document_id' => $key,
                            'document_value' => $fileNameToStore,
                            'created_by' => \Auth::user()->creatorId(),
                        ]
                    );
                    $employee_document->save();

                }

            }

            $setings = Utility::settings();
            if($setings['employee_create'] == 1)
            {
                $user->type     = 'Employee';
                $user->password = $request['password'];
                try
                {
                    Mail::to($user->email)->send(new UserCreate($user));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('employee.index')->with('success', __('Employee successfully created.') . (isset($smtp_error) ? $smtp_error : ''));

            }

            return redirect()->route('employee.index')->with('success', __('Employee  successfully created.'));

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit($id)
    {
         $id = Crypt::decrypt($id);

        if(\Auth::user()->can('Edit Employee'))
        {
            $newid        = Employee::where('id',$id)->first();
            $lateshnew=$newid->user_id;


            $documents    = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = Employee::find($id);
            $spouse       = Spouse::where('user_id',$id)->first();
            $family       = Family::where('user_id',$id)->get();
            $options       = EmergencyContact::$options;
            $emergency = EmergencyContact::where('user_id',$id)->first();
            $employeesId  = \Auth::user()->employeeIdFormat($employee->employee_id);
            $StaffAddress =StaffAddress::where('user_id',$id)->first();
            $EmploymentHistory = EmploymentHistory::where('user_id',$id)->get();
            $DependantInformation=DependantInformation::where('user_id',$id)->get();
            $Qualification =Qualification::where('user_id',$id)->get();
            $jobposition      = Department::where('created_by', \Auth::user()->creatorId())->get();
            $dataJobPosition =JobPosition::where('user_id',$id)->get();
            $LinguisticAbility= LinguisticAbility::where('user_id',$id)->get();
            $EmploymentInformation =EmploymentInformation::where('user_id',$id)->first();
            $emp_type      =Employee::$options;
            $emp_addtype= Employee::$options_ADDEmp;
            $category = JobCategory::where('created_by', \Auth::user()->creatorId())->get()->pluck('title','id');

            return view('employee.edit', compact('category','emp_addtype','emp_type','EmploymentInformation','LinguisticAbility','dataJobPosition','jobposition','Qualification','DependantInformation','EmploymentHistory','StaffAddress','emergency','options','employee', 'employeesId','spouse', 'family','branches', 'departments', 'designations', 'documents'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'userdob' => 'required',
                                   'gender' => 'required',
                                   'phone' => 'required|numeric',
                                   'address' => 'required',
                                   'document.*' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            $employee = Employee::findOrFail($id);
            $spouse  = Spouse::where('user_id',$id)->first();
            $emergency  = EmergencyContact::where('user_id',$id)->first();
            $family = Family::where('user_id',$id)->get();
            DependantInformation::where('user_id',$id)->delete();
            $DependantInformation =DependantInformation::where('user_id',$id)->get();
            Qualification::where('user_id',$id)->delete();
            $Qualification = Qualification::where('user_id',$id)->get();
            JobPosition::where('user_id',$id)->delete();
            $JobPosition =JobPosition::where('user_id',$id)->get();
            LinguisticAbility::where('user_id',$id)->delete();
            $LinguisticAbility= LinguisticAbility::where('user_id',$id)->get();
            $EmploymentInformation=EmploymentInformation::where('user_id',$id)->first();
            if($EmploymentInformation)
            {

            $EmploymentInformation->update(
                [
                    'user_id'=> $id,
                    'Join_Date' => $request['join_date'],
                    'Staff_Number' =>$request['Staff_Number'],
                    'Department' =>$request['Emp_department_id'],
                    'Centre' =>$request['centre'],
                    'Position' =>$request['Position'],
                    'Employment_Type' =>$request['emp_type'],
                    'Retirement_Age' =>$request['Retirement_Age'],
                    'Confirmation_Status' =>$request['emp_confimrationStatus'],
                    'Confirmation_Period' =>$request['empConfirmation_Period'],
                    'Confirmation_Date' =>$request['empConfirmation_date'],
                    'work_Permit_No' =>$request['workPermitNO'],
                    'work_permit_Issued_Date' =>$request['empWorkPermit_issuedate'],
                    'work_permit_Expiry_Date' =>$request['empWorkPermit_Expirydate'],
                    'Contract_Start_Date' =>$request['ContractStartdate'],
                    'Contract_Expiry_Date' =>$request['ContractExpirydate'],
                    'Teching_Permit_No' =>$request['TechingPermitNo'],
                    'Teching_Permit_Expipry_Date' =>$request['techingExpirydate'],
                    'Category_Employee' =>$request['empCategory'],
                    'setting_emp'=>$request['emp_setting'],

                ]
            );
            }
            else
            {
                EmploymentInformation::create(
                    [
                        'user_id'=> $id,
                        'Join_Date' => $request['join_date'],
                        'Staff_Number' =>$request['Staff_Number'],
                        'Department' =>$request['Emp_department_id'],
                        'Centre' =>$request['centre'],
                        'Position' =>$request['Position'],
                        'Employment_Type' =>$request['emp_type'],
                        'Retirement_Age' =>$request['Retirement_Age'],
                        'Confirmation_Status' =>$request['emp_confimrationStatus'],
                        'Confirmation_Period' =>$request['empConfirmation_Period'],
                        'Confirmation_Date' =>$request['empConfirmation_date'],
                        'work_Permit_No' =>$request['workPermitNO'],
                        'work_permit_Issued_Date' =>$request['empWorkPermit_issuedate'],
                        'work_permit_Expiry_Date' =>$request['empWorkPermit_Expirydate'],
                        'Contract_Start_Date' =>$request['ContractStartdate'],
                        'Contract_Expiry_Date' =>$request['ContractExpirydate'],
                        'Teching_Permit_No' =>$request['TechingPermitNo'],
                        'Teching_Permit_Expipry_Date' =>$request['techingExpirydate'],
                        'Category_Employee' =>$request['empCategory'],
                    ]
                );

            }


            $employee->update(
                [
                    'name' => $request['username'],
                    'dob' => $request['userdob'],
                    'gender' => $request['gender'],
                    'phone' => $request['userphone'],
                    'address' => $request['address'],
                    'branch_id' => $request['branch_id'],
                    'department_id' => $request['department_id'],
                    'designation_id' => $request['designation_id'],
                    'company_doj' => $request['company_doj'],
                    'account_holder_name' => $request['account_holder_name'],
                    'account_number' => $request['account_number'],
                    'bank_name' => $request['bank_name'],
                    'bank_identifier_code' => $request['bank_identifier_code'],
                    'branch_location' => $request['branch_location'],
                    'tax_payer_id' => $request['tax_payer_id'],
                    'title' => $request['title'],
                    'ic_number' => $request['ic_number'],
                    'epf_number' => $request['epf_number'],
                    'race' => $request['race'],
                    'office_number' => $request['office_number'],
                    'old_ic_number' => $request['old_ic_number'],
                    'marital_status' => $request['marital_status'],
                    'socso_number' => $request['socso_number'],
                    'religion' => $request['religion'],
                    'extension' => $request['extension'],
                ]
            );

            if($LinguisticAbility->isEmpty())
            {
              if($request->languageadd){
                foreach($request->languageadd as $key => $value){
                    LinguisticAbility::create([
                         'user_id' => $id,
                         'language' => $value['position'],
                         'spoken' => $value['spoken'],
                        'written' => $value['written'],
                     ]);
                }
              }
            }

            if($JobPosition->isEmpty())
            {
              if($request->positionadd){
            foreach($request->positionadd as $key => $value){
                JobPosition::create([
                     'user_id' => $id,
                     'start_date' => $value['jobstart_date'],
                     'end_date' => $value['jobend_date'],
                    'department_id' => $value['jobdepartment_id'],
                     'position' => $value['jobposition'],
                     'employment_type' => $value['jobemployment_type'],
                      'salary_code' => $value['jobsalary_code'],
                     'remark' => $value['jobremark'],
                     'confirmation_status' => $value['jobconfirmation_status'],
                     'status' => $value['jobstatus'],
                     'confirmation_date' => $value['jobconfirmation_date'],
                     'confirmation_period' => $value['jobconfirmation_period'],

                 ]);
            }
              }
        }



            if($Qualification->isEmpty())
            {
              if($request->qualificationadd){
            foreach($request->qualificationadd as $key => $value){
                Qualification::create([
                     'user_id' => $id,
                     'qualification' => $value['qualification'],
                     'specialization' => $value['specialization'],
                     'insitution_name' => $value['insitution_name'],
                     'start_date' => $value['start_date'],
                     'end_date' => $value['end_date'],
                 ]);
            }
              }
        }


            if($DependantInformation->isEmpty())
            {
					if($request->informationadd){
                foreach($request->informationadd as $key => $value){
                    DependantInformation::create([
                        'user_id' => $id,
                        'name' => $value['name'],
                        'relation' => $value['relation'],
                        'dob' => $value['dob'],
                        'ic_number' => $value['ic_number'],
                        'status' => $value['status'],
                        'handicap' => $value['handicap'],

                     ]);
                }
                    }
            }




            if($emergency)
            {
                $emergency->update(
                    [
                        'name' => $request['name'],
                        'relation' => $request['relation'],
                        'city' => $request['city'],
                        'state' => $request['state'],
                        'country' => $request['country'],
                        'city' => $request['city'],
                        'phone' => $request['phone'],
                        'phone_hp' => $request['phone_hp'],
                        'postcode' => $request['postcode'],
                        'address' => $request['address'],
                    ]
                );
            }
            else
            {
                $emergency = EmergencyContact::create(
                    [
                        'user_id' => $id,
                        'name' => $request['name'],
                        'relation' => $request['relation'],
                        'city' => $request['city'],
                        'state' => $request['state'],
                        'country' => $request['country'],
                        'city' => $request['city'],
                        'phone' => $request['phone'],
                        'phone_hp' => $request['phone_hp'],
                        'postcode' => $request['postcode'],
                        'address' => $request['address'],
                    ]
                );
            }

            if($request->document)
            {

                foreach($request->document as $key => $document)
                {
                    if(!empty($document))
                    {
                        $filenameWithExt = $request->file('document')[$key]->getClientOriginalName();
                        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension       = $request->file('document')[$key]->getClientOriginalExtension();
                        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                        $dir        = storage_path('uploads/document/');
                        $image_path = $dir . $filenameWithExt;

                        if(File::exists($image_path))
                        {
                            File::delete($image_path);
                        }
                        if(!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }
                        $path = $request->file('document')[$key]->storeAs('uploads/document/', $fileNameToStore);


                        $employee_document = EmployeeDocument::where('employee_id', $employee->employee_id)->where('document_id', $key)->first();

                        if(!empty($employee_document))
                        {
                            $employee_document->document_value = $fileNameToStore;
                            $employee_document->save();
                        }
                        else
                        {
                            $employee_document                 = new EmployeeDocument();
                            $employee_document->employee_id    = $employee->employee_id;
                            $employee_document->document_id    = $key;
                            $employee_document->document_value = $fileNameToStore;
                            $employee_document->save();
                        }

                    }
                }
            }

            $employee = Employee::findOrFail($id);

               if($spouse)
               {

                $spouse->update(
                    [
                        'user_id' => $id,
                        'name' => $request['spousename'],
                        'nric' => $request['nric'],
                        'dob' => $request['spousedob'],
                        'company_name' => $request['company_name'],
                        'nationality' => $request['nationality'],
                        'old_ic' => $request['old_ic'],
                        'gender' => $request['spouse_gender'],
                        'positioin' => $request['positioin'],

                    ]
                );
               }
               else
               {

                $spouse = Spouse::create(
                    [
                        'user_id' => $id,
                        'name' => $request['spousename'],
                        'nric' => $request['nric'],
                        'dob' => $request['spousedob'],
                        'company_name' => $request['company_name'],
                        'nationality' => $request['nationality'],
                        'old_ic' => $request['old_ic'],
                        'gender' => $request['spouse_gender'],
                        'positioin' => $request['positioin'],

                    ]
                );
               }



            // staff
            $staff =StaffAddress::where('user_id',$id)->first();

            if($staff)
                {

                    $staff->update(
                        [
                            'post_address' => $request['post_address'],
                            'post_postcode' => $request['post_postcode'],
                            'post_state' => $request['post_state'],
                            'per_address' => $request['per_address'],
                            'per_postcode' => $request['per_postcode'],
                            'per_state' => $request['per_state'],
                        ]
                    );
                }else
                {
                    StaffAddress::create(
                        [
                            'user_id' => $id,
                            'post_address' => $request['post_address'],
                            'post_postcode' => $request['post_postcode'],
                            'post_state' => $request['post_state'],
                            'per_address' => $request['per_address'],
                            'per_postcode' => $request['per_postcode'],
                            'per_state' => $request['per_state'],
                        ]
                    );
                }



            // family
            Family::where('user_id',$id)->delete();
            $family = Family::where('user_id',$id)->get();
            // history add
            EmploymentHistory::where('user_id',$id)->delete();
            $empHistory=EmploymentHistory::where('user_id',$id)->get();

            // $input    = $request->all();
            // $employee->fill($input)->save();
            // $spouse->fill($input)->save();
            // $emergency->fill($input)->save();
               if($family->isEmpty())
               {
						if($request->addMoreInputFields){
                foreach($request->addMoreInputFields as $key => $value){
                    Family::create([
                         'user_id' => $id,
                         'name' => $value['name'],
                         'relation' => $value['relation'],
                     ]);
                }
                        }

               }

                if($empHistory->isEmpty())
                {
					if($request->historyadd)
                    {

                   foreach($request->historyadd as $key => $value){
                       EmploymentHistory::create([
                           'user_id' => $id,
                           'company_name' => $value['company_name'],
                           'position' => $value['position'],
                           'start_date' => $value['start_date'],
                           'end_date' => $value['end_date'],
                        ]);
                    }
                   }
                }





            // if($request->salary)
            // {
            //     return redirect()->route('setsalary.index')->with('success', 'Employee successfully updated.');
            // }
            // if(\Auth::user()->type != 'employee')
            // {
            //     return redirect()->route('employee.index')->with('success', 'Employee successfully updated.');
            // }
            // else
            // {
            //     return redirect()->route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id))->with('success', 'Employee successfully updated.');
            // }

            return redirect()->route('employee.index')->with('success', 'Employee successfully updated.');


        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy($id)
    {

        if(Auth::user()->can('Delete Employee'))
        {
            $employee      = Employee::findOrFail($id);
            $user          = User::where('id', '=', $employee->user_id)->first();
            $emp_documents = EmployeeDocument::where('employee_id', $employee->employee_id)->get();
            $employee->delete();
            $user->delete();
            $dir = storage_path('uploads/document/');
            foreach($emp_documents as $emp_document)
            {
                $emp_document->delete();
                if(!empty($emp_document->document_value))
                {
                    unlink($dir . $emp_document->document_value);
                }

            }

            return redirect()->route('employee.index')->with('success', 'Employee successfully deleted.');
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function show($id)
    {
        if(\Auth::user()->can('Show Employee'))
        {
            $empId        = Crypt::decrypt($id);
            $documents    = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = Employee::find($empId);
            $spouse       = Spouse::where('user_id',$employee->user_id)->first();
            $staffaddress = StaffAddress::where('user_id',$employee->user_id)->get();
            $family       = Family::where('user_id',$employee->user_id)->get();
            $history      = EmploymentHistory::where('user_id',$employee->user_id)->get();
            $information  =DependantInformation::where('user_id',$employee->user_id)->get();
            $qualification =Qualification::where('user_id',$employee->user_id)->get();
            $emergency       = EmergencyContact::where('user_id',$employee->user_id)->get();
            $employeesId  = \Auth::user()->employeeIdFormat($employee->employee_id);


            return view('employee.show', compact('employee','staffaddress','qualification','information','emergency', 'history','employeesId','family', 'branches', 'departments', 'designations', 'documents','spouse'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function json(Request $request)
    {
        $designations = Designation::where('department_id', $request->department_id)->get()->pluck('name', 'id')->toArray();

        return response()->json($designations);
    }

    function employeeNumber()
    {
        $latest = Employee::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->employee_id + 1;
    }

    public function profile(Request $request)
    {
        if(\Auth::user()->can('Manage Employee Profile'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId());
            if(!empty($request->branch))
            {
                $employees->where('branch_id', $request->branch);
            }
            if(!empty($request->department))
            {
                $employees->where('department_id', $request->department);
            }
            if(!empty($request->designation))
            {
                $employees->where('designation_id', $request->designation);
            }
            $employees = $employees->get();

            $brances = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $brances->prepend('All', '');

            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments->prepend('All', '');

            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations->prepend('All', '');

            return view('employee.profile', compact('employees', 'departments', 'designations', 'brances'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function profileShow($id)
    {
        if(\Auth::user()->can('Show Employee Profile'))
        {
            $empId        = Crypt::decrypt($id);
            $documents    = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = Employee::find($empId);
            $employeesId  = \Auth::user()->employeeIdFormat($employee->employee_id);

            return view('employee.show', compact('employee', 'employeesId', 'branches', 'departments', 'designations', 'documents'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function lastLogin()
    {
        $users = User::where('created_by', \Auth::user()->creatorId())->get();

        return view('employee.lastLogin', compact('users'));
    }

    public function employeeJson(Request $request)
    {
        $employees = Employee::where('branch_id', $request->branch)->get()->pluck('name', 'id')->toArray();

        return response()->json($employees);
    }
}
