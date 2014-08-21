 <?php
 
class loginProvider  extends CWidget{
 
    public static function actions(){
        return array(
                   'GetLogin'=>'application.components.actions.getLogin',
        );
    }
 
    public function run(){
 
        $this->renderContent();
 
    }
 
    protected function renderContent(){
 

 if(Yii::app()->user->isGuest){
            echo CHtml::link('Login', array('/site/login.GetLogin'));
  
     $this->getController()->renderPartial('application.components.views.login',array('model'=>new LoginForm)); 
 }
 else      
     echo CHtml::link('Logout ('.Yii::app()->user->name.')', array('site/logout'), array('visible'=>!Yii::app()->user->isGuest));
 echo '</span>';
   }
 
}