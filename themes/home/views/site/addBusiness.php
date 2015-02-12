<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/slider.css" rel="stylesheet">
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/sliding.form.js',CClientScript::POS_END);?>

<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					
					<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'developer-form','enableAjaxValidation'=>false,)); ?>
                <!-- dashpro right-form start -->
                <div id="content1" class="dashpro_right_form">
                        	<!-- dashpro left end -->
					 <div id="navigation">
                    	<ul>
                        	<li class="1 selected"><a href="#" class="contact_icon">Step 1</a></li>
                        	<li class="2"><a href="#" class="edu_icon">Step 2</a></li>
                            <li class="3"><a href="#" class="portfolio_icon">Step 3</a></li>
                            <li class="4"><a href="#" class="skills_icon">Step 4</a></li>
                            <li class="5"><a href="#" class="qa_icon">Step 5</a></li></ul></div>
              
                    <div id="form_slide">
                            <div id="steps">

                            <fieldset class="step" id="pp-step-1" >
                            
                        
                                 
                                <div class="step1" >
                                	<div class="head_text_large">Contact Information</div>
<div class="row">
		<?php echo $form->labelEx($model,'start_age_group'); ?>
		<?php echo $form->textField($model,'start_age_group',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'start_age_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_age_group'); ?>
		<?php echo $form->textField($model,'end_age_group',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'end_age_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_number'); ?>
		<?php echo $form->textField($model,'mobile_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_number'); ?>
	</div>
                                    <div class="row_outer">	
                                        <div class="red_butt">
                                            <a href="#" class="next" rel="1" id="p-step1">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="step hide" id="pp-step-2" >
                            	<div class="step2">
                                	<div  class="head_text_large center_position">Education</div>
                                    <div class="gray_outer">
									
									
	

	<div class="row">
		<?php echo $form->labelEx($model,'about_the_business'); ?>
		<?php echo $form->textArea($model,'about_the_business',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_the_business'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_info'); ?>
		<?php echo $form->textArea($model,'additional_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional_info'); ?>
	</div>

                                    </div>
                              
                       
                    </div>   
                    				<div class="row_outer">	
                                        <div class="red_butt">
                                             <a href="#" class="next" rel="2">Save & Next</a>                                            
                                        </div>
                                    </div> 
                           
                            </fieldset>
                            <fieldset class="step hide" id="pp-step-3" >
                           
                                     <div class="step5">
                                     	<div id="s3" class="head_text_large center_position">Self Skills Assessment</div>  
                                        <div>
										
											<div class="row">
		<?php echo $form->labelEx($model,'address_line_1'); ?>
		<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'address_line_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line_2'); ?>
		<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'address_line_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'land_mark'); ?>
		<?php echo $form->textField($model,'land_mark',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'land_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pin_code'); ?>
		<?php echo $form->textField($model,'pin_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pin_code'); ?>
	</div>
										
										
										
										</div>
                                         <div class="row_outer">	
                                <div class="red_butt">
                                     <a href="#" class="next" rel="3">Save & Next</a>
                                </div>
                            </div>            
                                     </div>
                            
                            </fieldset>
                            <fieldset class="step hide" id="pp-step-4" >
                            	<div class="step6">
                                <div id="s3" class="head_text_large center_position">Portfolio & OS Contribution</div>  
                        	<div>
							
	<div class="row">
		<?php echo $form->labelEx($model,'prefix'); ?>
		<?php echo $form->textField($model,'prefix',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'designation'); ?>
		<?php echo $form->textField($model,'designation',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefix2'); ?>
		<?php echo $form->textField($model,'prefix2',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefix2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name2'); ?>
		<?php echo $form->textField($model,'first_name2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name2'); ?>
		<?php echo $form->textField($model,'last_name2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'designation2'); ?>
		<?php echo $form->textField($model,'designation2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'designation2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email2'); ?>
		<?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no2'); ?>
		<?php echo $form->textField($model,'mobile_no2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_no2'); ?>
	</div>

							
							</div>
                           
                            <div class="row_outer">	
                                <div class="red_butt">
                                    <a href="#" class="next" rel="4">Save & Next</a>
                                </div>
                            </div> 
                        </div>
                            </fieldset>
                            <fieldset class="step hide" id="pp-step-5" >
                            	<div class="step6">
                        	
           					 <div id="s3" class="head_text_large center_position">Refferals</div> 	
                            <div>
							
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advertise_categories_id'); ?>
		<?php echo $form->textField($model,'advertise_categories_id'); ?>
		<?php echo $form->error($model,'advertise_categories_id'); ?>
	</div>						
							</div>
							
                            <div class="row_outer item">	
                                
                                    
                           <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                                    
                                
                            </div> 
                        </div>
                            </fieldset>
                           
                            </div>
                        </div>
                  
                </div>
                
<?php $this->endWidget(); ?>					
					


	



</div><!-- form -->
                    
                    	
					</section>
					<!--//description-->
					
					
				
				
				<!--sidebar-->
				<aside class="right-sidebar">
					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with school selection.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article>
					<!--//Need Help Booking?-->
					
					<!--Deal of the day-->
					<?php foreach($add as $list){ ?>
					<article class="default clearfix">
						<h2><?php //echo $list->title; ?></h2>
						<div class="deal-of-the-day">
							<a href="<?php echo $list->link; ?>" target="_blank">
								<figure><img src="<?php echo Yii::app()->baseUrl;?>/uploads/addvertise/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>" width="230" height="130" /></figure>
								<h3><?php echo $list->advertiseCategories->name;?></h3>
								<p><span class="price"> <small><?php echo $list->description;?></small></span></p>
							</a>
						</div>
					</article>
					
					<?php } ?>
                    
					<!--//Deal of the day-->
				</aside>
				<!--//sidebar-->
			</div>
 