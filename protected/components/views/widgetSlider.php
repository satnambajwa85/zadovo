<div class="main">
	<ul id="cbp-bislideshow" class="cbp-bislideshow">
	<?php  foreach($slides as $list):?>
		<li> <img src="<?php echo Yii::app()->baseUrl;?>/uploads/sliders/large/<?php echo $list->images;?>" width="100%"> <a id="foodshot-link" href="#">&nbsp;</a>
		</li>	
	 	<?php endforeach;?>
	</ul>
	<div id="cbp-bicontrols" class="cbp-bicontrols">
		<span class="cbp-biprev"></span>
		<span class="cbp-bipause"></span>
		<span class="cbp-binext"></span>
	</div>
	 <div class="search-box-area pbot2">
		<div class="search-box-2 span5">
			<div id="search-keyword">

				<div class="start-keyword-search boxes">
					<div class="start-subhead">search schools<span class="grey-text"> / by keywords</span></div>
						 
						<?php $form=$this->beginWidget('CActiveForm', array(	
											'id'=>'search-form',
											'htmlOptions'=>array('class'=>'input-append pull-right'),
											'action'=>Yii::app()->createUrl('/site/search'),
											'method'=>'get',));?>
							 <?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('class'=>'form-control','style'=>'width:326px;','placeholder'=>'Search by..'));
							echo CHtml::link('<i class="icon-search"></i>',array('/site/search'),array('class'=>'btn btn-danger fr'));?>
							 
						<?php $this->endWidget(); ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="foodshot-strip"></div>
</div>
	