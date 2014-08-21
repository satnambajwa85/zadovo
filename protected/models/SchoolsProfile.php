<?php
class SchoolsProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SchoolsProfile the static model class
	 */
	public $term_conditions,$school_name,$school_address,$uname,$uemail,$phone,$uwebsite;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
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
			array('logo, about_school, telephone, email, website, cities_id, login_id, memberships_id', 'required'),
			array('likes, follower, want_to_join, reviews, activation, status, login_id, memberships_id', 'numerical', 'integerOnly'=>true),
			array('name, email, website, cities_id', 'length', 'max'=>100),
			array('term_conditions', 'required', 'requiredValue' => 1, 'message' => 'Please check tearm and condition'),
			array('logo, address2', 'length', 'max'=>45),
			array('email', 'email','message'=>"The email isn't correct"),
			array('email','unique', 'message'=>'This email is already exists.'),
			array('telephone', 'length', 'max'=>12),
			array('website', 'match', 'pattern' => '/^[\a-zA-Z\n\r ]+$/u','message' => Yii::t('default', 'Only alphabets are allowed!.')),
			array('website','unique', 'message'=>'This website link is already exists.'),
			array('address1', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('about_school',$this->about_school,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('cities_id',$this->cities_id,true);
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
}