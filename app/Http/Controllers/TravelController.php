<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\TripSend;
use App\Travel;
use App\Utility;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class TravelController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Travel'))
        {
            if(Auth::user()->type == 'employee')
            {
                $emp     = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $travels = Travel::where('created_by', '=', \Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $travels = Travel::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('travel.index', compact('travels'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Travel'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('travel.create', compact('employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Travel'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                                   'purpose_of_visit' => 'required',
                                   'place_of_visit' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $travel                   = new Travel();
            $travel->employee_id      = $request->employee_id;
            $travel->start_date       = $request->start_date;
            $travel->end_date         = $request->end_date;
            $travel->purpose_of_visit = $request->purpose_of_visit;
            $travel->place_of_visit   = $request->place_of_visit;
            $travel->description      = $request->description;
            $travel->created_by       = \Auth::user()->creatorId();
            $travel->save();

            $setings = Utility::settings();
            if($setings['employee_trip'] == 1)
            {
                $employee      = Employee::find($travel->employee_id);
                $travel->name  = $employee->name;
                $travel->email = $employee->email;

                try
                {
                    Mail::to($travel->email)->send(new TripSend($travel));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('travel.index')->with('success', __('Travel  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));

            }

            return redirect()->route('travel.index')->with('success', __('Travel  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Travel $travel)
    {
        return view('travel.show',compact('travel'));
    }

    public function edit(Travel $travel)
    {

        if(\Auth::user()->can('Edit Travel'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if($travel->created_by == \Auth::user()->creatorId())
            {
                return view('travel.edit', compact('travel', 'employees'));
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

    public function update(Request $request, Travel $travel)
    {
        if(\Auth::user()->can('Edit Travel'))
        {
            if($travel->created_by == \Auth::user()->creatorId())
            {

                $validator = \Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'start_date' => 'required',
                                       'end_date' => 'required',
                                       'purpose_of_visit' => 'required',
                                       'place_of_visit' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $travel->employee_id      = $request->employee_id;
                $travel->start_date       = $request->start_date;
                $travel->end_date         = $request->end_date;
                $travel->purpose_of_visit = $request->purpose_of_visit;
                $travel->place_of_visit   = $request->place_of_visit;
                $travel->description      = $request->description;
                $travel->save();

                return redirect()->route('travel.index')->with('success', __('Travel successfully updated.'));
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

    public function destroy(Travel $travel)
    {
        if(\Auth::user()->can('Delete Travel'))
        {
            if($travel->created_by == \Auth::user()->creatorId())
            {
                $travel->delete();

                return redirect()->route('travel.index')->with('success', __('Travel successfully deleted.'));
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
        $travel = Travel::find($request->travel_id);
        $st='';
        if(Auth::user()->type == 'hr')
        {
                if($request->status=='Approval')
                {
                    $st='Approval';
                    $travel->hr_travel_approve=1;
                }
                elseif($request->status=='Reject')
                {
                    $st='Reject';
                    $travel->hr_travel_approve=2;
                }

        }
        if(Auth::user()->type == 'company' || Auth::user()->type == 'super admin')
        {
            if($request->status=='Approval')
            {
                $st='Approval';
                $travel->hod_travel_approve=1;
            }
            elseif($request->status=='Reject')
            {
                $st='Reject';
                $travel->hod_travel_approve=2;
            }
            $employees = Employee::all();
            foreach($employees as $value)
            {
                $notify    = new Notify();
                $notify->body="Travel / Trip  ".$st;
                $notify->from_id=\Auth::user()->id;
                $notify->to_id=$value->id;
                $notify->created_by=\Auth::user()->id;
                $notify->save();
            }

        }
        if($travel->status == 'Approval')
        {
            $startDate               = new \DateTime($travel->start_date);
            $endDate                 = new \DateTime($travel->end_date);
            $travel->purpose_of_visit = $request->purpose_of_visit;
            $travel->place_of_visit   = $request->place_of_visit;
            $travel->description      = $request->description;
            $travel->status           = $st;
        }
        $travel->save();
            return redirect()->route('travel.index')->with('success', __('Travel status successfully updated.'));
    }
}
