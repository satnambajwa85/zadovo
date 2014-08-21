<?php
class WidgetMenu extends CWidget
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
 
	 $menu	=	Cms::model()->findAllByAttributes(array('status'=>1,'activation'=>1,'position'=>array('010','110','011')));
		$this->render('widgetMenu',array('menu'=>$menu));
	}  

} 	
 