<ul class="pull-right menu">
	<?php if (count($menu)>0) { ?>
		<?php foreach($menu as $list): ?>
		<li><?php echo CHtml::link($list->page,array('/site/page','id'=>$list->id),array('title'=>''.$list->page.''));?></li>
		<?php endforeach;?>
	<?php } ?>
</ul>
