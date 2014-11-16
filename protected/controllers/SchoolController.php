<?php
class SchoolController extends Controller
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

	/*public function beforeAction($action)
	{
		$data		=	Setting::model()->findByAttributes(array('status'=>1,'published'=>1));
		Yii::app()->session['setting']	=	array('name'=>$data->name,
													'logo'=>$data->logo,
													'twitter'=>$data->twitter,
													'fb'=>$data->fb,
													'email'=>$data->email,
													'linkedin'=>$data->linkedin,
												);
		return true;
	}*/

	public function actionIndex()
	{	
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		$info				=	SchoolsProfile::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId));
		$id					=	$info->id;
		$blog				=	Blog::model()->findAllbyAttributes(array('status'=>1,'published'=>1,'schools_profile_id'=>$info->id));
		$cat				=	0;
		$criteria			=	new CDbCriteria();
		$criteria->condition=	'schools_profile_id='.$id;
		$count				=	UserReviews::model()->count($criteria);
		$criteria->order	=	'add_date DESC';
		$pages				=	new CPagination($count);
		$pages->pageSize	=	10;
		$pages->applyLimit($criteria);
		$fetchReview		=	UserReviews::model()->findAll($criteria);
		
		$criteria				=	new CDbCriteria;
		$criteria->condition	=	'schools_profile_id = :pid';
		$criteria->params		=	array(':pid'=>$id);
		$friendList				=	SchoolsProfileHasLogin::model()->findAll($criteria);
		$count					=	count($friendList);
		$loginIds				=	'0,';
		$likes			=	0;	
		$join			=	0;	
		$is_want_to_join=	0;	
		
		foreach($friendList as $friends){
			if($friends->is_want_to_join)
				$is_want_to_join=$is_want_to_join+1;
			if($friends->is_joined)
				$join+=1;
			if($friends->is_like)
				$likes+=1;
			$loginIds	.=	$friends->login_id.',';
		}
		
		$loginIds		=	substr($loginIds, 0, -1);
		$criteria1		=	new CDbCriteria;
		$qterm			=	'';
		$baseCondidtion =	't.status = 1 ';
		
		//$dataProvider	=	array();
		$qterm	='%%';
		$criteria1->condition = 'login_id IN ('.$loginIds.')  AND (first_name  Like :qterm OR last_name  Like :qterm) ';
		$criteria1->params = array(':qterm'=>$qterm);
		$models	=	 UserProfiles::model()->findAll($criteria1);
		$count	=	count($models);
		$dataProvider=new CActiveDataProvider('UserProfiles', array('criteria'=>$criteria1,'pagination'=>array('pageSize'=>10,),));
		
		
		$model				=	new Blog;
		if(isset($_POST['Blog']))
		{
			$model->attributes	=	$_POST['Blog'];
			$model->add_date	=	date('Y-m-d H:i:s');
			$model->status		=	1;
			$model->published	=	1;
			$model->schools_profile_id	=	$id;
			$model->user_profiles_id	=	29;
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
				$this->redirect(array('/school'));
		}
		
		
		$this->render('index',array('info'=>$info,'bData'=>$blog,'add'=>$add,'fech_result'=>$dataProvider,'fetchReview'=>$fetchReview,'cat'=>$cat,'pages'=>$pages,'likes'=>$likes,'join'=>$join,'want_to_join'=>$is_want_to_join,'model'=>$model));
	 }
	
	public function actionSchoolRegister()
	{
		
		$model	=	new SchoolsProfile;
		if(isset($_REQUEST['SchoolsProfile']))
		{	$model->attributes		=	$_POST['SchoolsProfile'];
			$model->likes			=	0;
			$model->follower		=	0;
			$model->reviews			=	0;
			$model->activation		=	1;
			$model->status			=	1;
			if(Yii::app()->user->id){
				$model->login_id		=	Yii::app()->user->userId;
			}
			$model->login_id		=	1;
			$model->memberships_id	=	1;
				
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/';
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
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 117;
					$img->image_x           = 173;
					$img->file_new_name_body = $newName;
					$img->process('uploads/SchoolsProfile/sthumb/');
					
					$img->image_resize      = true;
					$img->image_y         	= 500;
					$img->image_x           = 900;
					$img->file_new_name_body = $newName;
					$img->process('uploads/SchoolsProfile/large/');
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->logo	=	$fileName;
			}
				
				if($model->save()){ 
					
					$user						=	new AddSchoolUsers;
					$user->name					=	$_POST['SchoolsProfile']['uname'];	
					$user->email				=	$_POST['SchoolsProfile']['uemail'];	
					$user->mobile				=	$_POST['SchoolsProfile']['phone'];	
					$user->website				=	$_POST['SchoolsProfile']['uwebsite'];
					if(Yii::app()->user->id){ 
						$uId					=	Yii::app()->user->userId;
					}
					else{
						$uId					=	1;
					}
					
					$user->login_id				=	$uId;
					$user->schools_profile_id	=	$model->id;	
					if($user->save()){
						Yii::app()->user->setFlash('addschool',"Thank you for showing your interest in listing your school on Zadovo. We will get in touch with you shortly.");
						$this->refresh();
						
					}
				}
				
		}
		
		$this->render('schoolRegister',array('model'=>$model));
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
	
	public function actionProfile($id)
	{	
		$info		=  	UserProfiles::model()->findByPk($id);
		$count		=	UserReviews::model()->count($id); 
		$add		=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
	
		 
		$this->render('profile',array('info'=>$info,'count'=>$count,'add'=>$add));
	
		 
	}
	
	/**
		 * This is the action to handle external exceptions.
		 */
	
	
	
	public function actionSchoolProfile($id)
	{	
		
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		$info				=	SchoolsProfile::model()->findByPk($id);
		$blog				=	Blog::model()->findAllbyAttributes(array('status'=>1,'published'=>1,'schools_profile_id'=>$info->id));
		if(isset($_POST['date'])){
			$cat=$_POST['date'];
			$criteria			=	new CDbCriteria();
			$criteria->condition = 'schools_profile_id = :sId and add_date = :dId';
			$criteria->params = array(':sId'=>$id,':dId'=>$cat);
			$count				=	UserReviews::model()->count($criteria);
			$pages				=	new CPagination($count);
			$pages->pageSize	=	10;
			$pages->applyLimit($criteria);
			$fetchReview				=	UserReviews::model()->findAll($criteria);
		}else{
			$cat=0;
			$criteria			=	new CDbCriteria();
			$criteria->condition ='schools_profile_id='.$id;
			$count				=	UserReviews::model()->count($criteria);
			$criteria->order = 'add_date DESC';
			$pages				=	new CPagination($count);
			$pages->pageSize	=	10;
			$pages->applyLimit($criteria);
			$fetchReview				=	UserReviews::model()->findAll($criteria);
		
		}
		
		$criteria = new CDbCriteria;
		$criteria->condition = 'is_joined = :frnd and schools_profile_id = :pid';
		$criteria->params = array(':pid'=>$id,':frnd'=>'1');
		$friendList	=	SchoolsProfileHasLogin::model()->findAll($criteria);
		$count =	count($friendList);
		
		$loginIds = '0,';
		foreach($friendList as $friends){
			
			$loginIds	.=	$friends->login_id.',';
		}
		
		$loginIds	=substr($loginIds, 0, -1);
		
		
		$criteria1 = new CDbCriteria;
		$qterm		=	'';
		$baseCondidtion = 't.status = 1 ';
		if(!empty($_REQUEST['term'])){ 
			
			$qterm	=(isset($_REQUEST['term']))?'%'.$_REQUEST['term'].'%':'%%';
			$criteria1->condition = ' login_id IN ('.$loginIds.')  AND (first_name  Like :qterm OR last_name   Like :qterm OR address   Like :qterm )';
			$criteria1->params = array(':qterm'=>$qterm);
			$models	=	 UserProfiles::model()->findAll($criteria1);
			$count	=	count($models);
			$dataProvider=new CActiveDataProvider('UserProfiles', array(
								'criteria'=>$criteria1,
								'pagination'=>array(
									'pageSize'=>10,
								),
							));
		
			}
		
		else{ 
			
			$qterm	='%%';
			$criteria1->condition = 'login_id IN ('.$loginIds.')  AND (first_name  Like :qterm OR last_name  Like :qterm) ';
			$criteria1->params = array(':qterm'=>$qterm);
			$models	=	 UserProfiles::model()->findAll($criteria1);
			$count	=	count($models);
			$dataProvider=new CActiveDataProvider('UserProfiles', array(
								'criteria'=>$criteria1,
								'pagination'=>array(
									'pageSize'=>10,
								),
							));
		
			}
		 
		
		$this->render('schoolProfile',array('info'=>$info,'bData'=>$blog,'add'=>$add,'fech_result'=>$dataProvider,'fetchReview'=>$fetchReview,'cat'=>$cat,'pages'=>$pages));
	 }
	 
	 public function actionSchoolDataResponce($id)
	 {
		$info				=	SchoolsProfile::model()->findByPk($id);
		
		$data	=	array('follower'=>$info->follower,'likes'=>$info->likes ,'want_to_join'=>$info->want_to_join);
		echo $data;
		die;
	 }
	public function	actionSchoolProfileEvent($id,$action)
	{	
		if($action=='like'){
			$like						=	SchoolsProfileHasLogin::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId,'schools_profile_id'=>$id));
			if($like == NULL)
				$like						=	new SchoolsProfileHasLogin;
			
			if(!$like->is_like){
				$like->is_like				=	1;
				$like->login_id				=	Yii::app()->user->userId;
				$like->schools_profile_id	=	$id;
				if($like->save()){		
					$findId						=	 SchoolsProfile::model()->findByPk($id);
					$count						=	$findId->likes;
					$findId->likes				=	$count+1;
					$findId->phone				=	1;
					$findId->term_conditions	=	1;
					//echo	$findId->likes;die; 
					if($findId->save()){
						$findId						=	 UserReviews::model()->findByPk($id);
						$data		=	array('like'=>$findId->like,'disLike'=>$findId->dislike);
						echo CJSON::encode ($data);die;
					}
				}
					
			}
			else{
				$response = array('ststus'=>'No','message'=>'You have already Liked ');
				echo json_encode($response);die;
			}
			
			
		}
		
		if($action=='wantToJoin'){ 
			$like						=	SchoolsProfileHasLogin::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId,'schools_profile_id'=>$id));
			if($like == NULL)
				$like						=	new SchoolsProfileHasLogin;
			
			if(!$like->is_want_to_join ){
				$like->is_want_to_join 		=	1;
				$like->login_id				=	Yii::app()->user->userId;
				$like->schools_profile_id	=	$id;
				if($like->save()){		
					$findId						=	 SchoolsProfile::model()->findByPk($id);
					$count						=	$findId->want_to_join;
					$findId->want_to_join		=	$count+1;
					$findId->phone				=	1;
					$findId->term_conditions	=	1;
					if($findId->save()){
						$response = array('ststus'=>'Yes','message'=>'You have successfully send request to school');
						echo json_encode($response);die;
					}
				
				}
			
			}
			else{
					$response = array('ststus'=>'No','message'=>'You have already send request');
					echo json_encode($response);die;
				}
			
		}
		if($action=='joined'){ 
		$like						=	SchoolsProfileHasLogin::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId,'schools_profile_id'=>$id));
		if($like == NULL)
			$like						=	new SchoolsProfileHasLogin;
		
		if(!$like->is_joined ){
			$like->is_joined	 		=	1;
			$like->login_id				=	Yii::app()->user->userId;
			$like->schools_profile_id	=	$id;
			if($like->save()){		
				$findId						=	 SchoolsProfile::model()->findByPk($id);
				$count						=	$findId->follower;
				$findId->follower			=	$count+1;
				$findId->phone				=	1;
				$findId->term_conditions	=	1;
				if($findId->save()){
					$response = array('ststus'=>'Yes','message'=>'You have successfully Add to school list');
					echo json_encode($response);die;
				}
			
			}
		
		}
		else{
				$response = array('ststus'=>'No','message'=>'You have already Added ');
				echo json_encode($response);die;
			}
			
		}
		if($action=='reviewLike'){
			$findId						=	 UserReviews::model()->findByPk($id);
			$userDislike				=	 LikeDislikeReviews::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'user_reviews_id'=>$id));
			if($userDislike==Null)
				$userDislike			=	new	LikeDislikeReviews;	
			if($userDislike->is_like==0){
				$userDislike->is_like			=	1;
				$userDislike->user_profiles_id	=	Yii::app()->user->profileId;
				$userDislike->user_reviews_id	=	$id;
				$userDislike->is_dislike			=	0;
				
				if($userDislike->save()){
				
					$count						=	$findId->like;
					$findId->like				=	$count+1 ;
					$count2						=	$findId->dislike;
					if($count2==0){
					$findId->dislike			=	0 ;
					}
					else{
					$findId->dislike			=	$count2-1 ;
					}
					$findId->is_dislike			=	0 ;
					$findId->is_like			=	1 ;
					if($findId->save()){
						$userLog				=	new UserLog;
						$userLog->login_id		=	Yii::app()->user->userId;
						$userLog->add_date		=	date('Y:m:d H:i:s');
						$userLog->published		=	1;
						$userLog-> 	description =	'<span class="like">l</span><div class="rss-bot"> Liked on '.CHtml::link($findId->userProfiles->first_name.''.$findId->userProfiles->last_name,array('/site/profile','id'=>$findId->userProfiles->id)).'s review for '.CHtml::link($findId->schoolsProfile->name,array('/site/schoolProfile','id'=>$findId->schoolsProfile->id)).'</div>';
						if($userLog->save()){
							$data		=	$findId->like;
							echo CJSON::encode ($data);die;
						}
						
					}
				
				
				}
			}
			else{
						$response = array('ststus'=>'No','message'=>'You have already Liked ');
						echo CJSON::encode($response);die;

			}


			
		}	
		if($action=='reviewDisLike'){
			$findId						=	 UserReviews::model()->findByPk($id);
			$userDislike				=	 LikeDislikeReviews::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'user_reviews_id'=>$id));
			if($userDislike==Null)
				$userDislike			=	new	LikeDislikeReviews;	
			if($userDislike->is_dislike==0){
				$userDislike->is_dislike		=	1;
				$userDislike->user_profiles_id	=	Yii::app()->user->profileId;
				$userDislike->user_reviews_id	=	$id;
				$userDislike->is_like			=	0;
				
				if($userDislike->save()){
					$count1						=	$findId->like;
					if($count1==0){
					$findId->like				=	0;
					}
					else{
						$findId->like				=	$count1-1 ;
					}
					
					$count2						=	$findId->dislike;
					$findId->dislike			=	$count2+1 ;
					$findId->is_dislike			=	1 ;
					$findId->is_like			=	0 ;
					if($findId->save()){
						$userLog				=	new UserLog;
						$userLog->login_id		=	Yii::app()->user->userId;
						$userLog->add_date		=	date('Y:m:d H:i:s');
						$userLog->published		=	1;
						$userLog-> 	description =	'<span class="unlike">L</span><div class="rss-bot"> Disliked on '.CHtml::link($findId->userProfiles->first_name.''.$findId->userProfiles->last_name,array('/site/profile','id'=>$findId->userProfiles->id)).'s review for '.CHtml::link($findId->schoolsProfile->name,array('/site/schoolProfile','id'=>$findId->schoolsProfile->id)).'</div>';
						if($userLog->save())
						{
							$data		=	$findId->dislike;
							echo CJSON::encode ($data);die;
						}
					
					}
				
				}
			}
			else{
						$response = array('ststus'=>'No','message'=>'You have already Disliked ');
						echo CJSON::encode($response);die;
			}
 		}
		if($action=='json'){
			$sId	=	$_REQUEST['schoolId'];
			$findId						=	 UserReviews::model()->findByPk($id);
			$schoolUpdates				=	 SchoolsProfile::model()->findByAttributes(array('id'=>$sId));
			$data		=	array('like'=>$findId->like,'disLike'=>$findId->dislike,'follower'=>$schoolUpdates->follower,
							'want_to_join'=>$schoolUpdates->want_to_join,'reviews'=>$schoolUpdates->reviews,
							'schoollikes'=>$schoolUpdates->likes);
			echo CJSON::encode ($data);die;
 		}

		
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
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}


				/**
				 * Displays the login page
				 */
	public function actionLogin()
	{	
	
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			  
			if($model->login()){
				   
				Yii::app()->user->setFlash('success','You are sucessfully logged in.');
				if(Yii::app()->user->userType=='Administrator'){
					$this->redirect(Yii::app()->createUrl('/admin/admin'));
					
				}
				if(Yii::app()->user->userType=='school/college'){
					$this->redirect(Yii::app()->createUrl('/user/schoolProfile'));
					
				}	
				else{
					if(Yii::app()->user->userType=='user'){
					$this->redirect(Yii::app()->createUrl('/user/userProfile'));
		 
					}
			 
				}
			
			}
			else{
				Yii::app()->user->setFlash('login','Username or password not valid.');
			}
		}
		$this->render('login',array('model'=>$model));
	}
		
	//Forgot password
	public function actionForgetPassword()
	{	
	
		$model=new ForgotpasswordForm;
		if(isset($_POST['ForgotpasswordForm'])){
			$model->attributes=$_POST['ForgotpasswordForm'];
			if($model->validate())
			{
				//Searches for the record in the database for the posted email 
				$record_exists = UserProfile::model()->exists('email = :email', array(':email'=>$_POST['ForgotpasswordForm']['email']));   				
				if($record_exists==1){
					$record = UserProfile::model()->findByAttributes(array('email'=>$_POST['ForgotpasswordForm']['email'])); 
					//Generates a random number  
					$random_number = rand(99999,9999999);
					/*  Actual Code to be used  */
					$body = $this->renderPartial('/mailtemplates/forgotpassword_mail_tpl',array('userfullname'=>$record->display_name,'email' => $record->email,'password'=>$random_number), true);
					
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];                 	$subject = "Account Details";
					if(mail($record->email,$subject,$body,$headers)){
						$id = $record->id;
						//Can be encodeed id used md5
						$new_password = $random_number;
						//Updates the password with the same random nunber which has been e-mailed to the account holder
						UserProfile::model()->updateAll(array('password'=>$new_password),'id="'.$record->id.'"');
						Yii::app()->user->setFlash('new_password_message','Your new password has been sent to the email you provided.');
						$this->refresh();
					} 
					else
						Yii::app()->user->setFlash('error',"Sorry mail could not be sent this time!Please try again.");					
					}
				else{
						Yii::app()->user->setFlash('error',"The details provided by you does not match our records!");
				}
			} //validate ends
		}
		$this->render('forgetPassword',array('model'=>$model));
	}
	public function actionLogout()
	{
		$userLogin	=	Login::model()->findByPk(Yii::app()->user->userId);
			$userLogin->login_status	=	0;
			$userLogin->save();
			Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}