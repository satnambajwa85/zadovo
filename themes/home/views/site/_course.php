<?php  $path	=	Yii::app()->baseUrl.'/uploads/career_options/small/';?> 
<article class="full-width">
	<figure><?php echo Chtml::link('<img width="270" height="152" src="'.$path.$data->image.'" alt="'.$data->title.'"/>',array('/site/course','id'=>$data->id));?></figure>
    <div class="details">
    <h1><?php echo CHtml::link($data->title,array('/site/course','id'=>$data->id),array('title'=>''.$data->title.''));?><span class="stars"></span></h1>
   </div>
   
</article>