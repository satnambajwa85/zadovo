<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<?php echo CHtml::link('<img width="850" height="531" src="'.Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/large/'.$info->image.'" alt="'.$info->name.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
                                <div class="black_strip">
                        
                       <div class="image_position">
                       	 <?php echo CHtml::link('<img width="150" height="115" src="'.Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/logo/'.$info->logo.'" alt="'.$info->name.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
                       </div>
                        
                        	<div class="b_left_s"><p>8/12</p><span>Average Rating by users</span></div>
                        	<ul class="fl review-icon " style="float:right; margin-top:16px;">
				
				<?php if(Yii::app()->user->id) { ?>
				<li>
                	<a href="javascript:void();"><p class="like"><?php echo $likes;?> Like</p></a>
				</li>
				<li>
                	<a href="javascript:void();"><p class="join"><?php echo $join;?> Joined</p></a>
				</li>				
				<li>
                	<a href="javascript:void();"><p class="like1"><?php echo $want_to_join;?> Want To Join</p></a>
                </li>
				<li>
				<a href="#modal_text" title="Write your review" class="modal"><p class="comments_1">Write review</p></a>
                <div id="modal_text">

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
                </li>
				
				<?php } else { ?>
                <li>
                	<a href="javascript:void();" title="Please Login" class="message"><p class="like"><?php echo $likes;?> Like</p></a>
				</li>
				<li>
                	<a href="javascript:void();" title="Please Login" class="message"><p class="join"><?php echo $join;?> Joined</p></a>
				</li>				
				<li>
                	<a href="javascript:void();" title="Please Login" class="message"><p class="like1"><?php echo $want_to_join;?> Want To Join</p></a>
                </li>
                <li>
				<a href="#nothing" title="Please Login" class="message"><p class="comments_1">29 Write review</p> </a>

                </li>
				<?php } ?>
				
			</ul>
                        </div>
                    </section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							
							<li class="description"><a href="#description" title="Description">Overview</a></li>
							<li class="location"><a href="#location" title="Location">Location</a></li>
							<li class="reviews"><a href="#reviews" title="Reviews">Reviews</a></li>
							<li class="things-to-do"><a href="#things-to-do" title="Things to do">Blog</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
					<section id="description" class="tab-content">
                    	<article id="message" class="hide sucess_message">
                        
                        </article>
                    	
                        
                    
                    
					<?php if(Yii::app()->user->id) { 
					$rating	=	Rating::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'schools_profile_id'=>$info->id));
					}
					?>
						<article style="position:relative;" >
                        	<div class="rate" style="position:absolute;right:20px;">
                            <?php echo CHtml::link('Edit Profile',array('/school/edit'));?>
                        	<div class="basic" data-average="<?php echo (isset($rating->title))?($rating->title*2):'0';?>" data-id="1"></div>
							</div>
                            <h1>General</h1>
							<div class="text-wrap">	
								<p><?php echo $info->overview;?></p>
							</div>
							
							<h1>Address</h1>
							<div class="text-wrap">	
								<p><?php echo $info->address1;?> <?php echo $info->cities->name;?> </p>
							</div>
                            <h1>Telephone</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->phone_number;?></p>
                            </div>
                            <h1>Email</h1>
                            <div class="text-wrap">
                            <p><?php echo CHtml::link($info->email,'mailto:'.$info->email.'')?></p>
                            </div>
                             <h1>Website</h1>
                            <div class="text-wrap">
                            <p><?php echo CHtml::link($info->website,$info->website,array('target'=>'_blank'))?></p>
                            </div>
                            
                            
                            
						</article>
					</section>
					<!--//description-->
					
					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							<h1>Facilities</h1>
							<div class="text-wrap">	
								<ul class="three-col">
									<li>Kitchenette</li>
									<li>Ironing board</li>
									<li>Catering services</li>
									<li>Beachfront</li>
									<li>Hotspots</li>
									<li>Exhibition/convention floor</li>
									<li>Car hire</li>
								</ul>
							</div>
							
							<h1>Activities</h1>
							<div class="text-wrap">	
								<p>Tennis court, Sauna, Fitness centre, Massage </p>
							</div>
							
							<h1>Internet</h1>
							<div class="text-wrap">	
								<p><strong>Free!</strong> WiFi is available in all areas and is free of charge. </p>
							</div>
							
							<h1>Parking</h1>
							<div class="text-wrap">	
								<p>Private parking is possible at a location nearby (reservation is not needed) and costs USD 28.80 per day.</p>
							</div>
						</article>
					</section>
					<!--//facilities-->
					
					<!--location-->
					<section id="location" class="tab-content">
						<article>
							<!--map-->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv2OOJAC5AxVNXGBIMH5njntbvrZnGxLQ">
    </script>
    <script type="text/javascript">
     /* function initialize() {
        var mapOptions = {
          center: { lat: -34.397, lng: 150.644},
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);*/
</script>-->
                                
                                
                                <div class="gmap" id="map_canvas"></div>
							<!--//map-->
						</article>
					</section>
					<!--//location-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
							<h1>Students reviews</h1>                            
                    		<ul class="reviews">
                     <?php if(!empty($fetchReview)){?>
					 <?php foreach($fetchReview as $data){?>
					
                    <li>
									<figure class="left">
                                    <?php if(Yii::app()->user->id && Yii::app()->user->profileId	==	$data->userProfiles->id) {	?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70" height="70" />',array('/user/userProfile'),array('class'=>'fl'));?>
							<?php	} else { ?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70" height="70" />',array('/site/profile','id'=>$data->userProfiles->id),array('class'=>'fl'));?>
							<?php	} ?>
                            </figure>
							<address><span>
							 <?php if(Yii::app()->user->id && Yii::app()->user->profileId	==	$data->userProfiles->id) {	?>
							<?php echo CHtml::link($data->userProfiles->first_name.' '.$data->userProfiles->last_name,array('/user/userProfile'))?>
                            <?php	} else { ?>
							<?php echo CHtml::link($data->userProfiles->first_name.' '.$data->userProfiles->last_name,array('/site/profile','id'=>$data->userProfiles->id))?>
							<?php	} ?>
                            
                            
							
							
                            </span><br /><?php echo $data->userProfiles->cities->name?></address>
						            <div class="pro"><p><?php echo $data->reviews; ?></p></div>
									<!--<div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>-->
                               </li>
                    <?php } ?>
					<?php }else{
								echo '<h4 style="margin-top:20px;text-align: center;">No Record Found</h4>';
							} ?>
							</ul>
						</article>
					</section>
					<!--//reviews-->
					
					<!--things to do-->
					<section id="things-to-do" class="tab-content">
                    	<article>
                        	<div>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'blog-form','enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'),)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="f-item active">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
<div class="clear"></div>
	<div class="f-item active">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="clear"></div>
	<div class="f-item active mt10">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php echo $form->fileField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
    <div class="clear"></div>
	<p class="f-item active mt30">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'gradient-button')); ?>
	</p>

<?php $this->endWidget(); ?>


                            
                            </div>
                            
                            <hr />
							<?php if(!empty($bData)){
							foreach($bData as $blog){?>
                            <!--<h1><?php echo $blog->title;?></h1>-->
							<figure class="left_pic"><?php echo CHtml::link('<img src="uploads/blog/sthumb/'.$blog->image.'" alt="'.$blog->title.'" />',array('/site/blog','id'=>$blog->id));?></figure>
							<p class="teaser"><?php echo CHtml::link($blog->title,array('/site/blog','id'=>$blog->id));?></p>
							<p><?php echo substr($blog->description,0,250);?>...</p>
							<hr />
                            <?php }
							}else{
								echo '<h4 style="margin-top:20px;text-align: center;">No Record Found</h4>';
							}
							?>
                            <!--<a href="#" class="gradient-button right" title="Read more">Read more</a>-->
						</article>
					</section>
					<!--//things to do-->
				</section>
				<!--//hotel content-->
				
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
            
			<!--//column-->
 

<?php Yii::app()->clientScript->registerScript('modelScript','$(document).ready(function(){
	var basePathWeb	=	"'.Yii::app()->theme->baseUrl.'";
	$.fn.modal.defaults={width:500,height:300};
	$(".modal").modal({draggable:true});
	$(".message").modal({position:{width:220,bottom:"0px",right:"0px"},shadow:false,showSpeed:1000,closeSpeed:1000,overlay:false,autoOpen:true,autoClose:5000,draggable:false,message:"Hello World, <br/> This is a test."});
	$(".basic").jRating({
			bigStarsPath : basePathWeb+"/images/stars.png",
			smallStarsPath : basePathWeb+"/images/small.png",
			phpPath : "'.Yii::app()->createUrl('/user/rating',array('id'=>$info->id)).'"});

	});', CClientScript::POS_END);?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jRating.jquery.js', CClientScript::POS_END);?>