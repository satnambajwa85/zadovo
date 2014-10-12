<section id="home">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<div class="intro-heading">
							<div class="scrolltop wow fadeInUp" data-wow-delay="0.4s">
								<ul>
									<li><h3><span>Welcome to</span> ZADOVO</h3>
                                    	<h4><span>Your community resource to find and share information about schools</span></h4>
                                    </li>
									
								</ul>
							</div>
							<span class="divider"></span>
							<div class="clearfix"></div>
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>'search-form','action'=>Yii::app()->createUrl('/site/search'),'method'=>'get',));?>
                	<fieldset class="subscribe-form">
                    	<select class="subscribe" name="stateSelectReviews" tabindex="2"><option value="AK">AK</option>
                                    <option value="AL">AL</option>
                                    <option value="AR">AR</option>
                                <option value="AZ">AZ</option></select>
						<?php echo CHtml::textField('term','',array('class'=>'subscribe','placeholder'=>'Search by..'));
						echo CHtml::submitButton('Search',array('class'=>'subscribe-button')); ?>
					</fieldset> 
				<?php $this->endWidget(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>