<div class="content clearfix">

	<aside class="left-sidebar">
					<article class="refine-search-results">
						<h2>Refine search results</h2>
                        
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'collages-search-form','method'=>'get','action'=>Yii::app()->createUrl('/site/collages'),'enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'),)); ?>
                	<dl>
                        <dd>
                        <?php echo CHtml::textField('search',(isset($_REQUEST['search']))?$_REQUEST['search']:'',array('title' => 'search','class'=>'serach-input mt20','id'=>"aa",'style'=>""));?>
                        </dd>
                            <dd>
                         <?php
						 $model->state=(isset($_REQUEST['Collage']['state']))?$_REQUEST['Collage']['state']:'';
						  echo $form->dropDownList($model,'state',CHtml::listData(States::model()->findAll(array('condition'=>'status = 1 and published=1')),'id', 'name'),array('ajax' => array('type'=>'POST','url'=>Yii::app()->createUrl('/site/dynamicCollageCity'),'update'=>'#Collage_city_id',),'placeholder'=>'State','empty'=>'Select State'));?>
							</dd>
                            
                            
                            <dd>
                         <?php 
						if(!empty($_REQUEST['Collage']['state']))
							$listC			=	CHtml::listData(Cities::model()->findAll(array('condition'=>'status = 1 and published=1 and states_id='.$_REQUEST['Collage']['state'])),'id', 'name');
						else
							$listC			=	CHtml::listData(Cities::model()->findAll(array('condition'=>'status = 1 and published=1')),'id', 'name');
						
						
						$model->city_id	=	(isset($_REQUEST['Collage']['state']))?$_REQUEST['Collage']['city_id']:'';
						echo $form->dropDownList($model,'city_id',$listC,array('placeholder'=>'City Name','value'=>$model->city_id,'empty'=>'Select City'));?>
							</dd>
							<dd>
								<?php echo CHtml::submitButton('Search',array('class'=>'searchbtn')); ?>
							</dd>
							</dl>
                            <?php $this->endWidget(); ?>
					</article>
				</aside>

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
                    'dataProvider'=>$Institutes,
                    'itemView'=>'_collage',
                    'id'=>'featured_company', 
                    'htmlOptions'=>array('class'=>'col-md-12','style'=>'min-width:300px;'),
                    'ajaxUpdate'=>true, 
                    'summaryText'=>false,
                    'pager' => array(
                        'header' => '',
                        'cssFile' =>'',
                        'firstPageLabel'=>'',
                        'lastPageLabel'=>'',
                        'prevPageLabel'=>'«',
                        'nextPageLabel'=>'»',
                        ),
                )); ?>
        </div>
    </section>
</div>