<?php
class UserController extends Controller
{
	public $layout='//layouts/main';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}	
	//Define the user roles
	public function accessRules()
	{
		if(isset(Yii::app()->user->id)){
			$userid=Yii::app()->user->id;
		}
		else{
			$userid=0;
		}
		return array(
			array('allow',
				'actions'=>array('userProfile','ChangePassword','userComment','comment','GetRating','Rating','Blog','Reviews','Profile','editProfile','profileUpdate','upload','getImg','userLogs','delete','frindSearch','AddFriend'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@'),
				
			),		
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	//Default Function will be index
	public function actionUserLogs()
	{
		$model	=	new UserLog;
		
		die;
	}
	
	public function actionIndex()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$school				=	 SchoolsProfileHasLogin::model()->findByAttributes(array('is_joined'=>1,'login_id'=>Yii::app()->user->userId));
		if($school	== null){
			$sId			=	'0,';
		}
		else{
			$sId			=	$school->schools_profile_id;
		}
		
		$schoolName			=	 SchoolsProfile::model()->findByPk($sId);
		$add				=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		
		$reviewCriteria		=	new CDbCriteria();
		$reviewCriteria->condition ='login_id='.Yii::app()->user->userId;
		$count				=	UserReviews::model()->count($reviewCriteria);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	8;
		$pages->applyLimit($reviewCriteria);
		$reviews				=	UserReviews::model()->findAll($reviewCriteria);
		$info				=  	UserProfiles::model()->findByAttributes(array('status'=>1,'login_id'=>Yii::app()->user->userId));
		$userLog			=	new CDbCriteria();
		$userLog->condition = 'login_id = :loginId';
		$userLog->params = array(':loginId'=>Yii::app()->user->userId);
		$Logcount				=	UserReviews::model()->count($userLog);
		$logPages			=	new CPagination($Logcount);
		$logPages->pageSize	=	10;
		$logPages->applyLimit($userLog);
		$log				=	UserLog::model()->findAll($userLog);
		$userSentReviews			=	new CDbCriteria();
		$userSentReviews->condition = 'user_profiles_id = :profileId';
		$userSentReviews->params = array(':profileId'=>Yii::app()->user->profileId);
		$ReviewsCounts			=	UserReviews::model()->count($userSentReviews);
		$ReviewsPages			=	new CPagination($ReviewsCounts);
		$ReviewsPages->pageSize	=	10;
		$ReviewsPages->applyLimit($userSentReviews);
		$userReviewlist				=	UserReviews::model()->findAll($userSentReviews);
		$criteria = new CDbCriteria;
		$criteria->condition = 'is_friends = :frnd and ( login_id = :lid OR user_profiles_id = :pid)';
		$criteria->params = array(':lid'=>Yii::app()->user->userId,':pid'=>Yii::app()->user->profileId,':frnd'=>'2');
		$friendList	=	UserProfilesHasLogin::model()->findAll($criteria);
		$count =	count($friendList);
		$profileIds = '';
		$loginIds = '';
		foreach($friendList as $friends){
			$profileIds	.=	$friends->user_profiles_id.',';
			$loginIds	.=	$friends->login_id.',';
		}
		$profileIds	=substr($profileIds, 0, -1);;
		$loginIds	=substr($loginIds, 0, -1);;
		
		$criteria1 = new CDbCriteria;
		$qterm		=	'';
		$baseCondidtion = 't.status = 1 ';
		$qterm	=(isset($_REQUEST['term']))?'%'.$_REQUEST['term'].'%':'%%';
		$criteria1->condition = '(id IN ('.$profileIds.') OR login_id IN ('.$loginIds.') ) AND (first_name  Like :qterm OR last_name  Like :qterm) AND (login_id NOT IN ('.Yii::app()->user->userId.') OR id NOT IN ('.Yii::app()->user->profileId.'))';
		$criteria1->params = array(':qterm'=>$qterm);
		$criteria2= (!isset($criteria1))?$criteria1:'';
		$models	=	 UserProfiles::model()->findAll($criteria2);
		
		if(isset($_REQUEST['search'])){
			$qterm	=	'%'.$_REQUEST['search'].'%';
			
			$models	=	 UserProfiles::model()->findAll( array('condition'=>'first_name AND last_name Like :qterm', 
			'params'=>array(':qterm'=>$qterm)));
		}
		if(!empty($criteria2)){
		$dataProvider=new CActiveDataProvider('UserProfiles', array(
								'criteria'=>$criteria2,
								'pagination'=>array(
									'pageSize'=>10,
								),
							));
		}
		$dataProvider=new CActiveDataProvider('UserProfiles', array(
										'criteria'=>array(
										 'join'=>'join user_profiles on user_profiles.image = t.id',
									   'condition'=>$baseCondidtion,
									   
										   ),
										'pagination'=>array(
											'pageSize'=>10,
										),
									));
		$this->render('userProfile',array('info'=>$info,'log'=>$log,'add'=>$add,'schoolName'=>$schoolName,
					'fech_result'=>$dataProvider,'pages'=>$pages,'reviews'=>$reviews,'count'=>$count,
					'logPages'=>$logPages,'userReviewlist'=>$userReviewlist,'ReviewsPages'=>$ReviewsPages));
	}	
	
	public function actionEditProfile()
	{	
		if(!Yii::app()->user->id){
			$this->redirect(Yii::app()->createUrl('/site/'));
		}
		$sechools	=	new  SchoolsProfile;
		$model		=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		if(isset($_POST['UserProfiles']))
		{
			$model->attributes		=	$_POST['UserProfiles'];
			$model->register_date	=	date('Y-m-d H:i:s');
				if($model->save()){
					$log					=	new UserLog;
					$log->name				=	Yii::app()->user->userName;
					$log->description		=	'Your have updated your profile.';
					$log->login_id			=	Yii::app()->user->userId; 
					$log->image				=	''.Yii::app()->baseUrl.'/uploads/users/thumb/'.$model->image;
					$log->add_date			=	date('Y:m:d H:i:s');
					if($log->save()){
					 
						
					}
					 
				}
				 
		}
		$reviewCriteria			=	new CDbCriteria();
		$reviewCriteria->condition ='login_id='.Yii::app()->user->userId;
		$count				=	UserReviews::model()->count($reviewCriteria);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	8;
		$pages->applyLimit($reviewCriteria);
		$reviews				=	UserReviews::model()->findAll($reviewCriteria);
		$info		=  	UserProfiles::model()->findByAttributes(array('status'=>1,'login_id'=>Yii::app()->user->userId));
		$log		=	 UserLog::model()->findAllByAttributes(array('published'=>1,'login_id'=>Yii::app()->user->userId));
		$criteria = new CDbCriteria;
		$criteria->condition = 'is_friends = :frnd and ( login_id = :lid OR user_profiles_id = :pid)';
		$criteria->params = array(':lid'=>Yii::app()->user->userId,':pid'=>Yii::app()->user->profileId,':frnd'=>'2');
		$friendList	=	UserProfilesHasLogin::model()->findAll($criteria);
		$count =	count($friendList);
		$profileIds = '';
		$loginIds = '';
		foreach($friendList as $friends){
			$profileIds	.=	$friends->user_profiles_id.',';
			$loginIds	.=	$friends->login_id.',';
		}
		$profileIds	=substr($profileIds, 0, -1);;
		$loginIds	=substr($loginIds, 0, -1);;
		
		$criteria1 = new CDbCriteria;
		$qterm		=	'';
		$baseCondidtion = 't.status = 1 ';
		$qterm	=(isset($_REQUEST['term']))?'%'.$_REQUEST['term'].'%':'%%';
		$criteria1->condition = '(id IN ('.$profileIds.') OR login_id IN ('.$loginIds.') ) AND (first_name  Like :qterm OR last_name  Like :qterm) AND (login_id NOT IN ('.Yii::app()->user->userId.') OR id NOT IN ('.Yii::app()->user->profileId.'))';
		$criteria1->params = array(':qterm'=>$qterm);
		$criteria2= (!isset($criteria1))?$criteria1:'';
		$models	=	 UserProfiles::model()->findAll($criteria2);
		
		if(isset($_REQUEST['search'])){
			$qterm	=	'%'.$_REQUEST['search'].'%';
			
			$models	=	 UserProfiles::model()->findAll( array('condition'=>'first_name AND last_name Like :qterm', 
			'params'=>array(':qterm'=>$qterm)));
		}
		if(!empty($criteria2)){
		$dataProvider=new CActiveDataProvider('UserProfiles', array(
								'criteria'=>$criteria2,
								'pagination'=>array(
									'pageSize'=>10,
								),
							));
		}
		$dataProvider=new CActiveDataProvider('UserProfiles', array(
										'criteria'=>array(
										 'join'=>'join user_profiles on user_profiles.image = t.id',
									   'condition'=>$baseCondidtion,
									   
										   ),
										'pagination'=>array(
											'pageSize'=>10,
										),
									));

	 
	$log		=	 UserLog::model()->findAllByAttributes(array('published'=>1,'login_id'=>Yii::app()->user->userId));
	$school		=	 SchoolsProfileHasLogin::model()->findByAttributes(array('is_joined'=>1,'login_id'=>Yii::app()->user->userId));
	if($school	== null){
		$sId	=	'0,';
	}
	else{
		$sId	=	$school->schools_profile_id;
	}
	
	$schoolName	=	 SchoolsProfile::model()->findByPk($sId);
	$add		=	Advertisements::model()->findAllByAttributes(array('advertise_categories_id'=>1,'status'=>1,'published'=>1));
		
		
		$this->render('editProfile1',array('info'=>$model,'sechools'=>$sechools,'schoolName'=>$schoolName,'add'=>$add,'fech_result'=>$dataProvider,'log'=>$log,'count'=>$count));
	}		
	
	public function actionUpload()
	{
		$img			=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$oldImg			=	$img->image;
		
		$targetFolder1	=	Yii::app()->baseUrl.'/uploads/users/thumb/'.$img->image.'';
		//@unlink($targetFolder1);
		//$path	=	Yii::app()->baseUrl.'/uploads/users/';
		Yii::import("ext.EAjaxUpload.qqFileUploader");
		$folder='uploads/users/';// folder for uploaded files
        $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
        $minSizeLimit = 0 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, $minSizeLimit);
        $result = $uploader->handleUpload($folder);
        //$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        $fileSize=filesize($folder.$result['filename']);
        $fileName=$result['filename'];//GETTING FILE NAME\

		
		
		$targetFolder = Yii::app()->request->baseUrl.'/uploads/users/';
		$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/users/';
		
		$tempFile = $result['filename'];
		$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
		$targetFile = $targetPath.'/'.$result['filename'];
		$pat = $targetFile;
						//move_uploaded_file($tempFile,$targetFile);
		$absoPath = $pat;
						
		$newName = time();
		$img = Yii::app()->imagemod->load($pat);
		# ORIGINAL
		$img->file_max_size = 5000000; // 5 MB
		$img->file_new_name_body = $newName;
		$img->process('uploads/users/original/');
		$img->processed;
		#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
		if ($img->processed) {
			#THUMB Image
			$img->image_resize      = true;
			$img->image_x         	= 850;
			$img->image_y           = 530;
			$img->file_new_name_body = $newName;
			$img->process('uploads/users/large/');
			
			#STHUMB Image
			$img->image_resize      = true;
			$img->image_x         	= 270;
			$img->image_y           = 155;
			$img->file_new_name_body = $newName;
			$img->process('uploads/users/thumb/');
		
			$fileName	=	$img->file_dst_name;
			$img->clean();
		
		}
		if($oldImg!=''){
			@unlink($targetFolder1.'original/'.$oldImg);
			@unlink($targetFolder1.'large/'.$oldImg);
			@unlink($targetFolder1.'thumb/'.$oldImg);
		}
		
		
		$model			=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$model->image	=	$fileName;
		if($model->save()){
			$log					=	new UserLog;
			$log->name				=	Yii::app()->user->userName;
			$log->description		=	'UPDATED user profile picture';
			$log->image				=	Yii::app()->baseUrl.'/uploads/users/thumb/'.$fileName;
			$log->login_id			=	Yii::app()->user->userId;
			$log->add_date			=	date('Y:m:d H:i:s');
			if($log->save()){
				Yii::app()->user->setFlash('image','Your have changed your profile image');
			}
			$result['success']	=	true;
			$result['filename']	=	$fileName;
			
			$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
			echo $return;
		}
	}
     
	public function actionDelete($id,$action)
	{ 	
		if($action=='log'){
			
			$data	=	UserLog::model()->findByPk($id);
			$data->delete();
			$list	=	UserLog::model()->findAllByAttributes(array('login_id'=>Yii::app()->user->userId));
			  $html	=	'';
			foreach($list as $list){
			 $html	.='<li>'.CHtml::link($list->description,array('/user')).'
						<div class="notificatio-delete del-noti'.$list->id.'" id="'.Yii::app()->createUrl('/user/delete',array('id'=>$list->id,'action'=>'log')).'">X</div>
						</li>
						<script src="'.Yii::app()->theme->baseUrl.'/js/delete.js"></script>
	 				
						';
			}
			 
			 
				echo $html;
				die;				
		}	
		if($action=='recent'){
			 
			UserLog::model()->deleteAllByAttributes(array('id'=>$id));
		   	
				$model	=	 UserLog::model()->findAllByAttributes(array('published'=>1,'login_id'=>Yii::app()->user->userId));
				$fList	=	'';
			foreach($model as $list){
					$fList	.='	<div class="list-group-item">
									'. CHtml::link('<img src="'.$list->image.'"/>','#',array('class'=>'fl imgsize')).'
								  <span class="list-group-item-heading">'.$list->name.'</span>
									<p class="list-group-item-text">
										'.$list->description.'
									</p>
									<div class="delete-box r-del-bt"><span class="recent-bot-delete delete-link'.$list->id.' icon-remove" id="'.Yii::app()->createUrl('/user/delete
									',array('id'=>$list->id,'action'=>'recent')).'"></span>

									</div>
							</div>
							<script type="text/javascript">
							$(document).ready(function(){
									$(".delete-link'.$list->id.'").click(function(){
										$url	=	this.id;
										$.ajax({		 
											type:"post",
											url: $url,
											data: "fList",
											success:function(data){
													$("scroll-style").html(data);
													 
											}
										});
									});	
								
							});
							
						</script>
							
							';
			}
				
				echo $fList;
				die;	
				
			 	
		}
 		
	}	
	
	public function actionAddFriend($id,$action)
	{
		if($action=='friends'){
				$user						=	UserProfiles::model()->findByPk($id);
				$friend						=	new	UserProfilesHasLogin;
				$friend->user_profiles_id	=	$user->id;
				$friend->login_id			=	Yii::app()->user->userId;
				$friend->is_friends			=	1;
		 		 
			if($friend->save()){
				$response	=	'ok';
				echo CJSON::encode($response);
				die;
			}
		}	 
		if($action=='render'){
			
				$fList	='';
				$model	=	 UserLog::model()->findAllByAttributes(array('published'=>1,'login_id'=>Yii::app()->user->userId));
				$fList	=	'<ul>';
			foreach($model as $list){
					$fList	.='	<li>
									<div class="box">
											'.CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/users/thumb/'.$list->image.'"/>',array('/user/'),array('class'=>'fl')).'
											<div class="fr">
												'. CHtml::link('<h3>'.$list->name.'</h3>',array('/user/')).'
												
												<span>'.CHtml::link('4 mutual friends',array('/user/')).'</span>
												<p class="add-fr">'.CHtml::link('add friend',array('/user/')).'</p>
											</div>
												<div class="delete-box"><span class="recent-bot-delete" id="'.Yii::app()->createUrl('/user/delete
													',array('id'=>$list->id,'action'=>'recent')).'">X</span>

												</div>
										</div>
									</li>';
			}
				$fList	.='</ul>';
				echo $fList;
				die;	
				
			 
		}
 		
	}	
 
	public function actionReviews()
	{	
		$model	=	new 	UserReviews;
		if(isset($_REQUEST['UserReviews']))
		{	
			$model->attributes				=	$_POST['UserReviews'];
			$model->login_id				=	Yii::app()->user->userId;
			$model->schools_profile_id		=	$_POST['SchoolsProfile']['id'];
			$model->user_profiles_id		=	Yii::app()->user->profileId;
			$model->add_date				=	date('Y:m:d') ;
			if($model->save()){
				$findId						=	SchoolsProfile::model()->findByPk($model->schools_profile_id);
				$count						=	$findId->reviews;
				$findId->reviews			=	$count+1 ;
				$findId->phone				=	1;
				$findId->term_conditions	=	1;
				$findId->password			=	1;
				
				if($findId->save()){
					$userReview				=	UserProfiles::model()->findByAttributes(array('login_id'=>Yii::app()->user->userId));
					$recviewCount			=	$userReview->reviews;
					$userReview->reviews	=	$recviewCount+1 ;
					if($userReview->save()){
						$userLog				=	new UserLog;
						/*$rating					=	Rating::model()->findByAttributes(array('status'=>1,'published'=>1,'schools_profile_id'=>$model->schools_profile_id));
						if(!empty($rating)){
							$rate	=	$rating->title;
							if($rate==0){
								$ratingColor	=0;
							}
							if($rate==1.0 or 1.5){
								$ratingColor	=2;
							}
							if($rate==2.0 or 2.5){
								$ratingColor	=3;
							}
							if($rate==3.0 or 3.5){
								$ratingColor	=6;
							}
							if($rate==4.0 or 4.5){
								$ratingColor	=8;
							}
							if($rate==5.0 or 5.5){
								$ratingColor	=9;
							}
						}*/
						$userLog->login_id		=	Yii::app()->user->userId;
						$userLog->add_date		=	date('Y:m:d H:i:s');
						$userLog->published		=	1;
						$userLog->description =	'<div class="fl"><span class="glyphicon glyphicon-pencil"><strong> Reviewed</strong></span> '.CHtml::link($findId->name,array('/site/schoolProfile','id'=>$model->schools_profile_id)).' and it </div><div class="small-rating level-9">Reviewed</div>';
						if($userLog->save()){
							$this->redirect(Yii::app()->createUrl('/site/schoolProfile&id='.$model->schools_profile_id));
							echo 'Hello';die;
						}
					}
					
				}
			}
				 
		}
		
	}
	
	public function actionComment()
	{	
		$comment	=	new Comment;
		if(!empty($_REQUEST['Comment']))
		{	
			$comment->attributes		=	$_POST['Comment'];
			$comment->add_date			=	date('Y-m-d');
			$comment->add_time 			=	date('H:s:i');
			$comment->user_reviews_id	=	$_POST['Comment']['rid'];
			$comment->user_profiles_id	=	Yii::app()->user->profileId;
			if($comment->save()){
				$reviewUser				=	$_POST['Comment']['rName'];
				$schoolAdd				=	$_POST['Comment']['rAddress'];
				$reviewUserId			=	$_POST['Comment']['ruserId'];
				$schoolName				=	$_POST['Comment']['sName'];
				$reviewId				=	$_POST['Comment']['rid'];
				$userLog				=	new UserLog;
				$userLog->name 			=	'';
				$userLog->add_date 		=	date('Y:m:d H:s:i');
				$userLog->alias			=	$schoolAdd;
				$userLog->login_id 		=	Yii::app()->user->userId;
				$userLog->description	=	'<span class="glyphicon glyphicon-comment"></span><div class="rss-bot"><strong>Commented</strong> on '.CHtml::link($reviewUser,array('/site/profile','id'=>$reviewUserId)).' s review for '.CHtml::link($schoolName,array('/site/review','id'=>$reviewId)).'</div>';
				if($userLog->save()){	
					$id	=	$_POST['Comment']['sid'];
					$this->redirect(Yii::app()->createUrl('/site/schoolProfile&id='.$id));
		
				}
				
			}
		
		}
					$id	=	$_POST['Comment']['sid'];
					$this->redirect(Yii::app()->createUrl('/site/schoolProfile&id='.$id));
		
		
		
	}	
	
	public function actionUserComment()
	{	
		$comment	=	new Comment;
		if(!empty($_REQUEST['Comment']))
		{	
			$comment->attributes		=	$_POST['Comment'];
			$comment->add_date			=	date('Y-m-d');
			$comment->add_time 			=	date('H:s:i');
			$comment->user_reviews_id	=	$_POST['Comment']['rid'];
			$comment->user_profiles_id	=	Yii::app()->user->profileId;
			if($comment->save()){
				$reviewUser				=	$_POST['Comment']['rName'];
				$schoolAdd				=	$_POST['Comment']['rAddress'];
				$reviewUserId			=	$_POST['Comment']['ruserId'];
				$schoolName				=	$_POST['Comment']['sName'];
				$reviewId				=	$_POST['Comment']['rid'];
				$userLog				=	new UserLog;
				$userLog->name 			=	'';
				$userLog->add_date 		=	date('Y:m:d H:s:i');
				$userLog->alias			=	$schoolAdd;
				$userLog->login_id 		=	Yii::app()->user->userId;
				$userLog->description	=	'<span class="glyphicon glyphicon-comment"></span><div class="rss-bot"><strong>Commented</strong> on '.CHtml::link($reviewUser,array('/site/profile','id'=>$reviewUserId)).' s review for '.CHtml::link($schoolName,array('/site/review','id'=>$reviewId)).'</div>';
				if($userLog->save()){	
					$this->redirect(Yii::app()->createUrl('/user'));
		
				}
				
			}
		
		}
			$this->redirect(Yii::app()->createUrl('/user'));
		
	}	
	
	public function actionBlog()
	{	
		$blog	=	new Blog;
		if(isset($_REQUEST['Blog']))
		{	
			$blog->attributes			=	$_POST['Blog'];
			$blog->add_date				=	date('Y-m-d H:i:s');
			$blog->login_id				=	Yii::app()->user->userId;
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
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 117;
					$img->image_x           = 173;
					$img->file_new_name_body = $newName;
					$img->process('uploads/blog/sthumb/');
					
					$img->image_resize      = true;
					$img->image_y         	= 500;
					$img->image_x           = 900;
					$img->file_new_name_body = $newName;
					$img->process('uploads/blog/large/');
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$blog->image	=	$fileName;
			}
			if($blog->save()){
				$school					=	$_POST['Blog']['sName'];
				$schoolAdd				=	$_POST['Blog']['sAddress'];
				$schoolImg				=	$_POST['Blog']['simg'];
				$userLog				=	new UserLog;
				$userLog->name 			=	$school;
				$userLog->alias			=	$schoolAdd;
				$userLog->image 		=	''.Yii::app()->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$schoolImg;
				$userLog->login_id 		=	Yii::app()->user->userId;
				$userLog->description	=	'You have added new image in blog of';
				if($userLog->save()){	
					$id	=	$_POST['Blog']['sid'];
					$this->redirect(Yii::app()->createUrl('/site/schoolProfile&id='.$id));
				}	
			}
		
		}
					$id	=	$_POST['Blog']['sid'];
					$this->redirect(Yii::app()->createUrl('/site/schoolProfile&id='.$id));
	}
	
	public function actionRating($id)
	{
		$getRate	=	$_REQUEST['rating'];
		 $userRating=	$getRate/2;
		
		
		$rating	=	Rating::model()->findByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId,'schools_profile_id'=>$id));
		if(empty($rating))
			$rating						=	new Rating;
		$rating->title					=	$userRating;
		$rating->user_profiles_id		=	Yii::app()->user->profileId;
		$rating->login_id				=	Yii::app()->user->userId;
		$rating->schools_profile_id		=	$id;		
		if($rating->save()){
			$schoolRating					=	Rating::model()->findByAttributes(array('schools_profile_id'=>$rating->schools_profile_id,'status'=>1,'published'=>1));
			$rate	=	$schoolRating->title;

			if($rate==1 or 1.5){
				$ratingColor	=2;
			}
			if($rate==2 or 2.5){
				$ratingColor	=3;
			}
			if($rate==3 or 3.5){
				$ratingColor	=6;
			}
			if($rate==4 or 4.5){
				$ratingColor	=8;
			}
			if($rate==5){
				$ratingColor	=9;
			}
			
			$userLog				=	new	UserLog;
			$userLog->login_id		=	Yii::app()->user->userId;
			$userLog->add_date		=	date('Y:m:d H:i:s');
			$userLog->published		=	1;
			$userLog->description 	=	'<span class="glyphicon glyphicon-star glyphicon "><strong>Rated</strong></span><div class="clear"></div><div class="res-thumb fl">'.CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$schoolRating->schoolsProfile->logo.'" alt="'.$schoolRating->schoolsProfile->name.'"/>',array('/site/schoolProfile','id'=>$schoolRating->schoolsProfile->id)).'</div><div class="rss-link">'.CHtml::link($schoolRating->schoolsProfile->name,array('/site/schoolProfile','id'=>$schoolRating->schoolsProfile->id)).'<br/><span class="rss-city">'.$schoolRating->schoolsProfile->cities->name.'</span></div><div class="fr small-rating level-'.$ratingColor.'">'.$schoolRating->title.'</div>';
			if($userLog->save()){	
				$response	=array('status'=>'Yes','message'=>'Your rating for this profile successfully saved.');
				echo json_encode($response);die;
			}
			else{
				$response	=array('status'=>'NO','message'=>'Your rating was not saved in user log.');
				echo json_encode($response);die;
			}
			
		}
		else{
			CVarDumper::dump($rating,10,1);die;
			$response	=array('status'=>'NO','message'=>'Your rating was not saved.');
			echo json_encode($response);die;
		}
		
	}	
	
	public function actionGetRating($id)
	{
		 	$result			=	 Rating::model()->findByAttributes(array('schools_profile_id'=>$id));
			$rate	=	array('Urating'=>$result->title);
			echo json_encode($rate);
			return;
	
		
	}
	
	public function actionChangePassword()
	{
		$id			=	Yii::app()->user->userId;
		$userInf	=	UserProfiles::model()->findByAttributes(array('id'=>Yii::app()->user->profileId));
		$model		=	new Changepassword();
		if(isset($_POST['Changepassword'])){
			$model->attributes = $_POST['Changepassword'];
			if($model->validate()){
				
				// Change the posted password to md5 hash to cmpare it with database
				$hashed_password = md5($_POST['Changepassword']['oldpassword']);
				// Searches for the record in the database for the posted password 
				$data = Login::model()->findByAttributes(array('password'=>$hashed_password),'id="'.$id.'"');
			
				if(!empty($data)){
				
					//New Password posted through form
					$posted_new_password = md5($_POST['Changepassword']['newpassword']);
					$new_password = $posted_new_password;
					Login::model()->updateAll(array('password'=>$new_password),'id="'.$id.'"');
					$userLog				=	new UserLog;
					$userLog->name 			=	Yii::app()->user->userName;
					$userLog->alias			=	'';
					$userLog->image 		=	''.Yii::app()->baseUrl.'/uploads/users/thumb/'.$userInf->image;
					$userLog->login_id 		=	Yii::app()->user->userId;
					$userLog->description	=	'You have successfully changed your password thank you.';
					if($userLog->save()){	
						Yii::app()->user->setFlash('success',"Password changed successfully!");
						$this->redirect(Yii::app()->createUrl('/user/editProfile'));
					}	
					
				}
				else{
					
					Yii::app()->user->setFlash('error',"Password provided by you does not exist.Please provide the correct password");
					$this->redirect(Yii::app()->createUrl('/user/editProfile'));
				}
			} //validate ends
		} //isset ends
		$this->redirect(Yii::app()->createUrl('/user/editProfile'));
	}
	
}
?>
