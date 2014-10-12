<aside class="span7 fl">
<div class=" fl top-border">
	<div class="span5">
		<div class="r-view2">
		 <?php  
		$path	=	Yii::app()->request->baseUrl.'/uploads/users/thumb/';
		?> 
		<a href="#" class="fl">
			<img width="50" height="50" src="<?php echo (!empty ($data->image)) ? $path.$data->image : $path.'noimage.jpg';?>" alt="image"/>
		</a>
			 <div class="span3 fl review-info">
				<h3><?php echo $data->first_name;?></h3>
				<span class="clear"><?php echo $data->states->name;?>&nbsp;>&nbsp;<?php echo $data->cities->name;?></span>
				<span class="clear"><?php echo $data->address;?></span>
			</div>
			
		</div>
	</div>
	<div class="span5 clear review-text">
		<b>In reviews</b>:&nbsp;<span>Demo text here Demo text here Demo text here Demo text here Demo text here Demo text here 
			
		</span>
	</div>
	 
		<div class="right search-details-reviews">
		<?php if($data->status==3){ ?>
		<?php echo CHtml::link(''.$data->reviews.'&nbsp;reviews',array('/site/schoolProfile','id'=>$data->id),array('class'=>'search-result-reviews right'));?>
		<?php } else { ?> 
		<?php } ?>
		
		</div>
</div>

</aside>
