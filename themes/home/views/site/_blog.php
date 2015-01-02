<?php  $path	=	Yii::app()->baseUrl.'/uploads/blog/sthumb/';?> 
<article class="one-fourth">
	<figure><?php echo Chtml::link('<img width="270" height="152" src="'.$path.$data->image.'" alt="'.$data->title.'"/>',array('/site/blog','id'=>$data->id));?></figure>
    <div class="details">
    <h1><?php echo CHtml::link($data->title,array('site/blog','id'=>$data->id),array('class'=>'font_size_set'));?><span class="stars"></span></h1>
   </div>
   
</article>