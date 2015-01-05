
<section class="container theme-showcase col-md-12">
		<div class="row white mt21">
		  <div class="col-md-8" align="center">
			<strong class="not-found-error">404</strong>
				
		  </div>
			<div class="col-md-4 gray">
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
<div class="spacer15"></div>