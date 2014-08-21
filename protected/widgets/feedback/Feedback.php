<?php
 
class Feedback extends CWidget{

  public $visible=true;
 
   public function init()
   {
       if($this->visible)
       {

       }
   }

    public function run()
	{
       if($this->visible){
           $this->renderContent();
		}
	}  
    
    protected function renderContent()
	{	
 
	 $model		=	new ContactForm;
		$this->render('feedback',array('model'=>$model));
	}  
}
  