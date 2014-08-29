
<section class="container theme-showcase col-md-12">
		<div class="row white mt21">
		  <div class="col-md-8">
<?php $id=$_REQUEST['id']; if($id==1){ $this->widget('application.widgets.blog.Blog'); }?>
<?php $id=$_REQUEST['id']; if($id==9){ $this->widget('application.widgets.contact.Contact'); }?>
<?php $id=$_REQUEST['id']; if($id==6){ $this->redirect(array('/site/schoolRegister'));} ?>
<?php $id=$_REQUEST['id']; if($id==5){ $this->redirect(array('/site/search'));} ?>
<?php $id=$_REQUEST['id']; if($id==8){ $this->widget('application.widgets.feedback.Feedback');} ?>
<?php echo $data->content;?>
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