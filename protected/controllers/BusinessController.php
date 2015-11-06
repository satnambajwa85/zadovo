<?php
class BusinessController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		 
		);
	}
	public function actionIndex()
	{	
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		$info				=	Business::model()->findByAttributes(array('id'=>Yii::app()->user->profileId));
		$id					=	$info->id;
		$blog				=	Blog::model()->findAllbyAttributes(array('status'=>1,'published'=>1,'login_id'=>Yii::app()->user->userId));
		$cat				=	0;
		$model				=	new Blog;
		if(isset($_POST['Blog']))
		{
			$model->attributes	=	$_POST['Blog'];
			$model->add_date	=	date('Y-m-d H:i:s');
			$model->status		=	1;
			$model->published	=	1;
			$model->schools_profile_id	=	$id;
			$model->user_profiles_id	=	1;
			$model->login_id	=	Yii::app()->user->userId;
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/blog/';
			if (!empty($_FILES['Blog']['name']['image'])) {
				$tempFile = $_FILES['Blog']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['Blog']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/blog/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_x         	= 850;
					$img->image_y           = 530;
					$img->file_new_name_body = $newName;
					$img->process('uploads/blog/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_x         	= 270;
					$img->image_y           = 155;
					$img->file_new_name_body = $newName;
					$img->process('uploads/blog/sthumb/');
			 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save())
				$this->redirect(array('/business'));
		}
		
		
		$this->render('index',array('info'=>$info,'bData'=>$blog,'add'=>$add,'model'=>$model));
	 }
	public function actionEdit()
	{
		$model				=	Business::model()->findByAttributes(array('id'=>Yii::app()->user->profileId));
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		
		if(isset($_POST['Business']))
		{
			$model->attributes	=	$_POST['Business'];
			//$model->user_name	=	$model->login->user_name;
			//$model->password	=	$model->login->password;
		
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/Business/';
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/Business/';
			if (!empty($_FILES['Business']['name']['image'])) {
				$tempFile		=	$_FILES['Business']['tmp_name']['image'];
				$targetPath		=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile		=	$targetPath.'/'.$_FILES['Business']['name']['image'];
				$pat			=	$targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath		=	$pat;
				$newName		=	time();
				$img			=	Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/Business/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      =	true;
					$img->image_x         	=	850;
					$img->image_y           =	530;
					$img->file_new_name_body=	$newName;
					$img->process('uploads/Business/large/');
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 155;
					$img->image_x           = 270;
					$img->file_new_name_body = $newName;
					$img->process('uploads/Business/sthumb/');
					$fileName	=	$img->file_dst_name;
					$img->clean();
				}
				$model->image	=	$fileName;
				if($_POST['Business']['oldImage1']!=''){
					@unlink($targetFolder1.'original/'.$_POST['Business']['oldImage1']);
					@unlink($targetFolder1.'large/'.$_POST['Business']['oldImage1']);
					@unlink($targetFolder1.'sthumb/'.$_POST['Business']['oldImage1']);
				}
			}
			else{
				$oldImage1		=	$_POST['Business']['oldImage1'];
				$model->image	=	$oldImage1;
			}
			if($model->save())
				$this->redirect(array('/business'));
		}
		$this->render('update',array('model'=>$model,'add'=>$add));
	}
	
	
	public function actionError()
	{
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
		$this->render('error',array('add'=>$add));
	}
	
}