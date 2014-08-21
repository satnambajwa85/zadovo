 <?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'Register-dialog',
    'options'=>array(
        'title'=>'<h1>Register</h1>',
        'autoOpen'=>false,
    ),
));?>
 
 
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
 'id'=>'user_register_form',
 'enableAjaxValidation'=>false,
  'enableClientValidation'=>true,
                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
  ),
)); ?>
 
<div id="login-error-div" class="errorMessage" style="display: none;">
</div>
<div class="row">
  <?php echo $form->labelEx($model,'first_name'); ?>
  <?php echo $form->textField($model,'first_name',array("onfocus"=>"$('#register-error-div').hide();")); ?>
  <?php //echo $form->error($model,'username'); ?>
 </div>
<div class="row">
  <?php echo $form->labelEx($model,'last_name'); ?>
  <?php echo $form->textField($model,'last_name',array("onfocus"=>"$('#register-error-div').hide();")); ?>
  <?php //echo $form->error($model,'username'); ?>
 </div>
 <div class="row">
  <?php echo $form->labelEx($model,'email'); ?>
  <?php echo $form->textField($model,'email',array("onfocus"=>"$('#register-error-div').hide();")); ?>
  <?php //echo $form->error($model,'username'); ?>
 </div>
<div class="row">
  <?php echo $form->labelEx($model,'password'); ?>
  <?php echo $form->passwordField($model,'password',array("onfocus"=>"$('#register-error-div').hide();")); ?>
  <?php //echo $form->error($model,'password'); ?>
  
</div>

<div class="row submit">
 
  <?php echo CHtml::ajaxSubmitButton(
                                'Register',
    array('/site/register.GetAccount'),
                                array(  
                'beforeSend' => 'function(){ 
                                             $("#register").attr("disabled",true);
            }',
                                        'complete' => 'function(){ 
                                             $("#user_register_form").each(function(){ this.reset();});
                                             $("#register").attr("disabled",false);
                                        }',
                   'success'=>'function(data){  
                                             var obj = jQuery.parseJSON(data); 
                                            // View register errors!
         // alert(data);
                                             if(obj.register == "success"){
                                         $("#user_register_form").html("Register Successful! Please Wait...");
                                         parent.location.href = "/";
                                      }
          else{
                                                $("#register-error-div").show();
                                                $("#register-error-div").html("Register failed! Try again.");
												$("#register-error-div").append("");
                                             }
 
                                        }' 
    ),
                         array("id"=>"register","class" => "btn btn-primary")      
                ); ?>
 
 </div>
<?php $this->endWidget(); ?>
</div>
<!-- form -->
 
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>