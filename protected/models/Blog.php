<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $add_date
 * @property integer $status
 * @property integer $published
 * @property integer $schools_profile_id
 * @property integer $user_profiles_id
 * @property integer $login_id
 *
 * The followings are the available model relations:
 * @property Login $login
 * @property SchoolsProfile $schoolsProfile
 * @property UserProfiles $userProfiles
 */
class Blog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	 public $sid,$sName,$simg,$sAddress;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, schools_profile_id, user_profiles_id, login_id', 'required'),
			array('status, published, schools_profile_id, user_profiles_id, login_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('image', 'length', 'max'=>100),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, image, add_date, status, published, schools_profile_id, user_profiles_id, login_id', 'safe', 'on'=>'search'),
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
			'description' => 'Description',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'published' => 'Published',
			'schools_profile_id' => 'Schools Profile',
			'user_profiles_id' => 'User Profiles',
			'login_id' => 'Login',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published);
		$criteria->compare('schools_profile_id',$this->schools_profile_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('login_id',$this->login_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}