<?php

/**
 * This is the model class for table "advertisements".
 *
 * The followings are the available columns in table 'advertisements':
 * @property integer $id
 * @property string $website
 * @property string $phone_number
 * @property string $mobile_number
 * @property string $about_the_business
 * @property string $additional_info
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $link
 * @property string $add_date
 * @property integer $published
 * @property integer $status
 * @property integer $advertise_categories_id
 *
 * The followings are the available model relations:
 * @property AdvertiseCategories $advertiseCategories
 */
class Advertisements extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advertisements the static model class
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
		return 'advertisements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('website, phone_number, mobile_number, about_the_business, additional_info, title, image, link, advertise_categories_id', 'required'),
			array('published, status, advertise_categories_id', 'numerical', 'integerOnly'=>true),
			array('website, title', 'length', 'max'=>100),
			array('phone_number, mobile_number', 'length', 'max'=>20),
			array('image, link', 'length', 'max'=>45),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, website, phone_number, mobile_number, about_the_business, additional_info, title, image, description, link, add_date, published, status, advertise_categories_id', 'safe', 'on'=>'search'),
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
			'advertiseCategories' => array(self::BELONGS_TO, 'AdvertiseCategories', 'advertise_categories_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'website' => 'Website',
			'phone_number' => 'Phone Number',
			'mobile_number' => 'Mobile Number',
			'about_the_business' => 'About The Business',
			'additional_info' => 'Additional Info',
			'title' => 'Title',
			'image' => 'Image',
			'description' => 'Description',
			'link' => 'Link',
			'add_date' => 'Add Date',
			'published' => 'Published',
			'status' => 'Status',
			'advertise_categories_id' => 'Advertise Categories',
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
		$criteria->compare('website',$this->website,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('about_the_business',$this->about_the_business,true);
		$criteria->compare('additional_info',$this->additional_info,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('advertise_categories_id',$this->advertise_categories_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}