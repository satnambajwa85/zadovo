<div class="content clearfix">
			
				
				<!--three-fourth content-->
					<section class="full-width">
						<!--post-->
						<article class="static-content post left " style="background:#fff;">
							
							<div class="entry-featured">
                            	<div class="one-half" style="margin-right:0px; box-shadow:none; border-right:1px solid #e2e2e2; min-height:350px;"  >
                    <?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'htmlOptions'=>array(''),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
							
									),)); ?>
                                    
                                    
					<h1>Log in</h1>
                    
                    
                    <?php if(Yii::app()->user->hasFlash('login')): ?>
								<div class="flash-error">
									<?php echo Yii::app()->user->getFlash('login'); ?>
								</div>
								<?php endif; ?>
                                
                                
					<div class="f-item">
						<label for="email">E-mail address</label>
                        <?php echo $form->textField($model,'username',array('placeholder'=>'Username','id'=>'email')); ?>
					</div>
					<div class="f-item">
						<label for="password">Password</label>
                        <?php echo $form->passwordField($model,'password',array('placeholder'=>'Password','id'=>'password')); ?>
					</div>
					<div class="f-item checkbox">
						<div id="uniform-remember_me" class="checker"><span><input id="remember_me" name="checkbox" type="checkbox" ></span></div>
						<label for="remember_me">Remember me next time</label>
					</div>
					<p><a href="#" title="Forgot password?">Forgot password?</a>
					</p>
                    <?php echo CHtml::submitButton('SIGN IN',array('class'=>'gradient-button','id'=>'login')); ?>

				<?php $this->endWidget(); ?>
                
                
                            	</div>
                                
                                <div class="one-half"  style="margin-right:0px; margin-left:20px; box-shadow:none;">
                          <?php $form=$this->beginWidget('CActiveForm',array('id'=>'sign-form2','htmlOptions'=>array(),'enableClientValidation'=>false));?>
							  <div class="f-item">
								<?php echo $form->labelEx($model1,'first_name'); ?>
								<?php echo $form->textField($model1,'first_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model1,'first_name'); ?>
								
							  </div>
							  <div class="f-item">
								<?php echo $form->labelEx($model1,'last_name'); ?>
								<?php echo $form->textField($model1,'last_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model1,'last_name'); ?>
							  </div>
							  <div class="f-item">
								<?php echo $form->labelEx($model1,'date_of_birth'); ?>
								<?php echo $form->textField($model1,'date_of_birth',array('class'=>'form-control')); ?>
								<?php echo $form->error($model1,'date_of_birth'); ?>
							 </div>
							  
							  <div class="f-item">
								<?php echo $form->labelEx($model1,'email'); ?>
								<?php echo $form->textField($model1,'email',array('class'=>'form-control')); ?>
								<?php echo $form->error($model1,'email'); ?>
							  </div>
							  
                              <div class="f-item">
								<?php echo $form->labelEx($model1,'password'); ?>
								<?php echo $form->passwordField($model1,'password',array('class'=>'form-control')); ?>
								<?php echo $form->error($model1,'password'); ?>
							 </div>
                             
							  <div class="f-item">
								 <?php echo $form->labelEx($model1,'gender',array('class'=>'fl')); ?>
									<?php echo $form->radioButtonlist($model1,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'')); ?>
									<?php echo $form->error($model1,'gender'); ?>
							  </div>
							  <div class="clear"></div>
							  <div class="f-item mt10">
								<div class="fl"><?php echo $form->labelEx($model1,'term_conditions'); ?></div>
								<div class="fl"><?php echo $form->checkBox($model1,'term_conditions'); ?></div>
								
                                <br/>
								<?php echo $form->error($model1,'term_conditions'); ?>
							  </div>
							<div class="f-item mt30"> 
								<?php echo CHtml::submitButton('Create Account',array('class'=>'gradient-button','name'=>"register",'id'=>"register")); ?>
							</div>
						<?php $this->endWidget(); ?>
                            	</div>
                            </div>
							
						</article>
						<!--//post-->
						
								
						
					</section>
				<!--//three-fourth content-->
				
				
			</div>

<!--<div class="content clearfix">
		<div class="span10">&nbsp;</div>
		
		<div class="span9 offset1" id="login-view">
				<div class="spacer15">
									
				</div>
			<div class="spacer15"></div>

			<section class="main">
			
						 <?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'htmlOptions'=>array(''),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
							
									),)); ?>
							  
							<div class="col-md-4 f-t-login-link">
							<?php echo CHtml::link('LOGIN WITH FACEBOOK <span class="icon-facebook-sign"></span>','#',array('class'=>'btn btn-lg btn-primary marb'))?><br/>
							<?php echo CHtml::link('LOGIN WITH TWITTER <span class="icon-twitter-sign"></span>&nbsp;&nbsp;&nbsp;&nbsp;','#',array('class'=>'btn btn-lg btn-info marb'))?>
							</div>
							<div class="clear"></div>
							<div class="form-group col-md-4">
								<label for="login"><i class="icon-user"></i>Username <i class="star">*</i></label>
								<?php echo $form->textField($model,'username',array('placeholder'=>'Username','class'=>'form-control')); ?>
							
							</div>
							<div class="form-group col-md-4">
								<label for="password"><i class="icon-lock"></i>Password <i class="star">*</i></label>
								<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password','class'=>'form-control')); ?>
							</div>
							
							<div class="clear col-md-4"> 
								 <?php echo CHtml::submitButton('SIGN IN',array('class'=>'btn btn-danger')); ?>
							 
							</div>
						<?php $this->endWidget(); ?>
			</section>
			
		  
		   </div>
</div>-->



		
        