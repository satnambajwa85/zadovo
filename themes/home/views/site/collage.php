<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/jRating.css" rel="stylesheet">
<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<img width="850" height="350" src="<?php echo Yii::app()->request->baseUrl.'/uploads/career_options/large/no-image.jpg" alt="'.$info->name;?> "/>
                    </section>
					<!--//gallery-->
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
                            <li class=""><a href="#overview" title="Description">Overview</a></li>
                            <li class=""><a href="#location" title="Description">Why</a></li>
                            <li class=""><a href="#Courses" title="Description">Courses</a></li>
                        </ul>
					</nav>
					<!--//inner navigation-->
					<!--description-->
                    <section id="overview" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>
						<article style="position:relative;" >
                        	<div style="position:absolute;right:20px;">
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1>Overview</h1>
							<div class="text-wrap">	
								<p><?php echo $info->overview;?></p>
							</div>
						</article>
					</section>
                    
					<section id="location" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>
						<article style="position:relative;" >
                        	<div style="position:absolute;right:20px;">
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1>Why</h1>
							<div class="text-wrap ml25">	
								<p><?php echo $info->why;?></p>
							</div>
						</article>
					</section>
                    
                    <section id="Courses" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>
						<article style="position:relative;" >
                        	<div style="position:absolute;right:20px;">
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1>Courses</h1>
							<div class="text-wrap">	
							<?php 
$list	=	array();
foreach($info->collagesCoursesSpecialization as $cou){
	$list[$cou->specialization->id]['id']		=	$cou->specialization->id;
	$list[$cou->specialization->id]['title']	=	$cou->specialization->title;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['id']		=	$cou->courses->id;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['description']		=	$cou->courses->description;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['title']	=	$cou->courses->title;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['admission_criteria']	=	$cou->admission_criteria;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['entrance_exam']	=	$cou->entrance_exam;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['fees']	=	$cou->fees;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['seats']	=	$cou->seats;
	$list[$cou->specialization->id]['course'][$cou->courses->id]['course_mode']	=	$cou->course_mode;
}
			$count	=	0;
			foreach($list as $cou){?>
				<div class="panel panel-default col-md-12">
					
                        <a data-toggle="collapse"  data-parent="#accordion" href="#collapseOne<?php echo $cou['id'];?>">
                    <div class="panel-heading col-md-12" style="margin-left:10px; float:left; ">
                        <h5 class="panel-title">    
						<?php echo $cou['title'];?>
                         </h5>
                    </div>
                        </a>
                       
					<div id="collapseOne<?php echo $cou['id'];?>" class="panel-collapse collapse <?php echo ($count==0)?'in':'';?>">
      <div class="panel-body">
      
		<?php foreach($cou['course'] as  $sat){?>
				<div class="col-md-10 bb mb10 mt5 fr ml25">
                    <div class="row">
                        <div class="col-md-12" style="font-size:14px;color:#42C6C1;border-bottom: 1px solid #21C4C1;margin-bottom:10px;"><?php echo $sat['title'];?></div>
                    </div>
                <div class="row">
				<div class="col-md-4 title_text" >Description :</div>
                <div class="col-md-8"> <?php echo $sat['description'];?></div>
                </div>
                <div class="row">
				<div class="col-md-4 title_text" >Admission Criteria :</div>
                <div class="col-md-8"> <?php echo $sat['admission_criteria'];?></div>
                </div>
                <div class="row">
				<div class="col-md-4 title_text" >Entrance Exam :</div>
                <div class="col-md-8"> <?php echo $sat['entrance_exam'];?></div>
                </div>
                    <div class="row">
				<div class="col-md-4 title_text" >Fees :</div>
                <div class="col-md-8"> <?php echo $sat['fees'];?></div>
                </div>
                    <div class="row">
				<div class="col-md-4 title_text" >Seats :</div>
                <div class="col-md-8"> <?php echo $sat['seats'];?></div>
                </div>
                    <div class="row">
				<div class="col-md-4 title_text" >Course Mode :</div>
                <div class="col-md-8"> <?php echo $sat['course_mode'];?></div>
                </div>
                
                </div>
        <?php }?>
	  </div>
    </div>
				</div>
			<?php
			$count++;
			} ?>
							</div>
						</article>
					</section>
					<!--//description-->
                  
					
					
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
