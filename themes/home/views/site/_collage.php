<?php  $path	=	Yii::app()->baseUrl.'/uploads/career_options/small/';
//$data->image;
?> 
<article class="full-width">
	<figure><?php echo Chtml::link('<img width="270" height="152" src="'.$path.'no-image.jpg'.'" alt="'.$data->name.'"/>',array('/site/collage','id'=>$data->id));?></figure>
    <div class="details">
    <h1><?php echo CHtml::link($data->name,array('site/collage','id'=>$data->id),array('class'=>'font_size_set'));?><span class="stars"></span></h1>
   </div>
   
</article>