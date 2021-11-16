<div class="card bg-none card-box">
    {{Form::model($customQuestion,array('route' => array('custom-question.update', $customQuestion->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                
                {{Form::label('Custome Question',__('Custome Question'),['class'=>'form-control-label'])}}
                <select name="custome_question" id="inputbox" class="form-control select2" onchange="customeQuestion(this.value)">
                    <option value="">Select Controls</option>
                    <option value="1" {{ $customQuestion->custome_question == 1 ? 'selected="selected"' : '' }} >Textbox</option>
                    <option value="2" {{ $customQuestion->custome_question == 2 ? 'selected="selected"' : '' }}>Checkbox</option>
                    <option value="3" {{ $customQuestion->custome_question == 3 ? 'selected="selected"' : '' }}>Radio-Button</option>
                    <option value="4" {{ $customQuestion->custome_question == 4 ? 'selected="selected"' : '' }}>Dropdown</option>
                </select>
            </div>
        </div>
        @if($customQuestion->custome_title !="null")
        <div class="createTextboxdata col-sm-12">
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('question',__('Question'),['class'=>'form-control-label'])}}
                    {{Form::text('question',null,array('class'=>'form-control','placeholder'=>__('Enter question')))}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('is_required',__('Is Required'),['class'=>'form-control-label'])}}
                    {{ Form::select('is_required', $is_required,null, array('class' => 'form-control select2','required'=>'required')) }}
                </div>
            </div>
        </div>
        @endif
        @php 
            $gobalcnt=1;
            $cnt=0;
            // dd($customQuestion->radio_title);
        @endphp
           @if($customQuestion->checkbox_title != "null")
            @php
            $title=json_decode($customQuestion->checkbox_title);
            $optiondata=json_decode($customQuestion->checkbox_option);
            $i=0;

             @endphp
                      
                       @foreach ($title as $key => $value) 
                            
                                <div class="col-md-12 {{$gobalcnt++}}">
                                    <label>Add CheckBox</label>
                                    <input type="text" name="checkboxtitle[{{$gobalcnt}}][]" class="form-control col-sm-12" value="{{$value[$i]}}" id="check-gender" />
                                <a href="#" class="btn btn-primary btn-sm" for="check-gender" id="addcheckbox{{$cnt++}}" onclick="checkboxplusedataEdit({{$cnt}},{{$gobalcnt}})" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                    
                                @foreach ($optiondata as $ky => $item) 

                                
                                    @foreach($item as $val)
                                      
                                        @if($key==$ky)
                                    <div class="custom-control custom-checkbox" id="textbo1"> 
                                        <input type="checkbox" class="custom-control-input" name="checkboxvalue[]" id="addcheck" >
                                        <label class="custom-control-label" for="addcheck">
                                            <input type="text" name="checkboxoptionname[{{$gobalcnt}}][]" value="{{$val}}" class="form-control" /> 
                                        </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                    </div>
                                    @endif
                                    
                                    @endforeach  

                                @endforeach

                                <div class="custom-control custom-checkbox secondcheckbox{{$cnt}}"></div>
                            </div>
                               
                        @endforeach
                        

           @endif 
           {{-- radio --}}
           @if($customQuestion->radio_title != "null")
           @php
           $title=json_decode($customQuestion->radio_title);
           $optiondata=json_decode($customQuestion->radio_option);
           $i=0;
            @endphp
                    
                      @foreach ($title as $key => $value) 
                           
                               <div class="col-md-12 {{$gobalcnt++}}">
                                   <label>Add Radio</label>
                                   <input type="text" name="radiobtntitle[{{$gobalcnt}}][]" class="form-control col-sm-12" value="{{$value[$i]}}" id="check-radio" />
                               <a href="#" class="btn btn-primary btn-sm" for="check-radio" id="addcheckbox{{$cnt++}}" onclick="radioplusedataEdit({{$cnt}},{{$gobalcnt}})" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                   
                               @foreach ($optiondata as $ky => $item) 

                                    
                                   @foreach($item as $val)
                                     
                                       @if($key==$ky)
                                   <div class="custom-control custom-radio" id="textbo1"> 
                                       <input type="radio" class="custom-control-input" name="radiovalue[]"  id="addcheck" >
                                       <label class="custom-control-label" for="addcheck">
                                           <input type="text" name="radiobtnoptionname[{{$gobalcnt}}][]" value="{{$val}}" class="form-control" /> 
                                       </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                   </div>
                                   @endif
                                   
                                   @endforeach  

                               @endforeach

                                <div class="custom-control custom-checkbox secondcheckbox{{$cnt}}"></div>
                           </div>
                           
                       @endforeach
                      

          @endif 
            {{-- dropdown items here --}}
          @if($customQuestion->dropdown_title != "null")
          @php
          $title=json_decode($customQuestion->dropdown_title);
          $optiondata=json_decode($customQuestion->dropdown_option);
          $i=0;
           @endphp
                   
                     @foreach ($title as $key => $value) 
                         
                              <div class="col-md-12 {{$gobalcnt++}}">
                                  <label>Add dropdown</label>
                              <input type="text" name="dropdowntitle[{{$gobalcnt}}][]" class="form-control col-sm-12" value="{{$value[$i]}}" id="check-radio" />
                              <a href="#" class="btn btn-primary btn-sm" for="check-radio" id="addcheckbox{{$cnt++}}" onclick="dropwonplusedataEdit({{$cnt}},{{$gobalcnt}})" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                  
                              @foreach ($optiondata as $ky => $item) 

                              
                                  @foreach($item as $val)
                                    
                                      @if($key==$ky)
                                  <div class="custom-control " id="textbo1"> 
                                      <input type="radio" class="custom-control-input" name="radiovalue[]" id="addcheck" >
                                      <label class="custom-control-label" for="addcheck">
                                          <input type="text" name="dropdownoptionname[{{$gobalcnt}}][]" value="{{$val}}" class="form-control" /> 
                                      </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                  </div>
                                  @endif
                                  
                                  @endforeach  

                              @endforeach

                                <div class="custom-control custom-checkbox secondcheckbox{{$cnt}}"></div>
                          </div>
                              
                      @endforeach
                     

         @endif 


        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>
