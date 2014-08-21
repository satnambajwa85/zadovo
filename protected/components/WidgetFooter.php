<?php
class WidgetFooter extends CWidget
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
	 	$totalUser			=	Login::model()->countByAttributes(array('activation'=>1,'status'=>1));
	 	$totalUserOnline	=	Login::model()->countByAttributes(array('activation'=>1,'status'=>1,'login_status'=>1));
	 	$totalSechool		=	SchoolsProfile::model()->countByAttributes(array('activation'=>1,'status'=>1));
	 	$menu				=	Cms::model()->findAllByAttributes(array('status'=>1,'activation'=>1,'position'=>array('001','101','011')));
	 	$AfterLoginMenu		=	Cms::model()->findAllByAttributes(array('status'=>1,'activation'=>1,'position'=>array('120')));
		//CVarDumper::dump($menu,10,1);die;
		$this->render('widgetFooter',array('menu'=>$menu,'totalUser'=>$totalUser,'totalSechool'=>$totalSechool,'totalUserOnline'=>$totalUserOnline,'AfterLoginMenu'=>$AfterLoginMenu));
	}  

} 	
 