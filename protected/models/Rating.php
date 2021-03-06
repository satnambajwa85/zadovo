<?php

/**
 * This is the model class for table "rating".
 *
 * The followings are the available columns in table 'rating':
 * @property integer $id
 * @property string $title
 * @property integer $user_profiles_id
 * @property integer $schools_profile_id
 * @property integer $login_id
 * @property integer $status
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property Login $login
 * @property SchoolsProfile $schoolsProfile
 * @property UserProfiles $userProfiles
 */
class Rating extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rating the static model class
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
		return 'rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, user_profiles_id, schools_profile_id, login_id', 'required'),
			array('user_profiles_id, schools_profile_id, login_id, status, published', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, user_profiles_id, schools_profile_id, login_id, status, published', 'safe', 'on'=>'search'),
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
			'login' => array(self::BELONGS_TO, 'Login', 'login_id'),
			'schoolsProfile' => array(self::BELONGS_TO, 'SchoolsProfile', 'schools_profile_id'),
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'user_profiles_id' => 'User Profiles',
			'schools_profile_id' => 'Schools Profile',
			'login_id' => 'Login',
			'status' => 'Status',
			'published' => 'Published',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('schools_profile_id',$this->schools_profile_id);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}