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
                                
                                <div class="one-half"  style="margin-right:0px; margin-left:20px; box-shadow:none;"  >
                            	<form>
					<h1>Register</h1>
					<div class="f-item">
						<label for="f_name">First Name</label>
						<input type="text" name="f_name" id="f_name">
					</div>
					<div class="f-item">
						<label for="l_name">Last name</label>
						<input type="text" name="l_name" id="l_name">
					</div>
					<div class="f-item">
						<label for="email">E-mail address</label>
						<input type="email" name="email" id="email">
					</div>
					<div class="f-item">
						<label for="password">Password</label>
						<input type="password" name="password" id="password">
					</div>
					
					
					<input type="submit" class="gradient-button" value="Create Account" name="register" id="register">
				</form>
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



		
        