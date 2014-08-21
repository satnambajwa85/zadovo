<img  width="40" height="40" src="<?php echo Yii::app()->baseUrl.'/uploads/users/thumb/'.Yii::app()->user->userImg;?>" class="user-image-tab-link"/>
<div class="user-profile-tab col-md-4">
		<div class="first-country">
			<div class="clearfix country country-1">
				<div class="row col-md-12">
				<?php echo CHtml::link('<img  width="60" height="60" src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.Yii::app()->user->userImg.'" />',array('/user/userProfile'),array('class'=>'pull-left'))?>
					<div class="col-md-6">
						<?php echo CHtml::link(Yii::app()->user->userName,array('/user/userProfile',array('/user/userProfile')))?>
						<div class="user-activity-count">
							<span><?php echo $userProfile->reviews;?>&nbsp;Reviews/&nbsp;<?php echo $userProfile->follower;?>&nbsp;Follower</span>
						</div>
					</div>
					
				</div>
				
						
					
																										
			</div>
		</div>
		<div class="user-dropdown-links">
            <a href="#" style="font-weight: bold; text-transform: uppercase;">Invite your friends to Zadovo</a>
        </div>
		<div class="row">
			<ul class="udr">
			
				<li><?php echo Chtml::link('<span class="glyphicon glyphicon-user glyphicon  heart-size"></span>',array('/user/userProfile#friends'),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Friends','class'=>'friends')); ?></li>
				<li><?php echo Chtml::link('<span class="glyphicon glyphicon-pencil   heart-size"></span>',array('/user/userProfile#reviews'),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Reviews','class'=>'userReviewsLink')); ?></li>
				<li><?php echo Chtml::link('<span class="glyphicon glyphicon-bell heart-size"></span>',array('/user/userProfile#recent'),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Recent Activities','class'=>'recentUpdate')); ?></li>
				<li><?php echo Chtml::link('<span class="glyphicon glyphicon-cog heart-size"></span>',array('/user/editProfile'),array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Setting','class'=>'setting')); ?></li>
				</ul>
		</div>
		<div>
			<?php echo CHtml::link('LOGOUT',array('/site/logout'),array('id'=>'logout-bt','class'=>'btn btn-danger '));?>
			
		</div>
		
</div>
