<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Employee;
use App\Mail\ComplaintsSend;
use App\Utility;
use App\HrNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Complaint'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp        = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $complaints = Complaint::where('complaint_from', '=', $emp->id)->get();
            }
            else
            {
                $complaints = Complaint::where('created_by', '=', \Auth::user()->creatorId())->get();
            }
            return view('complaint.index', compact('complaints'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Complaint'))
        {
            if(Auth::user()->type == 'employee')
            {
                $user             = \Auth::user();
                $current_employee = Employee::where('user_id', $user->id)->get()->pluck('name', 'id');
                $employees        = Employee::where('user_id', '!=', $user->id)->get()->pluck('name', 'id');

            }
            else
            {
                $user             = \Auth::user();
                $current_employee = Employee::where('user_id', $user->id)->get()->pluck('name', 'id');
                $employees = Employee::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            }


            return view('complaint.create', compact('employees', 'current_employee'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Complaint'))
        {
            if(\Auth::user()->type != 'employee')
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'complaint_from' => 'required',
                                   ]
                );
            }

            $validator = \Validator::make(
                $request->all(), [
                                   'complaint_against' => 'required',
                                   'title' => 'required',
                                   'complaint_date' => 'required',
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

            $complaint = new Complaint();
             // notifcation send to HR
             $notifyHR=new HrNotify();

            if(\Auth::user()->type == 'employee')
            {
                $emp                       = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $complaint->complaint_from = $emp->id;
                $notifyHR->from_id =$emp->id;
            }
            else
            {
                $complaint->complaint_from = $request->complaint_from;
                $notifyHR->from_id = $request->complaint_from;

            }
            $complaint->complaint_against = $request->complaint_against;
            $complaint->title             = $request->title;
            $complaint->complaint_date    = $request->complaint_date;
            $complaint->description       = $request->description;
            $complaint->documents    = !empty($request->documents) ? $fileNameToStore : '';
            $complaint->created_by        = \Auth::user()->creatorId();
            $complaint->save();



            $notifyHR->Hr_id ='3';
            $notifyHR->body =$request->description;
            $notifyHR->title =$request->title;
            $notifyHR->link ='complaint';
            $notifyHR->save();

            $setings = Utility::settings();

            if($setings['employee_complaints'] == 1)
            {
                $employee         = Employee::find($complaint->complaint_against);
                $complaint->name  = $employee->name;
                $complaint->email = $employee->email;

                try
                {
                    Mail::to($complaint->email)->send(new ComplaintsSend($complaint));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('complaint.index')->with('success', __('Complaint  successfully created.') .(isset($smtp_error) ? $smtp_error : ''));
            }

            return redirect()->route('complaint.index')->with('success', __('Complaint  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Complaint $complaint)
    {
        return redirect()->route('complaint.index');
    }

    public function edit($complaint)
    {
        $complaint = Complaint::find($complaint);
        if(\Auth::user()->can('Edit Complaint'))
        {
            if(Auth::user()->type == 'employee')
            {
                $user             = \Auth::user();
                $current_employee = Employee::where('user_id', $user->id)->get()->pluck('name', 'id');
                $employees        = Employee::where('user_id', '!=', $user->id)->get()->pluck('name', 'id');
            }
            else
            {
                $user             = \Auth::user();
                $current_employee = Employee::where('user_id', $user->id)->get()->pluck('name', 'id');
                $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            }
            if($complaint->created_by == \Auth::user()->creatorId())
            {
                return view('complaint.edit', compact('complaint', 'employees', 'current_employee'));
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

    public function update(Request $request, Complaint $complaint)
    {
        if(\Auth::user()->can('Edit Complaint'))
        {
            if($complaint->created_by == \Auth::user()->creatorId())
            {
                if(\Auth::user()->type != 'employee')
                {
                    $validator = \Validator::make(
                        $request->all(), [
                                           'complaint_from' => 'required',
                                       ]
                    );
                }

                $validator = \Validator::make(
                    $request->all(), [

                                       'complaint_against' => 'required',
                                       'title' => 'required',
                                       'complaint_date' => 'required',
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

                if(!empty($complaint->documents))
                {
                    unlink($dir . $complaint->documents);
                }

            }
                if(\Auth::user()->type == 'employee')
                {
                    $emp                       = Employee::where('user_id', '=', \Auth::user()->id)->first();
                    $complaint->complaint_from = $emp->id;
                }
                else
                {
                    $complaint->complaint_from = $request->complaint_from;
                }
                $complaint->complaint_against = $request->complaint_against;
                $complaint->title             = $request->title;
                $complaint->complaint_date    = $request->complaint_date;
                $complaint->description       = $request->description;
                 if(!empty($request->documents))
            {
                $complaint->documents = !empty($request->documents) ? $fileNameToStore : '';
            }

                $complaint->save();

                return redirect()->route('complaint.index')->with('success', __('Complaint successfully updated.'));
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

    public function destroy(Complaint $complaint)
    {
        if(\Auth::user()->can('Delete Complaint'))
        {
            if($complaint->created_by == \Auth::user()->creatorId())
            {
                $complaint->delete();
                 $dir = storage_path('uploads/documentUpload/');

                if(!empty($complaint->documents))
                {
                    unlink($dir . $complaint->documents);
                }

                return redirect()->route('complaint.index')->with('success', __('Complaint successfully deleted.'));
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
}
