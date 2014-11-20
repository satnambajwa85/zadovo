<div class="content clearfix">
				
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="refine-search-results">
						<h2>Refine search results</h2>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'search-form','action'=>Yii::app()->createUrl('/site/courses'),'method'=>'get',));?>
                	<dl>
							<dd>
                         <?php echo CHtml::dropDownlist('Categories',(isset($_REQUEST['Categories']))?$_REQUEST['Categories']:'',CHtml::listData(Career::model()->findAll(),'id','name'),array('empty' => '--Select a Categories--','class'=>'subscribe'));?>
							</dd>
							<dd>
								<?php echo CHtml::submitButton('Search',array('class'=>'searchbtn')); ?>
							</dd>
							</dl>
                            <?php $this->endWidget(); ?>
					</article>
				</aside>
				<!--//sidebar-->
			
				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="sort-by">
							<h3>Search Result</h3>
							
							
							<ul class="view-type">
								<li class="grid-view"><a href="#" title="grid view">grid view</a></li>
								<li class="list-view"><a href="#" title="list view">list view</a></li>
								
							</ul>
						</div>
						
						<div class="deals clearfix">
						       <?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$fech_result,
									'itemView'=>'_course',
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
					</section>
				<!--//three-fourth content-->
			</div>