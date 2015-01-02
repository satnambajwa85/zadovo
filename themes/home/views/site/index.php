<section id="home">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="intro-heading">
                    <div class="scrolltop wow fadeInUp" data-wow-delay="0.4s">
                        <ul>
                            <li><h3><span>Welcome to</span> ZADOVO</h3>
                                <h4><span>Collaborate, find and share information about the schools in your area. Zadovo helps you steer your child's career in the right direction.</span></h4>
                            </li>
                            
                        </ul>
                    </div>
                    <span class="divider"></span>
                    <div class="clearfix"></div>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'search-form','action'=>Yii::app()->createUrl('/site/search'),'method'=>'get',));?>
            <fieldset class="subscribe-form">
                 <?php echo CHtml::dropDownlist('cities_id','',CHtml::listData(Cities::model()->findAll(),'id','name'),array('empty' => '--Select a city--','class'=>'subscribe'));?>
                 
                <?php echo CHtml::textField('term','',array('class'=>'subscribe','placeholder'=>'Search by..'));
                echo CHtml::submitButton('Search',array('class'=>'subscribe-button')); ?>
            </fieldset> 
        <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</section>