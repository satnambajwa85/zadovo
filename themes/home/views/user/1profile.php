<div class="gray">
<section class="container theme-showcase">
	<aside class="profile-top-area">	
		<div class="user-img">
			<img width="119px" height="131px" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.$data->image;?>" alt="image"/>
		</div>
		<div class="user-info">
			<h1><?php echo $data->first_name.' '.$data->last_name;?></h1>
			<p><?php echo $data->gender;?>,<?php echo $data->age;?> year old</p>
			<h3>GTB School Kapurthala</h3>
			<div class="user-bref">
			<ul>
				<li><span>55</span><p>Friends</p></li>
				<li><?php echo CHtml::link('<span>43</span>','#')?><p>Friends</p></li>
				<li><span>43</span><p>Friends</p></li>
			</ul>
			</div>
		</div>
	</aside>
</section>
</div>
<div>
		
		<div class="profile-bar">
			<ul class="tabs"><li rel="tab1">profile info</li></ul>
			<ul class="tabs"><li rel="tab2">Recent Activity</li></ul>
			<ul class="tabs"><li rel="tab3">friends</li></ul>
			<ul class="tabs"><li rel="tab4">reviews</li></ul>
			 
		</div>
		<section class="container theme-showcase">
	
		<div class="tab_container"> 
			 <div id="tab1" class="tab_content"> 
				<aside class="col1 span4">
					<ul class="u-profile-inf span6">
						<li><span>Name</span><div><?php echo $data->first_name.''.$data->last_name;?></div></li>
						<li><span>age</span><div><?php echo $data->age;?></div></li>
						<li><span>Sex</span><div><?php echo $data->gender;?></div></li>
						<li><span>Address</span><div><?php echo $data->address;?></div></li>
						<li><span>favourites</span><div><?php echo $data->favourites;?></div></li>
						<li><span>work</span><div><?php echo $data->work;?></div></li>
						<li><span>email</span><div><?php echo $data->email;?></div></li>
						<li><span>website</span><div><?php echo $data->website;?></div></li>
						<li><span>dislike</span><div><?php echo $data->dislike;?></div></li>
						<li class="b-none"><span>about me</span><div><?php echo $data->profile_info;?></div></li>
					</ul>
				</aside>
		 	 </div><!-- #tab1 -->
			 <div id="tab2" class="tab_content"> 
				<aside class="col1 span4">
					<div class="recent-act" id="recent-response">
						<ul>
							<?php foreach ($log as $list) :?>
							<li><?php echo CHtml::link($list->description,array('/user/userProfile'));?>
								
								<div class="notificatio-delete del-notifi" id="<?php echo Yii::app()->createUrl('/user/delete',array('id'=>$list->id,'action'=>'log'));?>">X</div>
				
							</li>
							<?php endforeach;?>
							
						</ul>
					</div>
				</aside>
	 		 </div><!-- #tab1 -->
			 <div id="tab3" class="tab_content"> 
				<aside class="col1">
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
					
						
							<?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('id'=>'appendedInputButton','class'=>'span2','placeholder'=>'SEARCH'));
							echo CHtml::submitButton('Go!',array('class'=>'btn-red-top'));?>
						
					
					</div>
					 <?php $this->endWidget(); ?>
				</aside>
			 </div><!-- #tab1 -->	
			 <div id="tab4" class="tab_content"> 
	 		 </div><!-- #tab1 -->	
		 		 
					<aside class="col2 span4">
							<h1>Recent Activity</h1>
							<div class="gray">
								<div class="add-panel1">
 									<div id="boxscroll" style="display:none2">
										  <ul>
										  <?php foreach($log as $list): ?>
											<li>
												<div class="box">
													<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$list->image.'"/>',array('/user/'),array('class'=>'fl'));?>
													<div class="fr">
														<?php echo CHtml::link('<h3>'.$list->name.'</h3>',array('/user/'));?>
														
														<span><?php echo CHtml::link('4 mutual friends',array('/user/'));?></span>
														<p class="add-fr"><?php echo CHtml::link('add friend',array('/user/'));?></p>
													</div>
													<div class="delete-box"><span class="recent-bot-delete" id="<?php echo Yii::app()->createUrl('/user/delete
													',array('id'=>$list->id,'action'=>'recent'))?>">X</span>

													</div>
												</div>
											</li>
										<?php endforeach;?>
						
						
										  </ul>
									</div>
								</div>
								<div class="addver"><h3>Advertise Here</h3></div>
								<div class="addver"><h3>Advertise Here</h3></div>
								</div> 
					</aside>
			 
		</div> <!-- .tab_container --> 

	</section>

</div>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.nicescroll.min.js"></script>
<script>
	$(document).ready(function(){
		setInterval(function() {
		$.ajax({
			type: "POST",
			url: '<?php echo Yii::app()->createUrl('/user/addFriend',array('id'=>1,'action'=>'render')); ?>',
			data: "fList",
			success:function(data){
					$('#boxscroll').html(data); 
				}
					 
																	 
		});
	},   10000 ); 
	});
</script>