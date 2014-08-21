 <?php
 
class getLogIn extends CAction{
 
      public function run() {
            if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
    throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
 
     $model=new Register;
 
     if (Yii::app()->request->isAjaxRequest){ 
           if (isset($_POST['Register'])) {  
          $model->attributes=$_POST['Register'];
 
          if ($model->validate() && $model->login()){
                $array = array("Register" => "success");
                              Yii::app()->user->setFlash("success", "Successfully logged in.");
                              $json = json_encode($array);
                              echo $json;
			
				 
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