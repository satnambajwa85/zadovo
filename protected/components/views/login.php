<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
 'id'=>'user_login_form',
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
  <?php echo $form->labelEx($model,'username'); ?>
  <?php echo $form->textField($model,'username',array("onfocus"=>"$('#login-error-div').hide();")); ?>
  <?php //echo $form->error($model,'username'); ?>
 </div>
<div class="row">
  <?php echo $form->labelEx($model,'password'); ?>
  <?php echo $form->passwordField($model,'password',array("onfocus"=>"$('#login-error-div').hide();")); ?>
  <?php //echo $form->error($model,'password'); ?>
  
</div>
<div class="row rememberMe">
  <?php echo $form->checkBox($model,'rememberMe'); ?>
  <?php echo $form->label($model,'rememberMe'); ?>
  <?php //echo $form->error($model,'rememberMe'); ?>
 </div>
<div class="row submit">
 
  <?php echo CHtml::ajaxSubmitButton(
                                'Sign In',
    array('/site/login.GetLogin'),
                                array(  
                'beforeSend' => 'function(){ 
                                             $("#login").attr("disabled",true);
            }',
                                        'complete' => 'function(){ 
                                             $("#user_login_form").each(function(){ this.reset();});
                                             $("#login").attr("disabled",false);
                                        }',
                   'success'=>'function(data){  
                                             var obj = jQuery.parseJSON(data); 
                                            // View login errors!
         // alert(data);
                                             if(obj.login == "success"){
                                         $("#user_login_form").html("Login Successful! Please Wait...");
                                         parent.location.href = "/";
                                      }
          else{
                                                $("#login-error-div").show();
                                                $("#login-error-div").html("Login failed! Try again.");
												$("#login-error-div").append("");
                                             }
 
                                        }' 
    ),
                         array("id"=>"login","class" => "btn btn-primary")      
                ); ?>
 
 </div>
<?php $this->endWidget(); ?>
</div>
<!-- form -->