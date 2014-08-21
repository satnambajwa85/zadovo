 <?php
 
class getLogIn extends CAction{
 
      public function run() {
            if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
    throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
 
     $model=new LoginForm;
 
     if (Yii::app()->request->isAjaxRequest){ 
           if (isset($_POST['LoginForm'])) {  
          $model->attributes=$_POST['LoginForm'];
 
          if ($model->validate() && $model->login()){
                $array = array("login" => "success");
                              Yii::app()->user->setFlash("success", "Successfully logged in.");
                              $json = json_encode($array);
                              echo $json;
			
			$this->ownredirect(Yii::app()->createUrl('/admin/admin'));	
			$this->refreash();
         Yii::app()->end();
		 
   }
   else{
         echo CActiveForm::validate($model);
                              Yii::app()->end();
          }
           } //POST
 
            }
      } 
 
}