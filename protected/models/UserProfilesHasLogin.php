<?php

/**
 * This is the model class for table "user_profiles_has_login".
 *
 * The followings are the available columns in table 'user_profiles_has_login':
 * @property integer $user_profiles_id
 * @property integer $login_id
 * @property integer $is_follower
 * @property integer $is_like
 */
class UserProfilesHasLogin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfilesHasLogin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profiles_has_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, login_id', 'required'),
			array('user_profiles_id, login_id, is_follower, is_like', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_profiles_id, login_id, is_follower, is_like', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_profiles_id' => 'User Profiles',
			'login_id' => 'Login',
			'is_follower' => 'Is Follower',
			'is_like' => 'Is Like',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('is_follower',$this->is_follower);
		$criteria->compare('is_like',$this->is_like);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}