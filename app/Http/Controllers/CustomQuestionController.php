<?php

namespace App\Http\Controllers;

use App\CustomQuestion;
use Illuminate\Http\Request;

class CustomQuestionController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Custom Question'))
        {
            $questions = CustomQuestion::where('created_by', \Auth::user()->creatorId())->get();

            return view('customQuestion.index', compact('questions'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        $is_required = CustomQuestion::$is_required;

        return view('customQuestion.create', compact('is_required'));
    }

    public function store(Request $request)
    {
        // dd(json_encode($request->all()));

        
        if(\Auth::user()->can('Create Custom Question'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'custome_question' => 'required',                              
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $checkbox_title = json_encode($request->checkboxtitle);
            $radio_title = json_encode($request->radiobtntitle);
            $dropdown_title = json_encode($request->dropdowntitle);

     
            $question              = new CustomQuestion();
            $question->question    = $request->question;
            $question->is_required = $request->is_required;
            $question->custome_question = $request->custome_question;
            $kj=0;
            if(!empty($request->question)){
                $question->custome_title = $request->question;
                $question->custome_option = $request->is_required;
                $kj++;
            }

            if(!empty($request->checkboxtitle))
            {
                $checkbox_option = json_encode($request->checkboxoptionname);
                if($checkbox_option)
                {
                    if(empty($request->checkboxoptionname))
                    {
                        return redirect()->back()->with('error','Please Add Checkbox option');

                    }else
                    {
                        $question->checkbox_title = $checkbox_title;
                        $question->checkbox_option = $checkbox_option;
                        $kj++;

                    }
                }

            }

            if(!empty($request->radiobtntitle))
            {
                $radio_option = json_encode($request->radiobtnoptionname);
                if($radio_option){
                    if(empty($request->radiobtnoptionname))
                    {
                        return redirect()->back()->with('error','Please Add Radiobox option');

                    }else
                    {                
                        $question->radio_title = $radio_title;
                        $question->radio_option = $radio_option;
                        $kj++;

                    }
                }

            }

            if(!empty($request->dropdowntitle))
            {
                $dropdown_option = json_encode($request->dropdownoptionname);
                if($dropdown_option){
                    if(empty($request->dropdownoptionname))
                    {
                        return redirect()->back()->with('error','Please Add Dropdown Option');

                    }else
                    {
                          
                        $question->dropdown_title = $dropdown_title;
                        $question->dropdown_option = $dropdown_option;
                        $kj++;

                    }
                }

            }

                if($kj==0)
                {
                    return redirect()->back()->with('error', 'Please Fill the Form');

                }
               
                    $question->created_by  = \Auth::user()->creatorId();

                    // dd($question);
                    $question->save();
        
                    return redirect()->back()->with('success', __('Question successfully created.'));
               
            
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(CustomQuestion $customQuestion)
    {
        //
    }

    public function edit(CustomQuestion $customQuestion)
    {
        $is_required = CustomQuestion::$is_required;
        return view('customQuestion.edit', compact('customQuestion','is_required'));
    }

    public function update(Request $request, CustomQuestion $customQuestion)
    {
         //dd($request->all());
        if(\Auth::user()->can('Edit Custom Question'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'custome_question' => 'required', 
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $checkbox_title = json_encode($request->checkboxtitle);
            $radio_title = json_encode($request->radiobtntitle);
            $dropdown_title = json_encode($request->dropdowntitle);

            $customQuestion->question    = $request->question;
            $customQuestion->is_required = $request->is_required;
            $customQuestion->custome_question = $request->custome_question;
            $kj=0;
            if($request->question){
                $customQuestion->custome_title = $request->question;
                $customQuestion->custome_option = $request->is_required;
                $kj++;
            }
           
            if(!empty($request->checkboxtitle))
            {
                $checkbox_option = json_encode($request->checkboxoptionname);
                if($checkbox_option)
                {
                    if(empty($request->checkboxoptionname))
                    {
                        return redirect()->back()->with('error','Please Add checkbox Option');

                    }else{

                        $customQuestion->checkbox_title = $checkbox_title;
                        $customQuestion->checkbox_option = $checkbox_option;
                        $kj++;
                    }
                }

            }

            if(!empty($request->radiobtntitle))
            {
                $radio_option = json_encode($request->radiobtnoptionname);
                if($radio_option){
                    if(empty($request->radiobtnoptionname))
                    {
                        return redirect()->back()->with('error','Please Add Radiobox Option');

                    }else{
                        $customQuestion->radio_title = $radio_title;
                        $customQuestion->radio_option = $radio_option;
                        $kj++;
                    }
                }

            }

           if(!empty($request->dropdowntitle))
            {
                   $dropdown_option = json_encode($request->dropdownoptionname);
                     if($dropdown_option){
                        if(empty($request->dropdownoptionname))
                        {
                            return redirect()->back()->with('error','Please Add dropdown Option');
    
                        }else{
                            $customQuestion->dropdown_title = $dropdown_title;
                            $customQuestion->dropdown_option = $dropdown_option;
                            $kj++;
                        }
                    }
                
            }

            if($kj==0)
            {
                return redirect()->back()->with('error', 'Please Fill the Form');

            }

            $customQuestion->save();

            return redirect()->back()->with('success', __('Question successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(CustomQuestion $customQuestion)
    {
        if(\Auth::user()->can('Delete Custom Question'))
        {
            $customQuestion->delete();

            return redirect()->back()->with('success', __('Question successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
