<?php

/**
 * This is the model class for table "schools_profile_has_login".
 *
 * The followings are the available columns in table 'schools_profile_has_login':
 * @property integer $schools_profile_id
 * @property integer $login_id
 * @property integer $is_joined
 * @property integer $is_like
 * @property integer $is_want_to_join
 */
class SchoolsProfileHasLogin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SchoolsProfileHasLogin the static model class
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
		return 'schools_profile_has_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schools_profile_id, login_id', 'required'),
			array('schools_profile_id, login_id, is_joined, is_like, is_want_to_join', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('schools_profile_id, login_id, is_joined, is_like, is_want_to_join', 'safe', 'on'=>'search'),
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
			'schools_profile_id' => 'Schools Profile',
			'login_id' => 'Login',
			'is_joined' => 'Is Joined',
			'is_like' => 'Is Like',
			'is_want_to_join' => 'Is Want To Join',
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

		$criteria->compare('schools_profile_id',$this->schools_profile_id);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('is_joined',$this->is_joined);
		$criteria->compare('is_like',$this->is_like);
		$criteria->compare('is_want_to_join',$this->is_want_to_join);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}