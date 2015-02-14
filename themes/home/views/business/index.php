<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<?php echo CHtml::link('<img width="850" height="531" src="'.Yii::app()->request->baseUrl.'/uploads/business/large/'.$info->image.'" alt="'.$info->title.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
                                
                    </section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							
							<li class="description"><a href="#description" title="About">About</a></li>
							<li class="location"><a href="#facilities" title="Facilities">Facilities</a></li>
							<li class="reviews"><a href="#reviews" title="Contact Details">Contact Details</a></li>
							<li class="things-to-do"><a href="#things-to-do" title="Blog">Blog</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
					<section id="description" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>					
						<article style="position:relative;" >
                        	<div class="rate" style="position:absolute;right:20px;">
                            <?php echo CHtml::link('Edit Profile',array('/business/edit'));?>
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1>About</h1>
							<div class="text-wrap">	
								<p><?php echo $info->about_the_business;?></p>
							</div>                           
						</article>
					</section>
					<!--//description-->
					
					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							<h1>Facilities</h1>							
							<div class="text-wrap">	
								<p><?php echo $info->additional_info;?> </p>
							</div>
							<h1>Address</h1>
							<div class="text-wrap">	
								<p><?php echo $info->address_line_1;?> <?php echo $info->address_line_2;?> </p>
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
							<h1>Age Group</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->start_age_group.'-'.$info->end_age_group;?></p>
                            </div>
							
						</article>
					</section>
					<!--//facilities-->
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
                        	<h1><?php echo $info->designation;?></h1>
							<div class="text-wrap">	
								<p><?php echo $info->prefix.' '.$info->first_name.' '.$info->last_name;?>
								<br>
								
								<?php echo $info->email1;?>
								<br>
								<?php echo $info->mobile_no;?>
								</p>
							
							</div>
							
							<h1><?php echo $info->designation2;?></h1>
							<div class="text-wrap">	
								<p><?php echo $info->prefix2.' '.$info->first_name2.' '.$info->last_name2;?>
								<br>
								
								<?php echo $info->email2;?>
								<br>
								<?php echo $info->mobile_no2;?>
								</p>
							
							</div>
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