
<div class="gray mb35 min-height-filter">
<section class="container theme-showcase">
		<div class="row mt24">
		  <div class="col-md-12">
			
	
		  </div>
			<div class="col-md-8">
				
			</div>
		</div>
	</section>
</div>
<div class="white">
	<section class="container theme-showcase col-md-12">
		<div class="row">
		  <div class="col-md-12">
			<div class="profile-bar">
			
			 
		</div>
		  </div>
		  
		</div>
		<div class="row">
		<div class=" white mt21 col-md-8">
		 		
					 
						       <?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$fech_result,
									'itemView'=>'_school',
									'id'=>'featured_company', 
									'htmlOptions'=>array('class'=>'col-md-12','style'=>'min-width:300px;'),
									'ajaxUpdate'=>true, 
									'summaryText'=>false,
									'pager' => array(
										'header' => '',
										'cssFile' =>'',
										'firstPageLabel'=>'First',
										'lastPageLabel'=>'Last',
										'prevPageLabel'=>'« Prev',
										'nextPageLabel'=>'Next »',
										),
								)); ?>
					 
			 
				
		
			
		</div>
		<div class="col-md-4 ">
				<div class="row">
					<?php foreach($add as $list){ ?>
					<div class="addver">
						<img width="100%" height="200" src="<?php echo Yii::app()->baseUrl;?>/uploads/addvertise/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>"/>
					</div>
					<?php } ?>
					
					
				</div>
			</div>
		</div>
			</section>
</div>
<div class="spacer27"></div>

