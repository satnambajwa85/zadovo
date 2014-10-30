<div class="gray mb35">
<section class="container theme-showcase" >
		<div class="row mt24">
		  <div class="fl">
				<div class="user-img">
					<?php echo CHtml::link('<img width="119px" height="131px" src="'.Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$info->logo.'" alt="'.$info->name.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
					
				</div>
		  </div>
			<div class="col-md-6">
				<div class="span5 school-info">
					<div class="school-form2">
						<?php echo CHtml::link('<h1>'.$info->name.'</h1>',array('/site/schoolProfile','id'=>$info->id));?>
						<span class="fl"><?php echo $info->cities->name;?></span>
						<ul>
							<li><span class="span1">Telephone</span><h3><?php echo $info->telephone;?></h3></li>
							<li><span class="span1">address</span><h3><?php echo $info->address1;?></h3></li>
							
							<li><span class="span1">email</span><?php echo CHtml::link('<h3>'.$info->email.'</h3>','mailto:'.$info->email.'')?></li>
							<li><span class="span1">website</span><?php echo CHtml::link('<h3>'.$info->website.'</h3>',''.$info->website.'',array('target'=>'_blank'))?></li>
						</ul>
					 </div>
				</div>
		</div>
		<div class="col-md-4">
			<aside class="fr padd24">
				<div class="fl">
		<script type="text/javascript">
			var zomato = zomato || {};
			HOST = "<?php echo Yii::app()->createUrl('/user/rating',array('id'=>$info->id)); ?>";
			COOKIE_DOMAIN = "zadovo.com";
			

			
		</script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/ratingWidget.js"></script>

	<div class="restaurant-rating-widget" style="display: inline-block;"> 
        
        <div class="grid_4 your-rating rating-widget  rating-widget-res_15221" data-res_id="15221" data-rating-for="restaurant" data-review_id="">
            <div class="rating-top">
                
                <div class="rating-widget-num right" data-original-rating-num="-">5.0</div>
                <a style="display: inline;" href="#" data-icon="x" class="rating-clear hidden"></a>
                <img style="display: none;" class="hidden rating-working ie-rating-fix" src="Basant,%20Civil%20Lines,%20Ludhiana%20_%20Zomato_files/floading_002.gif" alt="saving">
                <div class="clear"></div>
            </div>
            <div>
                <div class="rating-widget-stars left" id="review-form">
                    <div class="rating-cls user_stars2_10" data-originalclass="user_stars2_0" data-rating="0">
					
						<a href="#" class="level-9 big bigger" data-num="10" data-hover-rating="5.0" data-original-title="5.0">&nbsp;</a>
						<a href="#" class="level-8 big" data-num="9" data-hover-rating="4.5" data-original-title="4.5">&nbsp;</a>
						<a href="#" class="level-7 big" data-num="8" data-hover-rating="4.0" data-original-title="4.0">&nbsp;</a>
						<a href="#" class="level-6" data-num="7" data-hover-rating="3.5" data-original-title="3.5">&nbsp;</a>
						<a href="#" class="level-5" data-num="6" data-hover-rating="3.0" data-original-title="3.0">&nbsp;</a>
						<a href="#" class="level-4" data-num="5" data-hover-rating="2.5" data-original-title="2.5">&nbsp;</a>
						<a href="#" class="level-3" data-num="4" data-hover-rating="2.0" data-original-title="2.0">&nbsp;</a>
						<a href="#" class="level-2" data-num="3" data-hover-rating="1.5" data-original-title="1.5">&nbsp;</a>
						<a href="#" class="level-1" data-num="2" data-hover-rating="1.0" data-original-title="1.0">&nbsp;</a>
						
						<div class="user_sel_stars2_10"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <span class="ratingtext" data-original=""></span>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
					

				
        
					<div class="span3 school-rating fr">
					<?php	 
						$schoolReviews	=	SchoolsProfile::model()->findAllByAttributes(array('id'=>$info->id));	
						foreach($schoolReviews as $rList){
							$reviewlike		=	$rList->likes;
							
							$totalCount 	=	$reviewlike;
							$joined			=	$rList->follower;
							$total			=	($totalCount) + ($joined);
							$av				=	$total*10/100;
							$color			=	"";
						}
						
						if($av > 1 or $av < 1 ){
							$color	=	1;
						}			
						if($av > 2){
							$color	=	2;
						}
					?>
						<ul>
							<li><div class="rating br-active<?php echo $color;?>"><?php echo $av==100?'100':$av;?>%</div><h3>famous</h3></li>
							<li><div class="rating follower"><?php echo $info->follower;?></div><?php echo CHtml::link('students Joined&nbsp;<span class="icon-bookmark"></span>','');?></li>
							<li><div class="rating schoolreviews"><?php echo $info->reviews;?></div><?php echo CHtml::link('reviews&nbsp;<span class="icon-chevron-right"></span>','');?></li>
							<li><div class="rating schoolLikes"><?php echo $info->likes;?></div>Likes &nbsp; <span class="icon-heart"></span></li>
							<li><div class="rating schoolWanttoJoin"><?php echo $info->want_to_join;?></div>Want to join &nbsp; <span class="icon-ok"> </span> </li>

							
						</ul>
					</div>
			
				
		</div>
        </aside>
        </div>
		<div class="clear"></div>
		<div class="col-md-12 school-review">
			<ul class="fl review-icon">
				<?php if(Yii::app()->user->id) { ?>
				<li>
					<div id="loading"></div>
					<span class="icon-heart add-fav heart-add-fav" data-toggle="tooltip" data-placement="bottom" title="Add favorite" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>Yii::app()->request->getQuery('id'),'action'=>'like'));?>"></span>
				</li>
				<li>
					<div id="join-school-loading"></div>
					<span class="icon-bookmark  join-school" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>Yii::app()->request->getQuery('id'),'action'=>'joined'))?>" data-toggle="tooltip" data-placement="bottom" title="Join your school"></span>
				</li>
				
				<li>
					<div id="want-to-join-loading"></div>
					<span class="icon-ok want-to-join want-to-join-bt" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>Yii::app()->request->getQuery('id'),'action'=>'wantToJoin'));?>" data-toggle="tooltip" data-placement="bottom" title="Want to join"></span>
				</li>
				<li><?php echo CHtml::link('write review&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-chevron-right"></span>','',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Write your review to school','class'=>'write-review-to-school','id'=>'userReviewa'))?></li>
				
				<?php } else { ?>
				<li>
					<?php echo CHtml::Link('<span class="icon-heart"></span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Add favorite','class'=>'add-fav','id'=>'internal_sign-in2'))?>
				</li>
				<li><?php echo CHtml::Link('<span class="icon-bookmark"></span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Join your school','class'=>'join-school2','id'=>'internal_sign-in3'))?></li>
				<li><?php echo CHtml::Link('<span class="icon-ok"></span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Want to join','class'=>'want-to-join','id'=>'internal_sign-in4'))?></li>
				<li><?php echo CHtml::link('write review&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-chevron-right"></span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Write your review to school','class'=>'write-review-to-school','id'=>'internal_sign-in5'))?></li>
				
				<?php } ?>
				
			</ul>
		
		</div>
        
	</section>
</div>
<div class="white">
	<section class="container theme-showcase">
        <section id="profile-map" class="review-box success-map" >	
             
            <div id="popup_box" class="col-md-6">
                <span id="popupBoxClose" class="icon-remove cursor" ></span>
                <div class="row schoolReview">
                                <h1 class="comment">write your review</h1>
                                <?php $review =	new UserReviews; $form=$this->beginWidget('CActiveForm', array(	
                                                    'id'=>'user-search-form',
                                                    'action'=>Yii::app()->createUrl('/user/reviews'),
                                                    'method'=>'POST',));?>
                                    <?php echo $form->hiddenField($info,'id'); ?>	
                                    <?php echo $form->hiddenField($review,'sName',array('value'=>''.$info->name.'')); ?>
                                    <?php echo $form->hiddenField($review,'sAddress',array('value'=>''.$info->address1.'')); ?>
                                    <?php echo $form->hiddenField($review,'simg',array('value'=>''.$info->logo.'')); ?>
                                <div class="col-md-12 clear">
                                    
                                    <?php echo $form->textArea($review,'reviews',array('class'=>'form-control')); ?>
                                    
                                    <?php echo $form->error($review,'reviews'); ?>
                                    <div>&nbsp;</div>
                                    <?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15')); ?>
                                
                                </div>
                                <?php $this->endWidget();?>
                                
                </div>
            </div> 									 
        </section>
<div class="clear"></div>
		<div class="row">
		  <div class="row col-md-12">
				<div class="profile-bar">
					<ul class="tabs"><li rel="tab1">reviews</li></ul>
					<ul class="tabs"><li rel="tab2">blog</li></ul>
					<ul class="tabs"><li rel="tab3">student list</li></ul>
					<ul class="tabs"><li rel="tab4">info</li></ul>
					<ul class="tabs"><li rel="tab5">schooally</li></ul>
					 
				</div>
		  </div>
		  
		</div>
		<div class="row white mt21">
		  <div class="col-md-8">
				<div class="tab_container span8"> 
			 <div id="tab1" class="tab_content"> 
			 <div class="col-md-12 row hot-link">
						<h1>student reviews for school</h1>
						    <ul class="nav nav-tabs fr">
								<li><span>sort by</span></li>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle">date<b class="caret"></b></a>
											<?php $form=$this->beginWidget('CActiveForm',
													array('id'=>'date-form','htmlOptions'=>array('class'=>'dropdown-menu'),	));
						
										echo CHTML::dropDownList('date',
										$cat,CHtml::listData(UserReviews::model()->findAllByAttributes(array('schools_profile_id'=>$info->id)),
										'add_date','add_date'),array('onchange' => 'document.currency-form.submit()',));
										$this->endWidget();
									?>
										
								</li>
								<li><a href="#">ratting</a></li>
							</ul>
					</div>
					
					<?php foreach($fetchReview as $data){?>
						
				<div class="col-md-12 top-border mb10">
					
					<div class="row">
						<div>
							<?php if(Yii::app()->user->id && Yii::app()->user->profileId	==	$data->userProfiles->id) {	?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70" height="70"/>',array('/user/userProfile'),array('class'=>'fl'));?>
							
							<?php	} else { ?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70" height="70"/>',array('/site/profile','id'=>$data->userProfiles->id),array('class'=>'fl'));?>
							
						
							
							<?php	} ?>
							<div class="col-md-6 fl review-info">
								<?php echo CHtml::link('<h3>'.$data->userProfiles->first_name.' '.$data->userProfiles->last_name.'</h3>',array('/user/userProfile'))?>
								<span class="clear"><?php echo $data->userProfiles->cities->name?></span>
								<p class="clear t-review">
									total reviews<span><?php echo $data->userProfiles->reviews;?></span><!--&nbsp;&nbsp;&nbsp;&nbsp;followers<span><?php //echo $data->userProfiles->reviews;?></span>-->
								</p>
							</div>
							
						</div>
					</div>
					<div class="row clear review-text">
						<span class="<?php echo $data->id; ?>"><?php echo $data->reviews; ?>
						</span>
					</div>
					<div class="row border-bottom ">
						<ul class="fl review-icon">
						<?php if(Yii::app()->user->id) { ?>
							<li>
								<div id="loading" class="loading<?php echo $data->id?>"></div>
								<span class="like user-link<?php echo $data->id?>" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$data->id,'action'=>'reviewLike'))?>" data-toggle="tooltip" data-placement="bottom" title="Like" >l</span>
							</li>
							
							<li><span class="l-rate total-count like<?php echo $data->id;?>"><?php echo $data->like;?></span></li>
							<li><span class="u-rate total-count dlike<?php echo $data->id;?>"><?php echo $data->dislike;?></span></li>
							<li>
								<div id="loading" class="busy<?php echo $data->id?>"></div>
								<span class="unlike user-unlike<?php echo $data->id?>" id="<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$data->id,'action'=>'reviewDisLike'))?>" data-toggle="tooltip" data-placement="bottom" title="Dislike" >L</span>
								
							</li>
						<?php  } else { ?>
							<li><?php echo CHtml::Link('<span class="like">l</span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Like','class'=>'like','id'=>'internal_sign-in3'));?></li>
							<li><span class="l-rate total-count like<?php echo $data->id;?>"><?php echo $data->like;?></span></li>
							<li><span class="u-rate total-count dlike<?php echo $data->id;?>"><?php echo $data->dislike;?></span></li>
							<li><?php echo CHtml::Link('<span class="unlike">L</span>','#',array('data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Dislike','class'=>'dislike','id'=>'internal_sign-in3'))?></li>
						<?php } ?>
						</ul>
						<?php 	$userComments		=	Comment::model()->findAllByAttributes(array('user_reviews_id'=>$data->id));	
						?>
						<h3 class="pull-right commemt-text-count">Comments</h3>
						<p class="pull-right stat-count"><?php echo count($userComments);?></p>
									
					</div>
					
					<?php if(!empty($userComments)){?>
					<?php foreach($userComments as $comment) { ?>
					
					<div class="row">
					<?php if(Yii::app()->user->id && Yii::app()->user->profileId	==	$comment->userProfiles->id) {	?>
								<?php echo Chtml::link('<img width="40" height="40" src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'. $comment->userProfiles->image.'" class="pull-left"/>',array('/user/userProfile'));?>
					
							<?php	} else { ?>
								<?php echo Chtml::link('<img width="40" height="40" src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'. $comment->userProfiles->image.'" class="pull-left"/>',array('/site/profile','id'=>$comment->userProfiles->id));?>
				
							<?php	} ?>
					<div class="comment-title">
						<?php echo CHtml::link('<span>'.$comment->userProfiles->first_name.' '.$comment->userProfiles->last_name.'</span>',array('/site/profile','id'=>$comment->userProfiles->id));?>
						<div class="clear"></div>
						<i><?php echo (date('H:i:s')-($comment->add_time));?> ago</i>
						</div>
						<div class="fl">
							
								<span class="commemt-text-sent"><?php echo $comment->comment;?></span><br/>
								
						</div>
					</div>
					
				
					<div class="clear"></div>
					<?php } ?>
					<?php } ?>
					<?php if(Yii::app()->user->id){ ?>
					<div class="row u-comment-mar">
						<img width="40" height="40" src="<?php echo Yii::app()->baseUrl?>/uploads/users/thumb/<?php echo Yii::app()->user->userImg;?>" class="pull-left"/>
						<?php 	$comment = new Comment;
								$form=$this->beginWidget('CActiveForm',
									array('id'=>'user-comment-form',
									'enableAjaxValidation'=>false,
									'enableClientValidation'=>true,
									'clientOptions'=>array('validateOnSubmit'=>true,
									'validateOnChange'=>true,),
									'action'=>Yii::app()->createUrl('/user/comment'),
									
									));  ?>				

							<?php echo $form->hiddenField($comment,'rName',array('value'=>''.$data->userProfiles->first_name.' '.$data->userProfiles->last_name.'')); ?>
							<?php echo $form->hiddenField($comment,'rAddress',array('value'=>''.$data->userProfiles->address.'')); ?>
							<?php echo $form->hiddenField($comment,'ruserId',array('value'=>''.$data->userProfiles->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sName',array('value'=>''.$info->name.'')); ?>
							<?php echo $form->hiddenField($comment,'rid',array('value'=>''.$data->id.'')); ?>
							<?php echo $form->hiddenField($comment,'sid',array('value'=>''.$info->id.'')); ?>
					 	<div class="col-md-12 clear">
							
							<?php echo $form->textArea($comment,'comment',array('class'=>'form-control','placeholder'=>'Write a comment..','id'=>'Comment_comment'.$data->id.'','style'=>'height:44px;')); ?>
							<?php echo $form->error($comment,'comment'); ?>
							<div>&nbsp;</div>
							
							<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15 u-comment'.$data->id.'','style'=>'display:none;')); ?>
						
						</div>
						<?php $this->endWidget();?>
						
					</div>
					<?php } else { ?>

					<?php } ?>
				</div>
		
				<script type="text/javascript">
					$(document).ready(function(){
						var host = self.location.host;
							$('.u-comment<?php echo $data->id;?>').hide();
							$('#Comment_comment<?php echo $data->id;?>').click(function(e){ 
								e.stopPropagation();
								$('.u-comment<?php echo $data->id;?>').show();
							});
							$('.u-comment<?php echo $data->id;?>').click(function(e){
								e.stopPropagation();
							});

							$(document).click(function(){
								 $('.u-comment<?php echo $data->id;?>').hide();
							});
							$(".user-link<?php echo $data->id?>").click(function(){
								$('.loading<?php echo $data->id?>').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
								$(".user-link<?php echo $data->id?>").hide();
								$url	=	this.id;
								$.ajax({
									type: "GET",
									url:$url,
									data: "data",
									dataType: "json",
									success: function (data) {
										$('.loading<?php echo $data->id?>').html("");
										$(".user-link<?php echo $data->id?>").show();
										loadRowData();
									}
								});
							
							});	
							$(".user-unlike<?php echo $data->id?>").click(function(){
								$('.busy<?php echo $data->id?>').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
								$(".user-unlike<?php echo $data->id?>").hide();
								$url	=	this.id;
								$.ajax({
									type: "GET",
									url:$url,
									data: "data",
									dataType: "json",
									success: function (data) {
										$('.busy<?php echo $data->id?>').html("");
										$('.u-rate<?php echo $data->id?>').val(data.dislike);
										$(".user-unlike<?php echo $data->id?>").show();
										loadRowData();
									}
								});
							
							});

							
							  function loadRowData() {
								
								$.ajax({
									type: "POST",
									url: '<?php echo Yii::app()->createUrl('/site/schoolProfileEvent',array('id'=>$data->id,'schoolId'=>$info->id,'action'=>'json')); ?>',
									data: "data",
									dataType:'json',
									success:function(data){
											
												$('.like<?php echo $data->id;?>').html(data.like);
												$('.dlike<?php echo $data->id;?>').html(data.disLike);
												$('.follower').html(data.follower);
												$('.schoolreviews').html(data.reviews);
												$('.schoolLikes').html(data.schoollikes);
												$('.schoolLikes').html(data.schoollikes);
												$('.schoolWanttoJoin').html(data.want_to_join);
										}
								});
							}
											
					});
				</script>

					<?php } ?>
					<?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
		 	 </div><!-- #tab1 -->
			 <div id="tab2" class="tab_content"> 
				<aside>
					<div class="recent-act" id="recent-response">
						<div class="row mb35">
						<?php if(Yii::app()->user->id){  ?>
							<span class="add_blog">Write a blog</span>
							
							<section class="add-blog-box success-map" id="profile-map">	
		 					<div class="col-md-12" id="popup_box" style="display: block;">
								<span class="icon-remove" id="popupBoxClose2"></span>
								<div class="row  schoolReview">
									<h1 class="comment">Add images/videos</h1>
									<?php $blog = new Blog;  $form	=	$this->beginWidget('CActiveForm', array(	
											'id'=>'user-blog-form',
											'htmlOptions'=>array('enctype'=>'multipart/form-data'),
											'action'=>Yii::app()->createUrl('/user/blog'),
											'method'=>'POST',));?>
												
									<div class="col-md-12 clear">
										
										<?php echo $form->hiddenField($blog,'sName',array('value'=>''.$info->name.'')); ?>
										<?php echo $form->hiddenField($blog,'sAddress',array('value'=>''.$info->address1.'')); ?>
										<?php echo $form->hiddenField($blog,'simg',array('value'=>''.$info->logo.'')); ?>
										<?php echo $form->hiddenField($blog,'sid',array('value'=>''.Yii::app()->request->getQuery('id').'')); ?>
										<p class="span3 fl">
											<?php echo $form->labelEx($blog,'title'); ?>
											<?php echo $form->textField($blog,'title',array('class'=>'form-control')); ?>
											
										</p>
										<p class="span3 fl">
											<?php echo $form->labelEx($blog,'image'); ?>
											<?php echo $form->fileField($blog,'image'); ?>
											
										</p>
										<div class="clear"></div>
										<p class="fl">
										
											<?php echo $form->labelEx($blog,'description'); ?>
											<?php echo $form->textArea($blog,'description',array('class'=>'form-control col-md-12')); ?>
											
										</p>
										
										
										<div class="clear"></div>
										<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15')); ?>
									
									</div>
									<?php $this->endWidget();?>

																		
								</div>
							</div> 									 
						</section>
						<?php } else { ?>
							<span id="internal_sign-in2" class="add_blog2">Write a blog</span>
						<?php } ?>
						</div>
						
						<?php foreach($bData as $list){ ?>
						<div class="row mb35">
							<div class="row col-md-12">
								<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$list->userProfiles->image.'" width="70" height="70" />','#',array('id'=>'internal_sign-in5','class'=>'fl')); ?>
								<div class="col-md-6 fl review-info">
									<?php echo CHtml::link($list->userProfiles->first_name.' '.$list->userProfiles->last_name,'#',array('id'=>'internal_sign-in5','class'=>'fl')); ?>
									<span class="clear"><?php echo $list->userProfiles->cities->name;?></span>
									<p class="clear t-review">
										total reviews<span><?php echo $list->userProfiles->reviews;?></span><!--&nbsp;&nbsp;&nbsp;&nbsp;followers<span></span>-->
									</p>
								</div>
							</div>
								
 
							</div>
						<div class="clear"></div>
						<div class=" border mb10">
							
						
							<img src="<?php echo Yii::app()->baseUrl;?>/uploads/blog/large/<?php echo $list->image;?>" width="100%" height="100%"/>
 
						</div>
						<?php } ?>
					</div>
				</aside>
	 		 </div><!-- #tab1 -->
			 <div id="tab3" class="tab_content"> 
				<aside class="col-md-12">
					<?php $form=$this->beginWidget('CActiveForm', array(	
											'id'=>'user-search-form',
											'action'=>Yii::app()->createUrl('/site/schoolProfile&id='.$info->id.''),
											'method'=>'POST',));?>
					<div class="friends-sort">
						<span class="fl">sort by</span>
						    <em><?php echo CHtml::link('NAME','#');?>&nbsp;</em>
						    <em><?php echo CHtml::link('AGE','#');?>&nbsp;</em>
						    <em><?php echo CHtml::link('GENDER','#');?>&nbsp;</em>
					</div>
					<div class="search2 fr">
					
						
							<?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('class'=>'form-control','placeholder'=>'SEARCH'));
						echo CHtml::link('<i class="icon-search"></i>',array('/site/schoolProfile&id='.$info->id),array('class'=>'btn btn-danger fr'));?>
						
						</div>
					 <?php $this->endWidget(); ?>
					 <div class="clear"></div>
					<div class="col-md-12">
						
						<div class="user-result ">
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
				
					</div>
				</aside>
			 </div><!-- #tab1 -->	
			 <div id="tab4" class="tab_content">
				<div class="col-md-12 top-border">
					<div class="row">
						<div class="r-view">
						<img width="50" height="50" src="<?php echo Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$info->logo;?>" alt="<?php echo $info->name;?>" class="fl"/>
							<div class="col-md-6 fl school-info-area">
								<h3><?php echo $info->name; ?></h3>
								<div class="clear"></div>
								<span class="clear"><?php echo $info->cities->name;; ?></span>
								
							</div>
							<div class="fr famous">
								<h1>famous</h1>
								<span>10%</span>
								
							</div>
						</div>
					</div>
					<div class="row clear review-text">
						<span><?php echo $info->about_school;?>
						</span>
					</div>
			
					<div class="row u-comment">
						<h1 class="comment">write a comment</h1>
						<?php $form=$this->beginWidget('CActiveForm', array(	
											'id'=>'user-search-form',
											'action'=>Yii::app()->createUrl('/user/userProfile'),
											'method'=>'POST',));?>
												
					 	<div class="col-md-12 clear">
							
							<?php echo $form->textArea($info,'name',array('class'=>'form-control')); ?>
							<?php echo $form->error($info,'name'); ?>
							<div>&nbsp;</div>
							<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger fr mr15')); ?>
						
						</div>
						<?php $this->endWidget();?>
						
					</div>
					
				</div>
	 		 </div><!-- #tab1 -->	
		 		
		</div> <!-- .tab_container --> 
	
		  </div>
			<div class="col-md-4 pull-right">
				<div class="row">
					<?php foreach($add as $list){ ?>
					<div class="addver">
						<img width="100%" height="200" src="<?php echo Yii::app()->baseUrl;?>/uploads/addvertise/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>"/>
					</div>
					<?php } ?>
					
					
				</div>
			</div>
		</div>
		
</section>
</div>
<div class="spacer27"></div>
