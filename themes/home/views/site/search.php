<div class="content clearfix">
				
			
				<!--sidebar-->
				<aside class="left-sidebar">
					<article class="refine-search-results">
						<h2>Refine search results</h2>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'search-form','action'=>Yii::app()->createUrl('/site/search'),'method'=>'get',));?>
                	<dl>
							<dd>
                          <h4>Search by City</h4>  
                         <?php echo CHtml::dropDownlist('cities_id',(isset($_REQUEST['cities_id']))?$_REQUEST['cities_id']:'',CHtml::listData(Cities::model()->findAll(),'id','name'),array('empty' => '--Select a city--','class'=>'subscribe'));?>
                         
                         
							</dd>
							<dd>
                            <h4>Search by Name</h4>
                         	<?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('class'=>'subscribe','placeholder'=>'Search by..'));?>
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
							<!--
							<div class="bottom-nav">
								<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
								<div class="pager">
									<span><a href="#">First page</a></span>
									<span><a href="#">&lt;</a></span>
									<span class="current">1</span>
									<span><a href="#">2</a></span>
									<span><a href="#">3</a></span>
									<span><a href="#">4</a></span>
									<span><a href="#">5</a></span>
									<span><a href="#">6</a></span>
									<span><a href="#">7</a></span>
									<span><a href="#">8</a></span>
									<span><a href="#">&gt;</a></span>
									<span><a href="#">Last page</a></span>
								</div>
							</div>-->
						</div>
					</section>
				<!--//three-fourth content-->
			</div>