<div class="gray mb35">
<section class="container theme-showcase">
		<div class="row mt24">
		 		<div class="fl">
					
						<img width="119px" height="131px" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.$info->image;?>" alt="image"/>
					
				</div>
		 
			<div class="col-md-8">
				<div class="user-info">
							<h1><?php echo $info->first_name.' '.$info->last_name;?></h1>
							<p><?php echo $info->gender;?>&nbsp;,<?php echo (date('Y-m-d'))-($info->date_of_birth);?> year old</p>

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
						<li><span>Name</span><div></div></li>
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
					</aside>
			 </div><!-- #tab1 -->	
			 <div id="tab4" class="tab_content">
			
			</div><!-- #tab1 -->	
		 		
		</div> <!-- .tab_container --> 
	
		  </div>
			<div class="col-md-4">
			 	 		 		<div class="row">
									 
									 
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

