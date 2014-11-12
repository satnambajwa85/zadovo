<?php

class SchoolsProfileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model	=	new SchoolsProfile;
		$login	=	new Login;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['SchoolsProfile']))
		{
			$login->attributes	=	$_POST['SchoolsProfile'];
			$login->user_name	=	$_POST['SchoolsProfile']['email'];
			$login->password	=	md5($login->password);
			$login->add_date	=	date('Y-m-d H:i:s');
			$login->last_login	=	date('Y-m-d H:i:s');
			$login->login_status=	1;
			$login->roles_id	=	3;
			if($login->save()){
				if(isset($_POST['SchoolsProfile']))
				{
					$model->attributes	=	$_POST['SchoolsProfile'];
					$model->login_id	=	$login->id;
					
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/';
					if (!empty($_FILES['SchoolsProfile']['name']['image'])) {
						$tempFile = $_FILES['SchoolsProfile']['tmp_name']['image'];
						$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
						$targetFile = $targetPath.'/'.$_FILES['SchoolsProfile']['name']['image'];
						$pat = $targetFile;
						move_uploaded_file($tempFile,$targetFile);
						$absoPath = $pat;
						$newName = time();
						$img = Yii::app()->imagemod->load($pat);
						# ORIGINAL
						$img->file_max_size = 5000000; // 5 MB
						$img->file_new_name_body = $newName;
						$img->process('uploads/SchoolsProfile/original/');
						$img->processed;
						#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
						if ($img->processed) {
							#THUMB Image
							$img->image_resize      = true;
							$img->image_x         	= 850;
							$img->image_y           = 530;
							$img->file_new_name_body = $newName;
							$img->process('uploads/SchoolsProfile/large/');
							
							#STHUMB Image
							$img->image_resize      = true;
							$img->image_x         	= 270;
							$img->image_y           = 155;
							$img->file_new_name_body = $newName;
							$img->process('uploads/SchoolsProfile/sthumb/');
					 
							$fileName	=	$img->file_dst_name;
							$img->clean();
			
						}
						$model->image	=	$fileName;
					}
					if (!empty($_FILES['SchoolsProfile']['name']['logo'])) {
						$tempFile = $_FILES['SchoolsProfile']['tmp_name']['logo'];
						$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
						$targetFile = $targetPath.'/'.$_FILES['SchoolsProfile']['name']['logo'];
						$pat = $targetFile;
						move_uploaded_file($tempFile,$targetFile);
						$absoPath = $pat;
						$newName = time();
						$img = Yii::app()->imagemod->load($pat);
						# ORIGINAL
						$img->file_max_size = 5000000; // 5 MB
						$img->file_new_name_body = $newName;
						$img->process('uploads/SchoolsProfile/original/');
						$img->processed;
						#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
						if ($img->processed) {
							#THUMB Image
							$img->image_resize      = true;
							$img->image_x         	= 270;
							$img->image_y           = 155;
							$img->file_new_name_body = $newName;
							$img->process('uploads/SchoolsProfile/logo/');
							$fileName1	=	$img->file_dst_name;
							$img->clean();
						}
						$model->logo	=	$fileName1;
					}
					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model	=	$this->loadModel($id);
		
		$model->user_name	=	$model->login->user_name;
		$model->password	=	$model->login->password;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['SchoolsProfile']))
		{
			$model->attributes=$_POST['SchoolsProfile'];
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
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array('model'=>$model,));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SchoolsProfile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SchoolsProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SchoolsProfile']))
			$model->attributes=$_GET['SchoolsProfile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SchoolsProfile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SchoolsProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SchoolsProfile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='schools-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
