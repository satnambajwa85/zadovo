<?php

/**
 * This is the model class for table "like_dislike_reviews".
 *
 * The followings are the available columns in table 'like_dislike_reviews':
 * @property integer $id
 * @property integer $is_like
 * @property integer $is_dislike
 * @property integer $user_profiles_id
 * @property integer $user_reviews_id
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property UserReviews $userReviews
 */
class LikeDislikeReviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LikeDislikeReviews the static model class
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
		return 'like_dislike_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_profiles_id, user_reviews_id', 'required'),
			array('is_like, is_dislike, user_profiles_id, user_reviews_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, is_like, is_dislike, user_profiles_id, user_reviews_id', 'safe', 'on'=>'search'),
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
			'userProfiles' => array(self::BELONGS_TO, 'UserProfiles', 'user_profiles_id'),
			'userReviews' => array(self::BELONGS_TO, 'UserReviews', 'user_reviews_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'is_like' => 'Is Like',
			'is_dislike' => 'Is Dislike',
			'user_profiles_id' => 'User Profiles',
			'user_reviews_id' => 'User Reviews',
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
		$criteria->compare('is_like',$this->is_like);
		$criteria->compare('is_dislike',$this->is_dislike);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);
		$criteria->compare('user_reviews_id',$this->user_reviews_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}