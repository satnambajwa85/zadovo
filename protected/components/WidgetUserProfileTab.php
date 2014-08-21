<?php
class WidgetUserProfileTab extends CWidget
{
   public $visible=true;
 
   public function init()
   {
       if($this->visible)
       {

       }
   }

   public function run()
   {
       if($this->visible)
       {
           $this->renderContent();
       }
   }  
   protected function renderContent()
   	{
	 	$userProfile	=	UserProfiles::model()->findByAttributes(array('status'=>1,'id'=>Yii::app()->user->profileId));
		
		$this->render('widgetUserProfileTab',array('userProfile'=>$userProfile));
	}  

} 	
 