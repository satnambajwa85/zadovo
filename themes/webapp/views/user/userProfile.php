<div class="gray mb35">
<section class="container theme-showcase">
		<div class="row mt24">
		 		<div class="fl">
					
						<img width="119px" height="131px" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.$info->image;?>" alt="image"/>
					
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
				<ul class="tabs"><li rel="tab1">profile info</li></ul>
				<ul class="tabs"><li rel="tab2">Recent Activity</li></ul>
				<ul class="tabs"><li rel="tab3">friends</li></ul>
				<ul class="tabs"><li rel="tab4">reviews</li></ul>
			 
			</div>
		  </div>
		  
		</div>
		<div class="row white mt21">
		  <div class="col-md-8">
				<div class="tab_container span8"> 
			 <div id="tab1" class="tab_content"> 
				<aside class="col-md-12">
					<ul class="u-profile-inf span6">
						<li><span>Name</span><div><?php echo Yii::app()->user->userName;?></div></li>
						<li><span>age</span><div><?php echo $info->date_of_birth;?></div></li>
						<li><span>Sex</span><div><?php echo $info->gender;?></div></li>
						<li><span>Address</span><div><?php echo $info->address;?></div></li>
						<li><span>favourites</span><div><?php echo $info->favourites;?></div></li>
						<li><span>work</span><div><?php echo $info->work;?></div></li>
						<li><span>email</span><div><?php echo $info->email;?></div></li>
						<li><span>website</span><div><?php echo $info->website;?></div></li>
						<li><span>dislike</span><div><?php echo $info->dislike;?></div></li>
						<li class="b-none"><span>about me</span><div><?php echo $info->profile_info;?></div></li>
					</ul>
				</aside>
		 	 </div><!-- #tab1 -->
			 <div id="tab2" class="tab_content"> 
				<div class="zs-load-more-container">
					<div class="notifications-content activity-feed bt bb">
						<ul class="zs-following-list n-content">
						<?php foreach($log as $list){ ?>
						<li>
							<?php echo html_entity_decode($list->description,ENT_QUOTES);?>
							<div style="padding-left: 26px;" class="notification-text clearfix">
								<div class="notification-top">
								

									<div class="ntime"><?php echo Yii::app()->dateFormatter->formatDateTime(substr($list->add_date, -8)); ?></p></div>
								</div>
									
									
							</div>
							<div class="clear"></div>
						</li>
						<?php } ?>
						<?php $this->widget('CLinkPager', array('pages' => $logPages,)) ?>
						</ul> 
					</div>
				</div>
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
				<?php foreach($userReviewlist as $rList){?>
				<div class="col-md-12 top-border mb10">
					
					<div class="row">
						<div>
						<?php echo CHtml::link('<img width="70" height="70" src="'.Yii::app()->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$rList->schoolsProfile->logo.'" alt="'.$rList->schoolsProfile->name.'"/>',array('/site/schoolProfile','id'=>$rList->schoolsProfile->id),array('class'=>'fl'));?>
					
							
						<div class="col-md-6 fl review-info">
							<?php echo CHtml::link('<h3>'.$rList->schoolsProfile->name.'</h3>',array('/site/schoolProfile','id'=>$rList->schoolsProfile->id));?>
							<span class="clear"><?php echo $rList->schoolsProfile->cities->name;?></span>
							<div class="clear"></div>
							<span class="">Total Reviews -- <?php echo $rList->schoolsProfile->reviews;?></span>
								
						</div>
						<?php 
									$reviewlike		=	$rList->like;
									$reviewDislike	=	$rList->dislike;
									$totalCount =	($reviewlike) + ($reviewDislike);
									$joined	=	$rList->schoolsProfile->follower;
									$total	=	($totalCount) + ($joined);
									$av		=	$total*10/100;
									$color	=	0;
									if($av > 1){
										$color	=	1;
									}
						?>
						<div class="fr famous ">
								<h1>famous</h1>

								<span class="br-active<?php echo $color?>"><?php echo $av==100?'100':$av;?>%</span>
								
						</div>
							
						</div>
					</div>
					<div class="row clear review-text">
						<span class="3"><?php echo $rList->reviews;?></span>
						
					</div>
					<div class="row border-bottom ">
						<ul class="fl review-icon">
							<li>
								<div id="loading" class="loading<?php echo $rList->id?>"></div>
								<span class="like user-link<?php echo $rList->id?>" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$rList->id,'action'=>'reviewLike'))?>" data-toggle="tooltip" data-placement="bottom" title="Like" >l</span>
							</li>
							
							<li><span class="l-rate total-count like<?php echo $rList->id;?>"><?php echo $rList->like;?></span></li>
							<li><span class="u-rate total-count dlike<?php echo $rList->id;?>"><?php echo $rList->dislike;?></span></li>
							<li>
								<div id="loading" class="busy<?php echo $rList->id?>"></div>
								<span class="unlike user-unlike<?php echo $rList->id?>" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$rList->id,'action'=>'reviewDisLike'))?>" data-toggle="tooltip" data-placement="bottom" title="Dislike" >L</span>
								
							</li>
						</ul>
						<span class="pull-right user-comment-to-review<?php echo $rList->id;?> commemt-text-count">Comments</span>
						<div class="clear"></div>
						<div class="row user-comment-textarea<?php echo $rList->id;?>" style="display:none;">
							<?php 	$comment = new Comment;
								$form=$this->beginWidget('CActiveForm',
									array('id'=>'user-comment-form-to-reviews',
									'enableAjaxValidation'=>false,
									'enableClientValidation'=>true,
									'clientOptions'=>array('validateOnSubmit'=>true,
									'validateOnChange'=>true,),
									'action'=>Yii::app()->createUrl('/user/userComment'),
									
									));  ?>				

							<?php echo $form->hiddenField($comment,'rName',array('value'=>''.$rList->userProfiles->first_name.' '.$rList->userProfiles->last_name.'')); ?>
							<?php echo $form->hiddenField($comment,'rAddress',array('value'=>''.$rList->userProfiles->address.'')); ?>
							<?php echo $form->hiddenField($comment,'ruserId',array('value'=>''.$rList->userProfiles->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sName',array('value'=>''.$rList->schoolsProfile->name.'')); ?>
							<?php echo $form->hiddenField($comment,'rid',array('value'=>''.$rList->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sid',array('value'=>''.$rList->schoolsProfile->id.'')); ?>
					 	<div class="col-md-12">
							<div class="border-bottom2">&nbsp;</div>
							
							<div class="mar-write-comment">
								<span class="write-comment-title">Write a comment</span>
							</div>
							<?php echo $form->textArea($comment,'comment',array('class'=>'form-control','placeholder'=>'Write a comment..','id'=>'Comment_comment'.$rList->id.'','style'=>'height:72px;')); ?>
							<?php echo $form->error($comment,'comment'); ?>
							<div>&nbsp;</div>
							
							<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15 u-comment'.$rList->id.'','style'=>'display:none;')); ?>
						
						</div>
						<?php $this->endWidget();?>
						</div>
									
					</div>
					

				</div>
								<script type="text/javascript">
					$(document).ready(function(){
						var host = self.location.host;
							$('.u-comment<?php echo $rList->id;?>').hide();
							$('#Comment_comment<?php echo $rList->id;?>').click(function(e){ 
								e.stopPropagation();
								$('.u-comment<?php echo $rList->id;?>').show();
							});
							$('.u-comment<?php echo $rList->id;?>').click(function(e){
								e.stopPropagation();
							});
							$('.user-comment-to-review<?php echo $rList->id;?>').click(function(){ 

								$('.user-comment-textarea<?php echo $rList->id;?>').toggle();
							});
							$(document).click(function(){
								 $('.u-comment<?php echo $rList->id;?>').hide();
							});
							$(".user-link<?php echo $rList->id?>").click(function(){
								$('.loading<?php echo $rList->id?>').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
								$(".user-link<?php echo $rList->id?>").hide();
								$url	=	this.id;
								$.ajax({
									type: "GET",
									url:$url,
									data: "data",
									dataType: "json",
									success: function (data) {
										$('.loading<?php echo $rList->id?>').html("");
										$(".user-link<?php echo $rList->id?>").show();
										loadRowData();
									}
								});
							
							});	
							$(".user-unlike<?php echo $rList->id?>").click(function(){
								$('.busy<?php echo $rList->id?>').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
								$(".user-unlike<?php echo $rList->id?>").hide();
								$url	=	this.id;
								$.ajax({
									type: "GET",
									url:$url,
									data: "data",
									dataType: "json",
									success: function (data) {
										$('.busy<?php echo $rList->id?>').html("");
										$('.u-rate<?php echo $rList->id?>').val(data.dislike);
										$(".user-unlike<?php echo $rList->id?>").show();
										loadRowData();
									}
								});
							
							});

							
							  function loadRowData() {
								
								$.ajax({
									type: "POST",
									url: '<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$rList->id,'schoolId'=>$rList->schoolsProfile->id,'action'=>'json')); ?>',
									data: "data",
									dataType:'json',
									success:function(data){
											
												$('.like<?php echo $rList->id;?>').html(data.like);
												$('.dlike<?php echo $rList->id;?>').html(data.disLike);

										}
								});
							}
											
					});
				</script>

					
				<?php } ?>
				<?php $this->widget('CLinkPager', array('pages' => $ReviewsPages,)) ?>
			</div><!-- #tab1 -->	
		 		
		</div> <!-- .tab_container --> 
	
		  </div>
			<div class="col-md-4">
					<div class="row">
						<div class="column omega">
							<h2 class="section-heading">Recent Activity</h2>
							
							<div class="clear"></div>
						</div>

					</div>

				<div class="row">
					<?php foreach($add as $list){ ?>
					<div class="addver">
							<img width="100%" height="200" src="<?php echo Yii::app()->baseUrl;?>/uploads/addvertise/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>"/>
				</div>
					<?php } ?>
   
		
			</div>
		</div>
		
</section>
</div>
<div class="spacer27"></div>

