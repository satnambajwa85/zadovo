<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<article class="static-content post-comment">
                        <ul class="room-types">
                                <!--room-->
                                <li>
                                	<?php $path =	Yii::app()->request->baseUrl.'/uploads/users/thumb/';?>
                                    <span class="left"><img width="270" height="152" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.$info->image;?>">
                                    <div class="edit-photo">
					<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
							array(
									'id'=>'uploadFile',								
									'config'=>array(
										   'action'=>Yii::app()->createUrl('user/upload'),
										   'allowedExtensions'=>array("jpg","jpeg","gif",'png'),//array("jpg","jpeg","gif","exe","mov" and etc...
										   'sizeLimit'=>2*1024*1024,// maximum file size in bytes
										   'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
										   'onComplete'=>"js:function(id, fileName, responseJSON){ $('.updat-img > img').attr('src','".$path."'+fileName);}",
										   )
							)); ?>
						
					
					</div>
                                    
                                    </span>
                                    <div class="meta">
                                        <h1><?php echo $info->first_name.' '.$info->last_name;?></h1>
                                        <p><?php echo $info->gender;?>,&nbsp;<?php echo (date('Y-m-d'))-($info->date_of_birth);?> year old</p>
                                        
                                        <a class="more-info" title="more info" href="javascript:void(0)">+ more info</a>
                                    </div>
                                    <div class="room-information">
                                        <div class="row">
                                            <span class="first ex_width">Friends:</span>
                                            <span class="second"><?php echo $count;?></span>
                                        
                                        </div>
                                        <div class="row">
                                            <span class="first ex_width">Followers:</span>
                                            <span class="second "><?php echo $info->reviews;?></span>
                                        </div>
                                        <div class="row">
                                            <span class="first ex_width">Reviews:</span>
                                            <span class="second"><?php echo $info->reviews;?></span>
                                        </div>
                                    </div>
                                    <div class="more-information" style="display: none;">
                                        <p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
                                        <p><strong>Room Facilities:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
                                        <p><strong>Bed Size(s):</strong> 1 Double </p>
                                        <p><strong>Room Size:</strong>  16 square metres</p>
                                    </div>
                                </li>
                                <!--//room-->
                                
                                
                            </ul>
                            
                        </article>
                    <!--//post-->
                    
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							
							<li class="description"><a href="#description" title="Description">Profile info</a></li>
							<li class="location"><a href="#activity" title="Location">Recent Activity</a></li>
							<li class="things-to-do"><a href="#friends" title="Things to do">Friends</a></li>
                            <li class="reviews"><a href="#reviews" title="Reviews">Reviews</a></li>
							
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
					<section id="description" class="tab-content">
						<article>
				<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'user-pofile-form',
									'enableClientValidation'=>false,
									'clientOptions'=>array(
									'validateOnSubmit'=>true,


									
									
									),)); ?>
						<div class="col-md-4 fl">
							<?php echo $form->labelEx($info,'first_name'); ?>
							<?php echo $form->textField($info,'first_name',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'first_name'); ?>
						</div>
						<div class="col-md-4 fl">
							<?php echo $form->labelEx($info,'last_name'); ?>
							<?php echo $form->textField($info,'last_name',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'last_name'); ?>
						</div>	
						<div class="col-md-4 fl">
							<?php echo $form->labelEx($info,'email'); ?>
							<?php echo $form->textField($info,'email',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'email'); ?>
						</div>	
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'date_of_birth'); ?>
							<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$info,
									'attribute'=>'date_of_birth',
									'options'=>array('dateFormat'=>'yy-mm-dd','minDate'=>0),
									'htmlOptions'=>array('class'=>'form-control','id'=>'UserProfiles_date_of_birth_edit'),
									'value'=>date('Y-m-d', strtotime('+2 day', strtotime(date('Y-m-d')))),
									));?>
							<?php echo $form->error($info,'date_of_birth'); ?>
						</div>
				
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'postcode'); ?>
							<?php echo $form->textField($info,'postcode',array('maxlength'=>6,'class'=>'form-control')); ?>
							<?php echo $form->error($info,'postcode'); ?>
						</div>	
						
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'telephone'); ?>
							<?php echo $form->textField($info,'telephone',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'telephone'); ?>
						</div>		
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'mobile'); ?>
							<?php echo $form->textField($info,'mobile',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'mobile'); ?>
						</div>			
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'fax'); ?>
							<?php echo $form->textField($info,'fax',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'fax'); ?>
						</div>				
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'favourites'); ?>
							<?php echo $form->textField($info,'favourites',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'favourites'); ?>
						</div>					
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'website'); ?>
							<?php echo $form->textField($info,'website',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'website'); ?>
						</div>				
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'work'); ?>
							<?php echo $form->dropDownlist($info,'work',array('1'=>'Yes','0'=>'No'),array('class'=>'form-control')); ?>
		
							<?php echo $form->error($info,'work'); ?>
						</div>					
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'dislike'); ?>
							<?php echo $form->textField($info,'dislike',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'dislike'); ?>
						</div>				
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'aboutMe'); ?>
							<?php echo $form->textArea($info,'profile_info',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'profile_info'); ?>
						</div>	
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'address'); ?>
							<?php echo $form->textArea($info,'address',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'address'); ?>
						</div>	
						<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($info,'recent_activity'); ?>
							<?php echo $form->textArea($info,'recent_activity',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'recent_activity'); ?>
						</div>	
				 
						<div class="col-md-4 form-mt">
							<?php echo $form->labelEx($info,'gender'); ?>
							<?php echo $form->radioButtonlist($info,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'')); ?>
							<?php echo $form->error($info,'gender'); ?>
						</div>	
					
						<div class="clear"> </div>
						<div class="col-md-4">
							<?php echo CHtml::submitButton('UPDATE',array('class'=>'btn btn-danger')); ?>	
						</div>
					<?php $this->endWidget(); ?>
		 				</article>
					</section>
					<!--//description-->
					
					<!--facilities-->
					<section id="activity" class="tab-content">
						<article>
							
                            <?php $model = new Changepassword;
						$form=$this->beginWidget('CActiveForm', array(
						'id'=>'Change-password',
						'action'=>Yii::app()->createUrl('/user/ChangePassword'),
						'clientOptions'=>array('validateOnSubmit'=>true), 
					)); ?>
					<div class="col-md-4 fl form-mt">
							<?php echo $form->labelEx($model,'old_password'); ?>
							<?php echo $form->passwordField($model,'oldpassword',array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'oldpassword'); ?>
					</div>	
					<div class="col-md-4 fl form-mt">
						<?php echo $form->labelEx($model,'new_password'); ?>
						<?php echo $form->passwordField($model,'newpassword',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'newpassword'); ?>
					
					</div>	
					<div class="col-md-4 fl form-mt">
						<?php echo $form->labelEx($model,'confirm_password'); ?>
						<?php echo $form->passwordField($model,'confirmpassword',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'confirmpassword'); ?>
					
					</div>	
				<div class="inner_gray_back">
				
			
				
					<div class="fl"></div>
					<div class="col-md-4 form-mt">
						<?php echo CHtml::submitButton('SUBMIT', array('name'=>'Submit','class'=>'btn btn-danger'));?>
					</div>
					<div class="clr"></div>
				
				
				
				</div>
				<?php $this->endWidget(); ?>
						</article>
					</section>
					<!--//facilities-->
					
				
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
						
                        
                        
						</article>
					</section>
					<!--//reviews-->
					
					<!--things to do-->
					<section id="friends" class="tab-content">
						<article>
							
                         <?php $form=$this->beginWidget('CActiveForm', array(	
											'id'=>'user-search-form',
											'action'=>Yii::app()->createUrl('/user/userProfile'),
											'method'=>'POST',));?>
					<div class="friends-sort">
						<span class="fl">sort by</span>
						    <em><?php echo CHtml::link('NAME','#');?>&nbsp;</em>
						    <em><?php echo CHtml::link('AGE','#');?>&nbsp;</em>
						    <em><?php echo CHtml::link('GENDER','#');?>&nbsp;</em>
					</div>
					<div class="search2 fr">
					
						
							<?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('class'=>'form-control','placeholder'=>'SEARCH'));
						echo CHtml::link('<i class="icon-search"></i>',array('/user/userProfile'),array('class'=>'btn btn-danger fr'));?>
						
					
					</div>
					 <?php $this->endWidget(); ?>
					<div class="col-md-8">
						<?php if (!empty($_REQUEST['term'])) { ?>
								<?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$fech_result,
									'itemView'=>'_flist',
									'id'=>'featured_company', 
									'ajaxUpdate'=>true, 
									'summaryText'=>false,
									'pager' => array(
										'header' => '',
										'cssFile' =>'',
										'firstPageLabel'=>'',
										'lastPageLabel'=>'',
										'prevPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_left_arrow.gif">',
										'nextPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_right_arrow.gif">',
										),
									)); ?>
						<?php } else{  ?>
						
						 <?php $this->widget('zii.widgets.CListView', array(
								'dataProvider'=>$fech_result,
								'itemView'=>'_flist',
								'id'=>'featured_company', 
								'ajaxUpdate'=>true, 
								'summaryText'=>false,
								'pager' => array(
									'header' => '',
									'cssFile' =>'',
									'firstPageLabel'=>'',
									'lastPageLabel'=>'',
									'prevPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_left_arrow.gif">',
									'nextPageLabel'=>'<img border="0" src="'.Yii::app()->theme->baseUrl.'/images/paging_right_arrow.gif">',
									),
						)); ?>
						<?php } ?>
					</div>
			
</article>
</section>
				</section>
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