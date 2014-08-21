<div class="gray">
<?php if(Yii::app()->user->hasFlash('error')):?>
				<div class="flash-error">
					<?php echo Yii::app()->user->getFlash('error'); ?>
				</div>
				<?php endif; ?>
				
				<?php if(Yii::app()->user->hasFlash('success')):?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('success'); ?>
				</div>
				<?php endif; ?>
				
<section class="container theme-showcase">
		<div class="row mt24">
		 		<div class="fl updat-img">
					<?php $path =	Yii::app()->request->baseUrl.'/uploads/users/thumb/';?>
						<img width="119px" height="131px" src="<?php echo $path.$info->image;?>" alt="image"/>
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
		 
	
				</div>
			<div class="col-md-8">
				<div class="user-info">
							<h1><?php echo Yii::app()->user->userName;?></h1>
							<p><?php echo $info->gender;?>&nbsp;,<?php echo (date('Y-m-d'))-($info->date_of_birth);?> year old</p>
							<?php if(!empty($schoolName)){ ?>
							<h3><?php echo $schoolName->name; ?></h3>
							<?php } else { ?>
							<?php echo CHtml::link('<h3>Search school and join.</h3>',array('/site/search'));?>
							<?php } ?>
							<div class="user-bref">
							<ul>
								<li><?php echo CHtml::link('<span>'.$count.'</span>','#')?><p>Friends</p></li>
								<li><?php echo CHtml::link('<span>0</span>','#')?><p>Followers</p></li>
								<li><?php echo CHtml::link('<span>'.$info->reviews.'</span>','#')?><p>Reviews</p></li>
							</ul>
							
							</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="clear"></div>
<div class="white">
	<section class="container theme-showcase">
		<div class="row">
		  <div class="col-md-12">
			<div class="profile-bar">
			<ul class="tabs"><li rel="tab1">PROFILE INFO</li></ul>
			<ul class="tabs"><li rel="tab2">SET PASSWORD</li></ul>
			<ul class="tabs"><li rel="tab3">friends</li></ul>
			<ul class="tabs"><li rel="tab4">reviews</li></ul>
			 
		</div>
		  </div>
		  
		</div>
		<div class="row white mt21">
		  <div class="col-md-8">
				<div class="tab_container span8"> 
			 <div id="tab1" class="tab_content"> 
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
		 	 </div><!-- #tab1 -->
			 <div id="tab2" class="tab_content"> 
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
				  			
	 		 </div><!-- #tab1 -->
			 <div id="tab3" class="tab_content"> 
				<aside class="col-md-12">
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
				</aside>
			 </div><!-- #tab1 -->	
			 <div id="tab4" class="tab_content">
			 </div><!-- #tab1 -->	
		 		
		</div> <!-- .tab_container --> 
	
		  </div>
			<div class="col-md-4">
			 	 		 	
					<div class="row">
					<?php foreach($add as $list){ ?>
					<div class="addver">
						<img width="100%" height="200" src="<?php echo Yii::app()->baseUrl;?>/uploads/Advertisements/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>"/>
					</div>
					<?php } ?>
					
					
				</div>
   
		
			</div>
		</div>
		
</section>
</div>
<div class="spacer27"></div>

