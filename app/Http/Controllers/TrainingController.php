<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Employee;
use App\Trainer;
use App\Training;
use App\Department;
use App\join_training;
use App\TrainingType;
use App\Designation;
use App\User;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class TrainingController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Training'))
        {
            $trainings = Training::where('created_by', '=', \Auth::user()->creatorId())->get();
            $status    = Training::$Status;


            return view('training.index', compact('trainings', 'status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('Create Training'))
        {
            $designations  = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department    = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branches      = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainingTypes = TrainingType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainers      = Trainer::where('created_by', \Auth::user()->creatorId())->get()->pluck('firstname', 'id');
            $employees     = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $options       = Training::$options;
            $is_required   = Training::$is_required;

            return view('training.create', compact('branches', 'trainingTypes', 'trainers', 'employees', 'options','is_required','department','designations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Training'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'training_type' => 'required',
                                   'training_cost' => 'required',
                                   'employee' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                                   'department'=> 'required',
                                   'Designation'=> 'required',
                                   'ProgramTitle'=> 'required',
                                   'ProgramVenue'=> 'required',
                                   'Organize'=> 'required',
                                   'contactPerson'=> 'required',
                                   'city'=> 'required',
                                   'state'=> 'required',
                                   'country'=> 'required',
                                   'postcode'=> 'required',
                                   'phone'=> 'required|max:10',
                                   'email'=> 'required',
                                   'costby'=> 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $training                 = new Training();
            $training->branch         = $request->branch;
            $training->trainer_option = $request->trainer_option;
            $training->training_type  = $request->training_type;
            $training->trainer        = $request->trainer;
            $training->training_cost  = $request->training_cost;
            $training->employee       = $request->employee;
            $training->start_date     = $request->start_date;
            $training->end_date       = $request->end_date;
            $training->description    = $request->description;
            $training->department    = $request->department;
            $training->designation    = $request->Designation;
            $training->program_title    = $request->ProgramTitle;
            $training->program_venue    = $request->ProgramVenue;
            $training->employee_no    = $request->employee_No;
            $training->organize    = $request->Organize;
            $training->contact_person    = $request->contactPerson;
            $training->address    = $request->Address;
            $training->city    = $request->city;
            $training->state    = $request->state;
            $training->country    = $request->country;
            $training->postcode    = $request->postcode;
            $training->phone    = $request->phone;
            $training->fax    = $request->fax;
            $training->email    = $request->email;
            $training->website    = $request->website;
            $training->approved_status    = $request->approved_status;
            $training->costby =$request->costby;

            $training->created_by   = \Auth::user()->creatorId();
            $training->save();

            return redirect()->route('training.index')->with('success', __('Training successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show($id)
    {
        $traId       = Crypt::decrypt($id);
        $training    = Training::find($traId);
        $performance = Training::$performance;
        $status      = Training::$Status;
        $user     = User::all();
        return view('training.show', compact('training', 'performance', 'status','user'));
    }


    public function edit(Training $training)
    {
        if(\Auth::user()->can('Create Training'))
        {
            $designations  = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department    = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branches      = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainingTypes = TrainingType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainers      = Trainer::where('created_by', \Auth::user()->creatorId())->get()->pluck('firstname', 'id');
            $employees     = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $options       = Training::$options;
            $is_required   = Training::$is_required;

            return view('training.edit', compact('is_required','department','designations','branches', 'trainingTypes', 'trainers', 'employees', 'options', 'training'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Training $training)
    {
        if(\Auth::user()->can('Edit Training'))
        {

            $validator = \Validator::make(
                $request->all(), [
                    'branch' => 'required',
                    'training_type' => 'required',
                    'training_cost' => 'required',
                    'employee' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'department'=> 'required',
                    'Designation'=> 'required',
                    'ProgramTitle'=> 'required',
                    'ProgramVenue'=> 'required',
                    'Organize'=> 'required',
                    'contactPerson'=> 'required',
                    'city'=> 'required',
                    'state'=> 'required',
                    'country'=> 'required',
                    'postcode'=> 'required',
                    'phone'=> 'required|max:10',
                    'email'=> 'required',
                    'costby'=> 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $training->branch         = $request->branch;
            $training->trainer_option = $request->trainer_option;
            $training->training_type  = $request->training_type;
            $training->trainer        = $request->trainer;
            $training->training_cost  = $request->training_cost;
            $training->employee       = $request->employee;
            $training->start_date     = $request->start_date;
            $training->end_date       = $request->end_date;
            $training->description    = $request->description;
            $training->department    = $request->department;
            $training->designation    = $request->Designation;
            $training->program_title    = $request->ProgramTitle;
            $training->program_venue    = $request->ProgramVenue;
            $training->employee_no    = $request->employee_No;
            $training->organize    = $request->Organize;
            $training->contact_person    = $request->contactPerson;
            $training->address    = $request->Address;
            $training->city    = $request->city;
            $training->state    = $request->state;
            $training->country    = $request->country;
            $training->postcode    = $request->postcode;
            $training->phone    = $request->phone;
            $training->fax    = $request->fax;
            $training->email    = $request->email;
            $training->website    = $request->website;
            $training->approved_status    = $request->approved_status;
            $training->costby =$request->costby;
            $training->save();

            return redirect()->route('training.index')->with('success', __('Training successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Training $training)
    {
        if(\Auth::user()->can('Delete Training'))
        {
            if($training->created_by == \Auth::user()->creatorId())
            {
                $training->delete();

                return redirect()->route('training.index')->with('success', __('Training successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function updateStatus(Request $request)
    {
        $training              = Training::find($request->id);
        $training->performance = $request->performance;
        $training->status      = $request->status;
        $training->remarks     = $request->remarks;
        $training->save();

        return redirect()->route('training.index')->with('success', __('Training status successfully updated.'));
    }
    public function trainingLinkCreateAccess($id)
    {
        $id = Crypt::decrypt($id);
        if(\Auth::user()->can('Create Training'))
        {
            $designations  = Designation::where('created_by', \Auth::user()->creatorId())->get();
            $department    = Department::where('created_by', \Auth::user()->creatorId())->get();
            $branches      = Branch::where('created_by', \Auth::user()->creatorId())->get();
            $trainingTypes = TrainingType::where('created_by', \Auth::user()->creatorId())->get();
            $trainers      = Trainer::where('created_by', \Auth::user()->creatorId())->get();
            $employees     = Employee::where('created_by', \Auth::user()->creatorId())->get();
            $options       = Training::$options;
            $is_required   = Training::$is_required;
            $createform    = Training::find($id);

            return view('training.staffregisterTraining', compact('createform','branches', 'trainingTypes', 'trainers', 'employees', 'options','is_required','department','designations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function approvestatus($id)
    {
        $status= DB::table('join_training')
        ->join('trainings', 'join_training.training_id', '=', 'trainings.id')
        ->where('join_training.user_id',$id)
        ->select('join_training.*', 'trainings.start_date','trainings.end_date','trainings.training_cost','trainings.training_type')
        ->first();

        $trainingTypes = TrainingType::where('created_by', \Auth::user()->creatorId())->get();
        return view('training.approvalStatus',compact('status','trainingTypes'));

    }
    public function submitapprovestatus(Request $request)
    {
        $training = join_training::find($request->id);

        $notify    = new Notify();
        if(\Auth::user()->type == 'hr')
        {
                if($request->status == '1')
                {
                    $training->hr_cost_approval=$request->status;
                    $notify->body="Hr Approve Training request";
                }
                elseif($request->status == '2')
                {
                    $training->hr_cost_approval=$request->status;
                    $notify->body="Hr Reject Training request";
                    $training->hr_remarks=$request->remaks;

                }
                $notify->from_id=\Auth::user()->id;
                $notify->to_id=$training->user_id;

        }
        if(\Auth::user()->type == 'company')
        {
            if($request->status == '1')
                {
                    $training->hod_cost_approval=$request->status;
                    $notify->body="HOD Approve Training request";
                }
                elseif($request->status == '2')
                {
                    $training->hod_cost_approval=$request->status;
                    $notify->body="HOD Reject Training request";
                    $training->hod_remarks=$request->remaks;
                }
                $notify->from_id=\Auth::user()->id;
                $notify->to_id=$training->user_id;

        }
        $notify->created_by=\Auth::user()->id;
        $notify->save();


        $training->save();
        return redirect()->route('training.joinTrainingList')->with('success', __('Training status successfully updated.'));

    }
    public function joinTraning(Request $request)
    {


        $validator = \Validator::make(
            $request->all(), [
                               'reason_joining' => 'required',
                               'traing_task' => 'required',
                               'rate_yourself' => 'required',
                               'training_condition' => 'required',
                               'improve_your_work_details' => 'required',
                               'apply_the_knowledge' => 'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $results = join_training::where('training_id', '=', $request->training_id)
                    ->where('user_id', '=', \Auth::user()->id)
                    ->get();
            if(!$results->isEmpty())
            {
                return redirect()->back()->with('error', 'Already join the training');
            }
            else
            {
                $join_training                 = new join_training();

                $employee = Employee::where('user_id', '=', \Auth::user()->id)->first();

                if(\Auth::user()->type == "employee")
                {
                    $join_training->user_id = $employee->id;
                }
                else
                {
                    $join_training->user_id = $request->employee_id;
                }

                $join_training->training_id         = $request->training_id;
                $join_training->reason_joining         = $request->reason_joining;
                $join_training->training_task         = $request->traing_task;
                $join_training->rate_job         = $request->rate_yourself;
                $join_training->training_condition         = implode(',',$request->training_condition);
                $join_training->improve_work_details         = $request->improve_your_work_details;
                $join_training->apply_knowledge         = $request->apply_the_knowledge;
                $join_training->created_by         = \Auth::user()->id;
                $join_training->save();
                return redirect()->back()->with('success', __('Successfully Join Training .'));
            }
    }

    public function joinTrainingList(Request $request)
    {
        if(\Auth::user()->can('Manage Training'))
        {


            $join_training = join_training::leftjoin('trainings', 'join_training.training_id', '=', 'trainings.id');
            $join_training->leftjoin('employees','trainings.employee','=','employees.id');
            if($request->has('start_date')) {
                 $query= $join_training->where('trainings.start_date', '>=', $request->start_date)->where('trainings.start_date', '<=', $request->end_date);
                 $query= $join_training->orWhere('employees.name', $request->name);
            }else{
                $query = join_training::leftjoin('trainings', 'join_training.training_id', '=', 'trainings.id');

            }
            $join_train = $query->get();

               $designations  = Designation::where('created_by', \Auth::user()->creatorId())->get();
                $department    = Department::where('created_by', \Auth::user()->creatorId())->get();
                $branches      = Branch::where('created_by', \Auth::user()->creatorId())->get();
                $trainingTypes = TrainingType::where('created_by', \Auth::user()->creatorId())->get();
                $trainers      = Trainer::where('created_by', \Auth::user()->creatorId())->get();
                $employees     = Employee::where('created_by', \Auth::user()->creatorId())->get();
            return view('training.joinTraingList', compact('employees','trainers','join_train', 'designations','department','branches','trainingTypes'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function FilterTrainerList(Request $request)
    {
        $get_all_user = join_training::where('created_at', '>=', $request->start)
        ->where('created_at', '<=', $request->end)
        ->get();

        dd($get_all_user);

    }

    public function joinstatus($id)
    {
        $status= DB::table('join_training')
        ->join('trainings', 'join_training.training_id', '=', 'trainings.id')
        ->where('join_training.user_id',$id)
        ->select('join_training.*', 'trainings.start_date','trainings.end_date','trainings.training_cost','trainings.training_type')
        ->first();

        return view('training.JoinTrainingForm',compact('status'));

    }
    public function joinSubmit(Request $request)
    {
        $training = join_training::find($request->id);
        $training->reason_joining = $request->reasonjoining;
        $training->join_status=1;
        $training->save();
        return redirect()->route('training.joinTrainingList')->with('success', __('Join successfully updated.'));

    }

    public function RatingForm($id)
    {
        $status= DB::table('join_training')
        ->join('trainings', 'join_training.training_id', '=', 'trainings.id')
        ->where('join_training.user_id',$id)
        ->select('join_training.*', 'trainings.start_date','trainings.end_date','trainings.training_cost','trainings.training_type')
        ->first();

        $performance = Training::$performance;
        $statusdropdwon     = Training::$Status;

        return view('training.Evaluation-Form',compact('status','performance','statusdropdwon'));
    }

    public function SubmitEvalutionForm(Request $request)
    {
          $id=\Auth::user()->id;

          $training = join_training::find($request->id2);
          $training->rating_performance = $request->performance;
          $training->rating_status=$request->status;
          $training->rating_remarks=$request->remarks;
          $training->save();
         return redirect()->route('training.joinTrainingList')->with('success', __('Rating successfully added.'));

    }



}
