<?php

/**
 * This is the model class for table "schools_profile".
 *
 * The followings are the available columns in table 'schools_profile':
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $about_school
 * @property string $telephone
 * @property string $email
 * @property string $website
 * @property integer $cities_id
 * @property string $address1
 * @property string $address2
 * @property integer $likes
 * @property integer $follower
 * @property integer $want_to_join
 * @property integer $reviews
 * @property integer $activation
 * @property integer $status
 * @property integer $login_id
 * @property integer $memberships_id
 *
 * The followings are the available model relations:
 * @property AddSchoolUsers[] $addSchoolUsers
 * @property Blog[] $blogs
 * @property Rating[] $ratings
 * @property Login $login
 * @property Memberships $memberships
 * @property Login[] $logins
 * @property UserReviews[] $userReviews
 */
class SchoolsProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $user_name;
	public $password;
	
	public function tableName()
	{
		return 'schools_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logo, about_school, telephone, email, website,password,user_name, cities_id, login_id, memberships_id', 'required'),
			array('cities_id, likes, follower, want_to_join, reviews, activation, status, login_id, memberships_id', 'numerical', 'integerOnly'=>true),
			array('name, email, website', 'length', 'max'=>100),
			array('logo, address2', 'length', 'max'=>45),
			array('telephone', 'length', 'max'=>12),
			array('address1', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, logo, about_school, telephone, email, website, cities_id, address1, address2, likes, follower, want_to_join, reviews, activation, status, login_id, memberships_id', 'safe', 'on'=>'search'),
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
			'addSchoolUsers' => array(self::HAS_MANY, 'AddSchoolUsers', 'schools_profile_id'),
			'blogs' => array(self::HAS_MANY, 'Blog', 'schools_profile_id'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'schools_profile_id'),
			'login' => array(self::BELONGS_TO, 'Login', 'login_id'),
			'memberships' => array(self::BELONGS_TO, 'Memberships', 'memberships_id'),
			'logins' => array(self::MANY_MANY, 'Login', 'schools_profile_has_login(schools_profile_id, login_id)'),
			'userReviews' => array(self::HAS_MANY, 'UserReviews', 'schools_profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'logo' => 'Logo',
			'about_school' => 'About School',
			'telephone' => 'Telephone',
			'email' => 'Email',
			'website' => 'Website',
			'cities_id' => 'Cities',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'likes' => 'Likes',
			'follower' => 'Follower',
			'want_to_join' => 'Want To Join',
			'reviews' => 'Reviews',
			'activation' => 'Activation',
			'status' => 'Status',
			'login_id' => 'Login',
			'memberships_id' => 'Memberships',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('about_school',$this->about_school,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('likes',$this->likes);
		$criteria->compare('follower',$this->follower);
		$criteria->compare('want_to_join',$this->want_to_join);
		$criteria->compare('reviews',$this->reviews);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('status',$this->status);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('memberships_id',$this->memberships_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SchoolsProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
