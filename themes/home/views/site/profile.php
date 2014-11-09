<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<article class="static-content post-comment">
                        <ul class="room-types">
                                <!--room-->
                                <li>
                                    <span class="left"><img width="270" height="152" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.$info->image;?>"></span>
                                    <div class="meta">
                                        <h1><?php echo $info->first_name.' '.$info->last_name;?></h1>
                                        <p><?php echo $info->gender;?>,&nbsp;<?php echo (date('Y-m-d'))-($info->date_of_birth);?> year old</p>
                                        
                                        <a class="more-info" title="more info" href="javascript:void(0)">+ more info</a>
                                    </div>
                                    <div class="room-information">
                                        <div class="row">
                                            <span class="first ex_width">Friends:</span>
                                            <span class="second"><?php echo $count;?></span>
                                        
                                        </div>
                                        <div class="row">
                                            <span class="first ex_width">Followers:</span>
                                            <span class="second "><?php echo $info->reviews;?></span>
                                        </div>
                                        <div class="row">
                                            <span class="first ex_width">Reviews:</span>
                                            <span class="second"><?php echo $info->reviews;?></span>
                                        </div>
                                    </div>
                                    <div class="more-information" style="display: none;">
                                        <p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
                                        <p><strong>Room Facilities:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
                                        <p><strong>Bed Size(s):</strong> 1 Double </p>
                                        <p><strong>Room Size:</strong>  16 square metres</p>
                                    </div>
                                </li>
                                <!--//room-->
                                
                                
                            </ul>
                            
                        </article>
                    <!--//post-->
                    
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							
							<li class="description"><a href="#description" title="Description">Profile info</a></li>
							<li class="location"><a href="#activity" title="Location">Recent Activity</a></li>
							<li class="things-to-do"><a href="#friends" title="Things to do">Friends</a></li>
                            <li class="reviews"><a href="#reviews" title="Reviews">Reviews</a></li>
							
						</ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
					<section id="description" class="tab-content">
						<article>
							<h1>General</h1>
							<div class="text-wrap">	
								<p><?php echo $info->profile_info;?></p>
							</div>
							
							<h1>Date of birth</h1>
							<div class="text-wrap">	
								<p><?php echo $info->date_of_birth;?> </p>
							</div>
                            <h1>Gender</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->gender;?></p>
                            </div>
                            
                             <h1>Address</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->address;?></p>
                            </div>
                             <h1>Work</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->work;?></p>
                            </div>
                             <h1>favourites</h1>
                            <div class="text-wrap">
                            <p><?php echo $info->favourites;?></p>
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
					<section id="activity" class="tab-content">
						<article>
							
                            
                            <?php foreach($log as $list):?>
							<div class="text-wrap">	
								<?php echo CHtml::link('<img src="'.$list->image.'"/>',array('user/'),array('class'=>'fl'));?>
								
								<?php echo $list->name.' '.$list->description;?>
                            </div>
							<?php endforeach;?>
						</article>
					</section>
					<!--//facilities-->
					
				
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
						
                        
                        
						</article>
					</section>
					<!--//reviews-->
					
					<!--things to do-->
					<section id="friends" class="tab-content">
						<article>
							
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


