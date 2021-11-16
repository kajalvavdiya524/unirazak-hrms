<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\ResignationSend;
use App\Resignation;
use App\User;
use App\Utility;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResignationController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Resignation'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp          = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $resignations = Resignation::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $resignations = Resignation::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('resignation.index', compact('resignations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Resignation'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('resignation.create', compact('employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Resignation'))
        {

            $validator = \Validator::make(
                $request->all(), [

                                   'notice_date' => 'required',
                                   'resignation_date' => 'required',
                                   'document'=>'required'
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if($request->hasfile('document')){
                $filenameWithExt = $request->file('document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/documentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('document')->storeAs('uploads/documentUpload/', $fileNameToStore);


            $resignation = new Resignation();
            $user        = \Auth::user();
            if($user->type == 'employee')
            {
                $employee                 = Employee::where('user_id', $user->id)->first();
                $resignation->employee_id = $employee->id;
            }
            else
            {
                $resignation->employee_id = $request->employee_id;
            }

            $resignation->notice_date      = $request->notice_date;
            $resignation->resignation_date = $request->resignation_date;
            $resignation->description      = $request->description;
            $resignation->document         = $fileNameToStore;
            $resignation->terms_conditions = $request->Termsconditions;
            $resignation->created_by       = \Auth::user()->creatorId();

            $resignation->save();

            $setings = Utility::settings();
            if($setings['employee_resignation'] == 1)
            {
                $employee           = Employee::find($resignation->employee_id);
                $resignation->name  = $employee->name;
                $resignation->email = $employee->email;
                try
                {
                    Mail::to($resignation->email)->send(new ResignationSend($resignation));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }


                $user           = User::find($employee->created_by);
                $resignation->name  = $user->name;
                $resignation->email = $user->email;
                try
                {
                    Mail::to($resignation->email)->send(new ResignationSend($resignation));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));

            }

        }else
        {
            return redirect()->back()->with('error', 'Please upload Documents');
        }

            return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Resignation $resignation)
    {
        return view('resignation.show',compact('resignation'));
    }

    public function edit(Resignation $resignation)
    {
        if(\Auth::user()->can('Edit Resignation'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($resignation->created_by == \Auth::user()->creatorId())
            {

                return view('resignation.edit', compact('resignation', 'employees'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Resignation $resignation)
    {
        if(\Auth::user()->can('Edit Resignation'))
        {
            if($resignation->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [

                                       'notice_date' => 'required',
                                       'resignation_date' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                if(\Auth::user()->type != 'employee')
                {
                    $resignation->employee_id = $request->employee_id;
                }





                $resignation->notice_date      = $request->notice_date;
                $resignation->resignation_date = $request->resignation_date;
                $resignation->description      = $request->description;
                $resignation->terms_conditions = $request->Termsconditions;


                if($request->hasfile('document')){

                    $filenameWithExt = $request->file('document')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('document')->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $dir             = storage_path('uploads/documentUpload/');

                    if(!file_exists($dir))
                    {
                        mkdir($dir, 0777, true);
                    }
                    $path = $request->file('document')->storeAs('uploads/documentUpload/', $fileNameToStore);

                    $resignation->document= $fileNameToStore;
                    $resignation->save();

                }


                $resignation->save();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully updated.'));
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

    public function destroy(Resignation $resignation)
    {
        if(\Auth::user()->can('Delete Resignation'))
        {
            if($resignation->created_by == \Auth::user()->creatorId())
            {
                $resignation->delete();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully deleted.'));
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
    public function changeaction(Request $request)
    {
        $resignation = Resignation::find($request->resignation_id);
        $st='';
        $notify    = new Notify();
        if(Auth::user()->type == 'hr')
        {
                if($request->status=='Approval')
                {
                    $st='Approval';
                    $resignation->hr_resignation_approve=1;
                    $notify->body="Hr Approve Resignation";
                }
                elseif($request->status=='Reject')
                {
                    $st='Reject';
                    $resignation->hr_resignation_approve=2;
                    $notify->body="Hr Reject Resignation";
                }
                $notify->from_id=Auth::user()->id;
                $notify->to_id=$resignation->employee_id;
        }
        if(Auth::user()->type == 'company' || Auth::user()->type == 'super admin')
        {
            if($request->status=='Approval')
            {
                $st='Approval';
                $resignation->hod_resignation_approve=1;
                $notify->body="HOD Approve Resignation";
            }
            elseif($request->status=='Reject')
            {
                $st='Reject';
                $resignation->hod_resignation_approve=2;
                $notify->body="HOD Reject Resignation";
            }
            $notify->from_id=Auth::user()->id;
            $notify->to_id=$resignation->employee_id;
        }
        if($resignation->status == 'Approval')
        {
            $resignation->notice_date      = $request->notice_date;
            $resignation->resignation_date = $request->resignation_date;
            $resignation->description      = $request->description;
            $resignation->status           = $st;
        }
        $notify->created_by=Auth::user()->id;

        $resignation->save();
        $notify->save();
        return redirect()->route('resignation.index')->with('success', __('Resignation status successfully updated.'));
    }
}
