<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/jRating.css" rel="stylesheet">
<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<?php echo CHtml::link('<img width="850" height="531" src="'.Yii::app()->request->baseUrl.'/uploads/career_options/large/'.$info->image.'" alt="'.$info->title.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
                        
                        <!--<div class="black_strip">
                        	<div class="b_left_s"><p>8/12</p><span>Average Rating by users</span></div>
            <ul class="fl review-icon " style="float:right; margin-top:16px;">
				
                <li>
				<a href="#nothing" title="Please Login" class="message"><p class="like"> 21 Like</p></a>
				</li>
				<li>
				<a href="#nothing" title="Please Login" class="message"><p class="join">120 Join</p></a>
                </li>
				<li>
				<a href="#nothing" title="Please Login" class="message"><p class="like1"> 50 Want to join</p></a>
				</li>
				<li>
				<a href="#nothing" title="Please Login" class="message"><p class="comments_1">29 Write review</p> </a>

                </li>
				
				
			</ul>
                        </div>-->
                    </section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<?php $details	=	CareerDetails::model()->findAllByAttributes(array('career_options_id'=>$info->id));
							foreach($details as $data){?>
                            <li class=""><a href="#location-<?php echo $data->id;?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a></li>
                            <?php } ?>
							
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
                    <?php foreach($details as $data){?>
					<section id="location-<?php echo $data->id;?>" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>
						<article style="position:relative;" >
                        	<div style="position:absolute;right:20px;">
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1><?php echo $data->title;?></h1>
							<div class="text-wrap">	
								<p><?php echo $data->description;?></p>
							</div>
							
						
                            
                            
						</article>
					</section>
					<!--//description-->
                    <?php }?>
					
					
					
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
