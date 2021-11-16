<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\TerminationSend;
use App\Termination;
use App\TerminationType;
use App\Utility;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TerminationController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Termination'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp          = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $terminations = Termination::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $terminations = Termination::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('termination.index', compact('terminations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Termination'))
        {
            $employees        = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $terminationtypes = TerminationType::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('termination.create', compact('employees', 'terminationtypes'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Termination'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'termination_type' => 'required',
                                   'notice_date' => 'required',
                                   'termination_date' => 'required',
                                    'documents.*' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,zip|max:20480',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
                if(!empty($request->documents))
            {
                $filenameWithExt = $request->file('documents')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('documents')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/documentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('documents')->storeAs('uploads/documentUpload/', $fileNameToStore);
            }

            $termination                   = new Termination();
            $termination->employee_id      = $request->employee_id;
            $termination->termination_type = $request->termination_type;
            $termination->notice_date      = $request->notice_date;
            $termination->termination_date = $request->termination_date;
            $termination->description      = $request->description;
             $termination->documents    = !empty($request->documents) ? $fileNameToStore : '';
            $termination->created_by       = \Auth::user()->creatorId();
            $termination->save();

            $setings = Utility::settings();
            if($setings['employee_termination'] == 1)
            {
                $employee           = Employee::find($termination->employee_id);
                $termination->name  = $employee->name;
                $termination->email = $employee->email;
                $termination->type  = TerminationType::find($termination->termination_type);

                try
                {
                    Mail::to($termination->email)->send(new TerminationSend($termination));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('termination.index')->with('success', __('Termination  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));

            }

            return redirect()->route('termination.index')->with('success', __('Termination  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Termination $termination)
    {
        return view('termination.show',compact('termination'));
    }

    public function edit(Termination $termination)
    {
        if(\Auth::user()->can('Edit Termination'))
        {
            $employees        = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $terminationtypes = TerminationType::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($termination->created_by == \Auth::user()->creatorId())
            {

                return view('termination.edit', compact('termination', 'employees', 'terminationtypes'));
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

    public function update(Request $request, Termination $termination)
    {
        if(\Auth::user()->can('Edit Termination'))
        {
            if($termination->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'termination_type' => 'required',
                                       'notice_date' => 'required',
                                       'termination_date' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                if(!empty($request->documents))
            {

                $filenameWithExt = $request->file('documents')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('documents')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/documentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('documents')->storeAs('uploads/documentUpload/', $fileNameToStore);

                if(!empty($termination->documents))
                {
                    unlink($dir . $termination->documents);
                }

            }

                $termination->employee_id      = $request->employee_id;
                $termination->termination_type = $request->termination_type;
                $termination->notice_date      = $request->notice_date;
                $termination->termination_date = $request->termination_date;
                $termination->description      = $request->description;
                 if(!empty($request->documents))
            {
                $termination->documents = !empty($request->documents) ? $fileNameToStore : '';
            }
                $termination->save();

                return redirect()->route('termination.index')->with('success', __('Termination successfully updated.'));
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

    public function destroy(Termination $termination)
    {
        if(\Auth::user()->can('Delete Termination'))
        {
            if($termination->created_by == \Auth::user()->creatorId())
            {
                $termination->delete();
                $dir = storage_path('uploads/documentUpload/');

                if(!empty($termination->documents))
                {
                    unlink($dir . $termination->documents);
                }
                return redirect()->route('termination.index')->with('success', __('Termination successfully deleted.'));
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
        $termination = Termination::find($request->termination_id);
        $st='';
        $notify    = new Notify();
        if(Auth::user()->type == 'hr')
        {
                if($request->status=='Approval')
                {
                    $st='Approval';
                    $termination->hr_termination_approve=1;
                    $notify->body="Hr Approve Termination request";
                }
                elseif($request->status=='Reject')
                {
                    $st='Reject';
                    $termination->hr_termination_approve=2;
                    $notify->body="Hr Reject Termination request";
                }
                $notify->from_id=Auth::user()->id;
                $notify->to_id=$termination->employee_id;

        }
        if(Auth::user()->type == 'company' || Auth::user()->type == 'super admin')
        {
            if($request->status=='Approval')
            {
                $st='Approval';
                $termination->hod_termination_approve=1;
                $notify->body="HOD Approve Termination request";

            }
            elseif($request->status=='Reject')
            {
                $st='Reject';
                $termination->hod_termination_approve=2;
                $notify->body="HOD Reject Termination request";
            }
            $notify->from_id=Auth::user()->id;
            $notify->to_id=$termination->employee_id;
        }
        if($termination->status == 'Approval')
        {
             $termination->termination_type = $request->termination_type;
            $termination->notice_date      = $request->notice_date;
            $termination->termination_date = $request->termination_date;
            $termination->description      = $request->description;
        }
        $notify->created_by=Auth::user()->id;

        $termination->save();
        $notify->save();
        return redirect()->route('termination.index')->with('success', __('Termination status successfully updated.'));
    }
}
