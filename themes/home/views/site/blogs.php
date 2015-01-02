<div class="content clearfix">
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
                    'dataProvider'=>$data,
                    'itemView'=>'_blog',
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
    
    <aside class="right-sidebar">
					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with school selection.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article>
					<!--//Need Help Booking?-->
					
					<!--Deal of the day-->
					<?php foreach($add as $list){ ?>
					<article class="default clearfix">
						<h2><?php //echo $list->title; ?></h2>
						<div class="deal-of-the-day">
							<a href="<?php echo $list->link; ?>" target="_blank">
								<figure><img src="<?php echo Yii::app()->baseUrl;?>/uploads/addvertise/large/<?php echo $list->image ?>" alt="<?php echo $list->description;?>" width="230" height="130" /></figure>
								<h3><?php echo $list->advertiseCategories->name;?></h3>
								<p><span class="price"> <small><?php echo $list->description;?></small></span></p>
							</a>
						</div>
					</article>
					
					<?php } ?>
                    
					<!--//Deal of the day-->
				</aside>
</div>