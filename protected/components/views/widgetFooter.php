<?php if(Yii::app()->user->id) { ?>
<div class="footer-bottom">
		<section class="container theme-showcase">	
			<div class="footer-left span4">
				<ul>
					<?php foreach($AfterLoginMenu as $list){ ?>
					<li><?php echo CHtml::link($list->page,array('/site/page','id'=>$list->id),array('title'=>$list->page));?></li>
					<?php } ?>
				</ul>
			</div>
			<div class="footer-center span3">
				<ul>
					<li><h3>registerd users</h3></br><span><?php echo $totalUser;?></span></li>
					<li><h3>registerd schools/colleges</h3></br><span><?php echo $totalSechool;?></span></li>
					<li><h3>online now</h3></br><span><?php echo $totalUserOnline;?></span></li>
				
					 
				</ul>
			</div>
			<div class="footer-right span3">
				<h1>zadovo</h1>
				<div class="social-icon">
					<?php echo CHtml::link('<i class="icon-facebook-sign"></i>',''.Yii::app()->session['setting']['fb'].'',array('target'=>'_blank')); ?>
					<?php echo CHtml::link('<i class="icon-twitter-sign"></i>',''.Yii::app()->session['setting']['twitter'].'',array('target'=>'_blank')); ?>
				</div>
			</div>
	 
			 
		</section>
		
	</div>
	
<?php } ?>
<section class="container theme-showcase">
<div class="span12 f-align">
		 
			<ul  class="f-menu"> 
			<?php foreach($menu as $list):?>
				<li><?php echo CHtml::link($list->page,array('/site/page','id'=>$list->id),array('title'=>$list->page));?></li>
			<?php endforeach;?>
			</ul>
		 
</div>
<div class="clear"></div>
<div class="copyright" align="center"><p>ZADOVO <?php echo date('Y');?></p></div>
</section>