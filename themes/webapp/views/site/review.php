<div class="spacer15"></div>
<div class="row" style="min-height:600px;">
	<div class="col-md-12">
		<div class="col-md-8">
			<h1 class="heading1"><?php echo $review->userProfiles->first_name.' '.$review->userProfiles->last_name?>'s review for <?php echo $review->schoolsProfile->name?></h1>
			<div>
				<?php echo CHtml::link('<img width="70" height="70" src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$review->userProfiles->image.'" alt="'.$review->userProfiles->first_name.' '.$review->userProfiles->last_name.'">',array('/site/profile','id'=>$review->userProfiles->id),array('class'=>'fl'))?>
				
				<div class="col-md-6 fl review-info">
					<?php echo CHtml::link('<h3>'.$review->userProfiles->first_name.' '.$review->userProfiles->last_name.'</h3>',array('/site/profile','id'=>$review->userProfiles->id));?>
					<span class="clear"><?php echo $review->userProfiles->cities->name;?></span>
					<p class="clear t-review">
						total reviews<span><?php echo $review->userProfiles->reviews;?></span><!--&nbsp;&nbsp;&nbsp;&nbsp;followers<span></span>-->
					</p>
				</div>
							
			</div>
			<div class="clear"></div>
			<p>
				<?php echo $review->reviews;?>
			</p>	
			<div class="clear"></div>
			<div class="u-comment-mar">
						<img width="40" height="40" src="<?php echo Yii::app()->baseUrl?>/uploads/users/thumb/<?php echo Yii::app()->user->userImg;?>" class="pull-left"/>
						<?php $comment = new Comment;  $form=$this->beginWidget('CActiveForm', array(	
											'id'=>'user-comment-form',
											'htmlOptions'=>array('class'=>''),
											'action'=>Yii::app()->createUrl('/user/comment'),
											'method'=>'POST',));?>
							<?php echo $form->hiddenField($comment,'rName',array('value'=>''.$review->userProfiles->first_name.''.$review->userProfiles->last_name.'')); ?>
							<?php echo $form->hiddenField($comment,'rAddress',array('value'=>''.$review->userProfiles->address.'')); ?>
							<?php echo $form->hiddenField($comment,'ruserId',array('value'=>''.$review->userProfiles->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sName',array('value'=>''.$review->schoolsProfile->name.'')); ?>
							<?php echo $form->hiddenField($comment,'rid',array('value'=>''.$review->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sid',array('value'=>''.$review->schoolsProfile->id.'')); ?>
					 	<div class="col-md-12 clear">
							
							<?php echo $form->textArea($comment,'comment',array('class'=>'form-control','placeholder'=>'Write a comment..','id'=>'Comment_comment'.$review->id.'','style'=>'height:44px;')); ?>
							<?php echo $form->error($comment,'comment'); ?>
							<div>&nbsp;</div>
							<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15 u-comment'.$review->id.'','style'=>'display:none;')); ?>
						
						</div>
						<?php $this->endWidget();?>
						
					</div>
		</div>
		<div class="col-md-4 pull-right">
			<img width="100%" src="<?php echo Yii::app()->baseUrl?>/uploads/SchoolsProfile/sthumb/<?php echo $review->schoolsProfile->logo;?>" alt="<?php echo $review->schoolsProfile->name;?>" />
		</div>
	</div>
</div>
	<script type="text/javascript">
					$(document).ready(function(){
							$("#Comment_comment<?php echo $review->id;?>").click(function(){
								$(".u-comment<?php echo $review->id;?>").show();
							});	
					});	
	</script>