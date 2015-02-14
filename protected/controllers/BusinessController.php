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
		$model				=	SchoolsProfile::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId));
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		
		if(isset($_POST['SchoolsProfile']))
		{
			$model->attributes	=	$_POST['SchoolsProfile'];
			$model->user_name	=	$model->login->user_name;
			$model->password	=	$model->login->password;
		
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/';
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/';
			
			if (!empty($_FILES['SchoolsProfile']['name']['logo'])) {
				$tempFile		=	$_FILES['SchoolsProfile']['tmp_name']['logo'];
				$targetPath		=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile		=	$targetPath.'/'.$_FILES['SchoolsProfile']['name']['logo'];
				$pat			=	$targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath		=	$pat;
				$newName		=	time();
				$img			=	Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/SchoolsProfile/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#logo Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 150;
					$img->file_new_name_body = $newName;
					$img->process('uploads/SchoolsProfile/logo/');
					$fileName	=	$img->file_dst_name;
					$img->clean();
				}
				$model->logo	=	$fileName;
				if($_POST['SchoolsProfile']['oldImage']!=''){
					@unlink($targetFolder1.'logo/'.$_POST['SchoolsProfile']['oldImage']);
				}
			}
			else{
				$oldImage	=	$_POST['SchoolsProfile']['oldImage'];
				$model->logo	=	$oldImage;
			}
			
			if (!empty($_FILES['SchoolsProfile']['name']['image'])) {
				$tempFile		=	$_FILES['SchoolsProfile']['tmp_name']['image'];
				$targetPath		=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile		=	$targetPath.'/'.$_FILES['SchoolsProfile']['name']['image'];
				$pat			=	$targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath		=	$pat;
				$newName		=	time();
				$img			=	Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/SchoolsProfile/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      =	true;
					$img->image_x         	=	850;
					$img->image_y           =	530;
					$img->file_new_name_body=	$newName;
					$img->process('uploads/SchoolsProfile/large/');
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 155;
					$img->image_x           = 270;
					$img->file_new_name_body = $newName;
					$img->process('uploads/SchoolsProfile/sthumb/');
					$fileName	=	$img->file_dst_name;
					$img->clean();
				}
				$model->image	=	$fileName;
				if($_POST['SchoolsProfile']['oldImage1']!=''){
					@unlink($targetFolder1.'original/'.$_POST['SchoolsProfile']['oldImage1']);
					@unlink($targetFolder1.'large/'.$_POST['SchoolsProfile']['oldImage1']);
					@unlink($targetFolder1.'sthumb/'.$_POST['SchoolsProfile']['oldImage1']);
				}
			}
			else{
				$oldImage1		=	$_POST['SchoolsProfile']['oldImage1'];
				$model->image	=	$oldImage1;
			}
			if($model->save())
				$this->redirect(array('/school'));
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