<?php

/**
 * This is the model class for table "user_reviews".
 *
 * The followings are the available columns in table 'user_reviews':
 * @property integer $id
 * @property integer $like
 * @property integer $is_like
 * @property string $reviews
 * @property string $title
 * @property integer $dislike
 * @property integer $is_dislike
 * @property integer $order_by
 * @property string $add_date
 * @property integer $status
 * @property integer $login_id
 * @property integer $schools_profile_id
 * @property integer $user_profiles_id
 *
 * The followings are the available model relations:
 * @property Login $login
 * @property SchoolsProfile $schoolsProfile
 * @property UserProfiles $userProfiles
 */
class UserReviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserReviews the static model class
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
		return 'user_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reviews, login_id, schools_profile_id, user_profiles_id', 'required'),
			array('like, is_like, dislike, is_dislike, order_by, status, login_id, schools_profile_id, user_profiles_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, like, is_like, reviews, title, dislike, is_dislike, order_by, add_date, status, login_id, schools_profile_id, user_profiles_id', 'safe', 'on'=>'search'),
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
			'like' => 'Like',
			'is_like' => 'Is Like',
			'reviews' => 'Reviews',
			'title' => 'Title',
			'dislike' => 'Dislike',
			'is_dislike' => 'Is Dislike',
			'order_by' => 'Order By',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'login_id' => 'Login',
			'schools_profile_id' => 'Schools Profile',
			'user_profiles_id' => 'User Profiles',
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
		$criteria->compare('like',$this->like);
		$criteria->compare('is_like',$this->is_like);
		$criteria->compare('reviews',$this->reviews,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('dislike',$this->dislike);
		$criteria->compare('is_dislike',$this->is_dislike);
		$criteria->compare('order_by',$this->order_by);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('schools_profile_id',$this->schools_profile_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}