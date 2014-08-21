<?php
class WidgetTopMenu extends CWidget
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
 
	 $menu	=	Cms::model()->findAllByAttributes(array('status'=>1,'activation'=>1,'position'=>array('100','110','101')));
		$this->render('widgetTopMenu',array('menu'=>$menu));
	}  

} 	
 