<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/jRating.css" rel="stylesheet">
<div class="content clearfix">
				<!--breadcrumbs-->
				
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<?php echo CHtml::link('<img width="850" height="350" src="'.Yii::app()->request->baseUrl.'/uploads/business/large/'.$data->image.'" alt="'.$data->title.'"/>',array('/site/business','id'=>$data->id));?>
                    </section>
					<!--//gallery-->
					
					<!--description-->
                    
				
                    
                    
                    <!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							 <li class=""><a href="#overview" title="Adress">Overview</a></li>
                             <li class=""><a href="#location" title="Adress">Location</a></li>
                             
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
								<p><?php echo $data->address_line_1.' '.$data->address_line_2;?></p>
							</div>
						</article>
					</section>
                    
                    <section id="location" class="tab-content">
                    	<article id="message" class="hide sucess_message"></article>
						<article style="position:relative;" >
                        	<div style="position:absolute;right:20px;">
                        	<div class="basic" data-average="5" data-id="1"></div>
							</div>
                            <h1>Location</h1>
							<div class="text-wrap">	
								<p><?php echo $data->description;?></p>
							</div>
						</article>
					</section>
					
                    
                    
                    <article style="position:relative;" >
                        	
                            <div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=846828762012851&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo Yii::app()->createAbsoluteUrl('/site/business',array('id'=>$data->id));?>" data-numposts="5" data-colorscheme="light"></div>          

                            
                            </div>
                                                        
						</article>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    	
					</section>
					<!--//description-->
					
					
				
				
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
