<?php
class WidgetSlider extends CWidget
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
	 	$data	=	Sliders::model()->findAllByAttributes(array('status'=>1));	
		$this->render('widgetSlider',array('slides'=>$data));
	}  

}