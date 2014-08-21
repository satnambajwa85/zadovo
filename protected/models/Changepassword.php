<?php
class Changepassword extends CFormModel
{
    
    public $oldpassword;  
    public $newpassword;
    public $confirmpassword;  
   
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('oldpassword', 'required','message' => 'Please enter old password.'), 
            array('newpassword', 'required','message' => 'Please enter new password.'), 
            array('confirmpassword', 'required','message' => 'Please confirm new password.'), 
            array('newpassword', 'compare', 'compareAttribute'=>'confirmpassword'), 
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'oldpassword'=>'Old Password',
            'newpassword'=>'New Password', 
            'confirmpassword'=>'Confirm Password', 
           );
    }
    
}//ends class

