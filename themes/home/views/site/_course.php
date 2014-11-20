<?php  $path	=	Yii::app()->baseUrl.'/uploads/career_options/small/';?> 
<article class="one-fourth">
	<figure><?php echo Chtml::link('<img width="270" height="152" src="'.$path.$data->image.'" alt="'.$data->title.'"/>',array('/site/course','id'=>$data->id));?></figure>
    <div class="details">
    <h1><?php echo CHtml::link($data->title,array('/site/course','id'=>$data->id),array('title'=>''.$data->title.''));?><span class="stars"></span></h1>
    <span class="address"><?php //echo $data->address1;?></span>
    <span class="rating"> <?php //echo $data->likes;?> votes</span>
    <span class="price"> Users reviews on this school  <em><?php //echo $data->reviews;?></em></span>
    <div class="clear"></div>
    <div class="description">
    <p><?php //echo substr($data->about_school,0,100);?> <?php echo Chtml::link('More info',array('/site/schoolProfile','id'=>$data->id));?></p>
    </div>
    <?php //echo CHtml::link('View',array('/site/schoolProfile','id'=>$data->id),array('title'=>$data->name,'class'=>'gradient-button'));?>    </div>
</article>