 
				<div class="col-md-12 top-border">
					<div class="row">
						<div>
								<?php  
					$path	=	Yii::app()->baseUrl.'/uploads/SchoolsProfile/sthumb/';
					?> 
					<div class="fl">
						
						<?php echo Chtml::link('<img width="80" height="80" src="'.$path.$data->logo.'" alt="'.$data->name.'"/>',array('/site/schoolProfile','id'=>$data->id));?>
					</div>
							<div class="col-md-6 fl">
								<?php echo CHtml::link(' <h3 class="fl ser-title">'.$data->name.'</h3>',array('/site/schoolProfile','id'=>$data->id),array('title'=>''.$data->name.''));?>
								<div class="clear"></div>
								<span><?php echo $data->address1;?></span>
								<p class="clear t-review"><?php //echo CHtml::link('total reviews - 200','#')?></p>
							</div>
							<div class="fr famous2">
								<div class="rating-rank left fl">
                                <div class="rating-text-div-15233 ttupper">Very Good</div>
				                     <p class="rating-votes-div-15233 grey-text"><?php echo $data->likes;?> user votes</p>
				                </div>
								<span>4.0</span>
								<div class="clear"></div>
								<div align="right" class="right search-details-reviews">
								<i class="glyphicon glyphicon-pencil"></i>
								<?php echo CHtml::link(''.$data->reviews.' reviews',array('/site/schoolProfile','id'=>$data->id),array('title'=>''.$data->name.''));?>
								
									
								</div>
							</div>
						</div>
					<div class="clear review-text bb2">
						<span><?php echo $data->about_school;?>
						</span>
					</div>
					
					
				</div>
	 		 </div><!-- #tab1 -->	
<div class="clear"></div>