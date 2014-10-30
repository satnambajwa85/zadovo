<?php

/**
 * This is the model class for table "user_profiles".
 *
 * The followings are the available columns in table 'user_profiles':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $date_of_birth
 * @property string $gender
 * @property string $address
 * @property string $image
 * @property string $postcode
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property string $profile_info
 * @property string $add_date
 * @property string $register_date
 * @property integer $send_mail
 * @property integer $status
 * @property string $recent_activity
 * @property string $favourites
 * @property integer $work
 * @property string $website
 * @property integer $dislike
 * @property integer $school_status
 * @property integer $likes
 * @property integer $follower
 * @property integer $reviews
 * @property integer $login_id
 * @property integer $states_id
 * @property integer $cities_id
 *
 * The followings are the available model relations:
 * @property Cities $cities
 * @property States $states
 * @property Login $login
 * @property Login[] $logins
 * @property UserReviews[] $userReviews
 */
class UserProfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfiles the static model class
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
		return 'user_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email, date_of_birth, login_id, states_id, cities_id', 'required'),
			array('send_mail, status, work, dislike, school_status, likes, follower, reviews, login_id, states_id, cities_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, website', 'length', 'max'=>100),
			array('gender, image, telephone, fax', 'length', 'max'=>45),
			array('address', 'length', 'max'=>255),
			array('postcode', 'length', 'max'=>15),
			array('mobile', 'length', 'max'=>10),
			array('favourites', 'length', 'max'=>500),
			array('profile_info, add_date, register_date, recent_activity', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, date_of_birth, gender, address, image, postcode, telephone, mobile, fax, profile_info, add_date, register_date, send_mail, status, recent_activity, favourites, work, website, dislike, school_status, likes, follower, reviews, login_id, states_id, cities_id', 'safe', 'on'=>'search'),
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
			'states' => array(self::BELONGS_TO, 'States', 'states_id'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'user_profiles_id'),
			'login' => array(self::BELONGS_TO, 'Login', 'login_id'),
			'logins' => array(self::MANY_MANY, 'Login', 'user_profiles_has_login(user_profiles_id, login_id)'),
			'userReviews' => array(self::HAS_MANY, 'UserReviews', 'user_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'date_of_birth' => 'Date Of Birth',
			'gender' => 'Gender',
			'address' => 'Address',
			'image' => 'Image',
			'postcode' => 'Postcode',
			'telephone' => 'Telephone',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'profile_info' => 'Profile Info',
			'add_date' => 'Add Date',
			'register_date' => 'Register Date',
			'send_mail' => 'Send Mail',
			'status' => 'Status',
			'recent_activity' => 'Recent Activity',
			'favourites' => 'Favourites',
			'work' => 'Work',
			'website' => 'Website',
			'dislike' => 'Dislike',
			'school_status' => 'School Status',
			'likes' => 'Likes',
			'follower' => 'Follower',
			'reviews' => 'Reviews',
			'login_id' => 'Login',
			'states_id' => 'States',
			'cities_id' => 'Cities',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('profile_info',$this->profile_info,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('register_date',$this->register_date,true);
		$criteria->compare('send_mail',$this->send_mail);
		$criteria->compare('status',$this->status);
		$criteria->compare('recent_activity',$this->recent_activity,true);
		$criteria->compare('favourites',$this->favourites,true);
		$criteria->compare('work',$this->work);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('dislike',$this->dislike);
		$criteria->compare('school_status',$this->school_status);
		$criteria->compare('likes',$this->likes);
		$criteria->compare('follower',$this->follower);
		$criteria->compare('reviews',$this->reviews);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('states_id',$this->states_id);
		$criteria->compare('cities_id',$this->cities_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}