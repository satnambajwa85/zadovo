<div class="clear"></div>
				<?php  
					$path	=	Yii::app()->baseUrl.'/uploads/users/thumb/';
					?>
				<div class="row top-border mt30">
					<?php if (Yii::app()->user->id) { ?>
					 <?php echo CHtml::link('<img width="80" height="80" src="'.$path.$data->image.'" alt="'.$data->first_name.'" />',array('/site/profile','id'=>$data->id),array('class'=>'fl'));?>
						<?php } else { ?>
						<?php echo CHtml::link('<img width="80" height="80" src="'.$path.$data->image.'" alt="'.$data->first_name.'" />','#',array('id'=>'internal_sign-in5','class'=>'fl'));?>
					
						<?php  } ?>
						<div class="col-md-6 fl review-info">
							<?php if(Yii::app()->user->id){ ?>
								<?php echo CHtml::link(' <h3>'.$data->first_name.'</h3>',array('/site/schoolProfile','id'=>$data->id),array('title'=>''.$data->first_name.''));?>
							<?php } else { ?>
							<?php echo CHtml::link(' <h3>'.$data->first_name.'</h3>','#',array('id'=>'internal_sign-in2'));?>
							<?php } ?>
									<span class="clear"><?php echo $data->cities->name;?></span>
									<p class="clear t-review">
										total reviews<span><?php echo $data->reviews;?></span>
									</p>
								 
					
						
						</div>
					 
						<div class="clear">
							<span><?php echo $data->profile_info;?>
							</span>
						</div>
						
					
				 
	 		 </div><!-- #tab1 -->	
<div class="clear"></div>