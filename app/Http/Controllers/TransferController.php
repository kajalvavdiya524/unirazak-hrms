<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Department;
use App\Employee;
use App\Mail\TransferSend;
use App\Transfer;
use App\Utility;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransferController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Transfer'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp       = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $transfers = Transfer::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $transfers = Transfer::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('transfer.index', compact('transfers'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Transfer'))
        {
            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branches    = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees   = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('transfer.create', compact('employees', 'departments', 'branches'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Transfer'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'branch_id' => 'required',
                                   'department_id' => 'required',
                                   'transfer_date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $transfer                = new Transfer();
            $transfer->employee_id   = $request->employee_id;
            $transfer->branch_id     = $request->branch_id;
            $transfer->department_id = $request->department_id;
            $transfer->transfer_date = $request->transfer_date;
            $transfer->description   = $request->description;
            $transfer->created_by    = \Auth::user()->creatorId();
            $transfer->save();

            $setings = Utility::settings();
            if($setings['employee_transfer'] == 1)
            {
                $employee             = Employee::find($transfer->employee_id);
                $branch               = Branch::find($transfer->branch_id);
                $department           = Department::find($transfer->department_id);
                $transfer->name       = $employee->name;
                $transfer->email      = $employee->email;
                $transfer->branch     = $branch->name;
                $transfer->department = $department->name;
                try
                {
                    Mail::to($transfer->email)->send(new TransferSend($transfer));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));
            }

            return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Transfer $transfer)
    {
        return view('transfer.show',compact('transfer'));
    }

    public function edit(Transfer $transfer)
    {
        if(\Auth::user()->can('Edit Transfer'))
        {
            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branches    = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees   = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                return view('transfer.edit', compact('transfer', 'employees', 'departments', 'branches'));
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

    public function update(Request $request, Transfer $transfer)
    {
        if(\Auth::user()->can('Edit Transfer'))
        {
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'branch_id' => 'required',
                                       'department_id' => 'required',
                                       'transfer_date' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $transfer->employee_id   = $request->employee_id;
                $transfer->branch_id     = $request->branch_id;
                $transfer->department_id = $request->department_id;
                $transfer->transfer_date = $request->transfer_date;
                $transfer->description   = $request->description;
                $transfer->save();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully updated.'));
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

    public function destroy(Transfer $transfer)
    {
        if(\Auth::user()->can('Delete Transfer'))
        {
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                $transfer->delete();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully deleted.'));
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
        $transfer = Transfer::find($request->transfer_id);
        $st='';
        $notify    = new Notify();
        if(Auth::user()->type == 'hr')
        {
                if($request->status=='Approval')
                {
                    $st='Approval';
                    $transfer->hr_transfer_approve=1;
                    $notify->body="Hr Approve Transfer request";
                }
                elseif($request->status=='Reject')
                {
                    $st='Reject';
                    $transfer->hr_transfer_approve=2;
                    $notify->body="Hr Reject Transfer request";
                }
                $notify->from_id=Auth::user()->id;
                $notify->to_id=$transfer->employee_id;
        }
        if(Auth::user()->type == 'company' || Auth::user()->type == 'super admin')
        {
            if($request->status=='Approval')
            {
                $st='Approval';
                $transfer->hod_transfer_approve=1;
                $notify->body="HOD Approve Transfer request";
            }
            elseif($request->status=='Reject')
            {
                $st='Reject';
                $transfer->hod_transfer_approve=2;
                $notify->body="HOD Reject Transfer request";

            }
            $notify->from_id=Auth::user()->id;
            $notify->to_id=$transfer->employee_id;
        }
        if($transfer->status == 'Approval')
        {
            $transfer->department_id = $request->department_id;
            $transfer->transfer_date = $request->transfer_date;
            $transfer->description   = $request->description;
            $transfer->status           = $st;
        }
        $notify->created_by=Auth::user()->id;

        $transfer->save();
        $notify->save();
        return redirect()->route('transfer.index')->with('success', __('Transfer status successfully updated.'));
    }
}
