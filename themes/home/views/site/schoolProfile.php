<?php 
$coun	=	count($info->ratings);
$sum	=	0;
$avrg	=	0;
if($coun > 0){
	foreach($info->ratings as $res){
		$sum	+=	$res->title;
	}
	$avrg	=	$sum/($coun);
}?>
<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<?php echo CHtml::link('<img width="850" height="531" src="'.Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/large/'.$info->logo.'" alt="'.$info->name.'"/>',array('/site/schoolProfile','id'=>$info->id));?>
                    </section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							
							<li class="description"><a href="#description" title="Description">Overview</a></li>
							<li class="facilities"><a href="#facilities" title="Facilities">Facilities</a></li>
							<li class="location"><a href="#location" title="Location">Location</a></li>
							<li class="reviews"><a href="#reviews" title="Reviews">Reviews</a></li>
							<li class="things-to-do"><a href="#things-to-do" title="Things to do">Things to do</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
					<section id="description" class="tab-content">
						<article>
							<h1>General</h1>
							<div class="text-wrap">	
								<p><?php echo $info->about_school;?></p>
							</div>
							
							<h1>Address</h1>
							<div class="text-wrap">	
								<p><?php echo $info->address1;?> <?php echo $info->cities->name;?> </p>
							</div>
                            <h1>Telephone</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->telephone;?></p>
                            </div>
                            <h1>Email</h1>
                            <div class="text-wrap">
                            <p><?php echo CHtml::link('<h3>'.$info->email.'</h3>','mailto:'.$info->email.'')?></p>
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
								<div class="gmap" id="map_canvas">
                                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=204391744755492960801.0004cf06106345ca4e606&amp;hl=en&amp;ie=UTF8&amp;ll=31.360062,75.552973&amp;spn=0,0&amp;t=m&amp;iwloc=0004cf0624d99ced51314&amp;output=embed"></iframe>
                                </div>
							<!--//map-->
						</article>
					</section>
					<!--//location-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
							<h1>Hotel Score and Score Breakdown</h1>
							<dl class="chart">
								<dt>Clean</dt>
								<dd><span id="data-one" style="width:80%;"><?php echo $info->follower;?>&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Comfort</dt>
								<dd><span id="data-two" style="width:60%;"><?php echo $info->reviews;?>&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Location</dt>
								<dd><span id="data-three" style="width:80%;"><?php echo $info->likes;?>&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Staff</dt>
								<dd><span id="data-four" style="width:100%;"><?php echo $info->want_to_join;?>&nbsp;&nbsp;&nbsp;</span></dd>
							</dl>
						</article>
						
						<article>
							<h1>Students reviews</h1>                            
                    		<ul class="reviews">
                     <?php if(!empty($fetchReview)){?>
					 <?php foreach($fetchReview as $data){?>
					
                    <li>
									<figure class="left">
                                    <?php if(Yii::app()->user->id && Yii::app()->user->profileId	==	$data->userProfiles->id) {	?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70" />',array('/user/userProfile'),array('class'=>'fl'));?>
							<?php	} else { ?>
							<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$data->userProfiles->image.'" width="70"  />',array('/site/profile','id'=>$data->userProfiles->id),array('class'=>'fl'));?>
							<?php	} ?>
                            </figure>
							<address><span><?php echo CHtml::link($data->userProfiles->first_name.' '.$data->userProfiles->last_name,array('/user/userProfile'))?>
                            </span><br /><?php echo $data->userProfiles->cities->name?></address>
						            <div class="pro"><p><?php echo $data->reviews; ?></p></div>
									<!--<div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>-->
                               </li>
                    <?php } ?>
					<?php } ?>
							</ul>
						</article>
					</section>
					<!--//reviews-->
					
					<!--things to do-->
					<section id="things-to-do" class="tab-content">
						<article>
							<h1>London</h1>
							<figure class="left_pic"><img src="images/uploads/london1.jpg" alt="Things to do - London general" /></figure>
							<p class="teaser">London is a diverse and exciting city with some of the best sights and attractions in the world. </p>
							<p>See London from above on the London Eye; meet a celebrity at Madame Tussauds; examine some of the world’s most precious treasures at the British Museum or come face-to-face with the dinosaurs at the Natural History Museum.</p>
							
							<h1>Sports and nature</h1>
							<figure class="left_pic"><img src="images/uploads/london2.jpg" alt="Things to do - London Sports and nature" /></figure>
							<p class="teaser">London is one of the greenest capitals in the world, with plenty of green and open spaces. There are more than 3000 open spaces.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
							
							<h1>Nightlife</h1>
							<figure class="left_pic"><img src="images/uploads/london3.jpg" alt="Things to do - London Nightlife" /></figure>
							<p class="teaser">Looking for nightclubs in London? Take a look at our guide to London clubs. Browse for club ideas, regular club nights and one-off events. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
							
							<h1>Culture and history</h1>
							<figure class="left_pic"><img src="images/uploads/london4.jpg" alt="Things to do - London general" /></figure>
							<p class="teaser">For a display of British pomp and ceremony, watch the Changing the Guard ceremony outside Buckingham Palace.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
							<hr />
							<a href="#" class="gradient-button right" title="Read more">Read more</a>
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


