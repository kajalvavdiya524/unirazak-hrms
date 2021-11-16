<div class="card bg-none card-box">
    <?php echo e(Form::model($customQuestion,array('route' => array('custom-question.update', $customQuestion->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                
                <?php echo e(Form::label('Custome Question',__('Custome Question'),['class'=>'form-control-label'])); ?>

                <select name="custome_question" id="inputbox" class="form-control select2" onchange="customeQuestion(this.value)">
                    <option value="">Select Controls</option>
                    <option value="1" <?php echo e($customQuestion->custome_question == 1 ? 'selected="selected"' : ''); ?> >Textbox</option>
                    <option value="2" <?php echo e($customQuestion->custome_question == 2 ? 'selected="selected"' : ''); ?>>Checkbox</option>
                    <option value="3" <?php echo e($customQuestion->custome_question == 3 ? 'selected="selected"' : ''); ?>>Radio-Button</option>
                    <option value="4" <?php echo e($customQuestion->custome_question == 4 ? 'selected="selected"' : ''); ?>>Dropdown</option>
                </select>
            </div>
        </div>
        <?php if($customQuestion->custome_title !="null"): ?>
        <div class="createTextboxdata col-sm-12">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('question',__('Question'),['class'=>'form-control-label'])); ?>

                    <?php echo e(Form::text('question',null,array('class'=>'form-control','placeholder'=>__('Enter question')))); ?>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('is_required',__('Is Required'),['class'=>'form-control-label'])); ?>

                    <?php echo e(Form::select('is_required', $is_required,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php 
            $gobalcnt=1;
            $cnt=0;
            // dd($customQuestion->radio_title);
        ?>
           <?php if($customQuestion->checkbox_title != "null"): ?>
            <?php
            $title=json_decode($customQuestion->checkbox_title);
            $optiondata=json_decode($customQuestion->checkbox_option);
            $i=0;

             ?>
                      
                       <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            
                                <div class="col-md-12 <?php echo e($gobalcnt++); ?>">
                                    <label>Add CheckBox</label>
                                    <input type="text" name="checkboxtitle[<?php echo e($gobalcnt); ?>][]" class="form-control col-sm-12" value="<?php echo e($value[$i]); ?>" id="check-gender" />
                                <a href="#" class="btn btn-primary btn-sm" for="check-gender" id="addcheckbox<?php echo e($cnt++); ?>" onclick="checkboxplusedataEdit(<?php echo e($cnt); ?>,<?php echo e($gobalcnt); ?>)" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                    
                                <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                
                                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <?php if($key==$ky): ?>
                                    <div class="custom-control custom-checkbox" id="textbo1"> 
                                        <input type="checkbox" class="custom-control-input" name="checkboxvalue[]" id="addcheck" >
                                        <label class="custom-control-label" for="addcheck">
                                            <input type="text" name="checkboxoptionname[<?php echo e($gobalcnt); ?>][]" value="<?php echo e($val); ?>" class="form-control" /> 
                                        </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="custom-control custom-checkbox secondcheckbox<?php echo e($cnt); ?>"></div>
                            </div>
                               
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        

           <?php endif; ?> 
           
           <?php if($customQuestion->radio_title != "null"): ?>
           <?php
           $title=json_decode($customQuestion->radio_title);
           $optiondata=json_decode($customQuestion->radio_option);
           $i=0;
            ?>
                    
                      <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           
                               <div class="col-md-12 <?php echo e($gobalcnt++); ?>">
                                   <label>Add Radio</label>
                                   <input type="text" name="radiobtntitle[<?php echo e($gobalcnt); ?>][]" class="form-control col-sm-12" value="<?php echo e($value[$i]); ?>" id="check-radio" />
                               <a href="#" class="btn btn-primary btn-sm" for="check-radio" id="addcheckbox<?php echo e($cnt++); ?>" onclick="radioplusedataEdit(<?php echo e($cnt); ?>,<?php echo e($gobalcnt); ?>)" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                   
                               <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                    
                                   <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     
                                       <?php if($key==$ky): ?>
                                   <div class="custom-control custom-radio" id="textbo1"> 
                                       <input type="radio" class="custom-control-input" name="radiovalue[]"  id="addcheck" >
                                       <label class="custom-control-label" for="addcheck">
                                           <input type="text" name="radiobtnoptionname[<?php echo e($gobalcnt); ?>][]" value="<?php echo e($val); ?>" class="form-control" /> 
                                       </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                   </div>
                                   <?php endif; ?>
                                   
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="custom-control custom-checkbox secondcheckbox<?php echo e($cnt); ?>"></div>
                           </div>
                           
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      

          <?php endif; ?> 
            
          <?php if($customQuestion->dropdown_title != "null"): ?>
          <?php
          $title=json_decode($customQuestion->dropdown_title);
          $optiondata=json_decode($customQuestion->dropdown_option);
          $i=0;
           ?>
                   
                     <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                         
                              <div class="col-md-12 <?php echo e($gobalcnt++); ?>">
                                  <label>Add dropdown</label>
                              <input type="text" name="dropdowntitle[<?php echo e($gobalcnt); ?>][]" class="form-control col-sm-12" value="<?php echo e($value[$i]); ?>" id="check-radio" />
                              <a href="#" class="btn btn-primary btn-sm" for="check-radio" id="addcheckbox<?php echo e($cnt++); ?>" onclick="dropwonplusedataEdit(<?php echo e($cnt); ?>,<?php echo e($gobalcnt); ?>)" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br>
                                  
                              <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                              
                                  <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                      <?php if($key==$ky): ?>
                                  <div class="custom-control " id="textbo1"> 
                                      <input type="radio" class="custom-control-input" name="radiovalue[]" id="addcheck" >
                                      <label class="custom-control-label" for="addcheck">
                                          <input type="text" name="dropdownoptionname[<?php echo e($gobalcnt); ?>][]" value="<?php echo e($val); ?>" class="form-control" /> 
                                      </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  
                                  </div>
                                  <?php endif; ?>
                                  
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="custom-control custom-checkbox secondcheckbox<?php echo e($cnt); ?>"></div>
                          </div>
                              
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     

         <?php endif; ?> 


        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /var/www/html/UniRazak/resources/views/customQuestion/edit.blade.php ENDPATH**/ ?>