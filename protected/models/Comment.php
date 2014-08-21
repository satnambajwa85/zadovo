<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $comment
 * @property string $image
 * @property string $add_date
 * @property string $add_time
 * @property integer $status
 * @property integer $published
 * @property integer $user_reviews_id
 * @property integer $user_profiles_id
 *
 * The followings are the available model relations:
 * @property UserProfiles $userProfiles
 * @property UserReviews $userReviews
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	 public $rid,$sid,$rName,$ruserId,$rAddress,$sName;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment, add_date, user_reviews_id, user_profiles_id', 'required'),
			array('status, published, user_reviews_id, user_profiles_id', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>100),
			array('comment', 'length', 'min'=>50),
			array('add_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, comment, image, add_date, add_time, status, published, user_reviews_id, user_profiles_id', 'safe', 'on'=>'search'),
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
			'comment' => 'Comment',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'add_time' => 'Add Time',
			'status' => 'Status',
			'published' => 'Published',
			'user_reviews_id' => 'User Reviews',
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
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published);
		$criteria->compare('user_reviews_id',$this->user_reviews_id);
		$criteria->compare('user_profiles_id',$this->user_profiles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}