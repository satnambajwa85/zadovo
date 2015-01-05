<?php

/**
 * This is the model class for table "business".
 *
 * The followings are the available columns in table 'business':
 * @property integer $id
 * @property string $start_age_group
 * @property string $end_age_group
 * @property string $email
 * @property string $website
 * @property string $phone_number
 * @property string $mobile_number
 * @property string $about_the_business
 * @property string $additional_info
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $land_mark
 * @property string $pin_code
 * @property string $prefix
 * @property string $first_name
 * @property string $last_name
 * @property string $designation
 * @property string $email1
 * @property string $mobile_no
 * @property string $prefix2
 * @property string $first_name2
 * @property string $last_name2
 * @property string $designation2
 * @property string $email2
 * @property string $mobile_no2
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
 * @property BusinessHasCategory[] $businessHasCategories
 */
class Business extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Business the static model class
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
		return 'business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_age_group, end_age_group, email, website, phone_number, mobile_number, about_the_business, additional_info, address_line_1, address_line_2, land_mark, pin_code, prefix, first_name, last_name, designation, email1, mobile_no, prefix2, first_name2, last_name2, designation2, email2, mobile_no2, title, image, link, advertise_categories_id', 'required'),
			array('published, status, advertise_categories_id', 'numerical', 'integerOnly'=>true),
			array('start_age_group, end_age_group', 'length', 'max'=>50),
			array('email, website, first_name, last_name, designation, email1, first_name2, last_name2, designation2, email2, title', 'length', 'max'=>100),
			array('phone_number, mobile_number, mobile_no, mobile_no2', 'length', 'max'=>20),
			array('address_line_1, address_line_2', 'length', 'max'=>250),
			array('land_mark, pin_code', 'length', 'max'=>255),
			array('prefix, prefix2', 'length', 'max'=>5),
			array('image, link', 'length', 'max'=>45),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, start_age_group, end_age_group, email, website, phone_number, mobile_number, about_the_business, additional_info, address_line_1, address_line_2, land_mark, pin_code, prefix, first_name, last_name, designation, email1, mobile_no, prefix2, first_name2, last_name2, designation2, email2, mobile_no2, title, image, description, link, add_date, published, status, advertise_categories_id', 'safe', 'on'=>'search'),
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
			'businessHasCategories' => array(self::HAS_MANY, 'BusinessHasCategory', 'business_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'start_age_group' => 'Start Age Group',
			'end_age_group' => 'End Age Group',
			'email' => 'Email',
			'website' => 'Website',
			'phone_number' => 'Phone Number',
			'mobile_number' => 'Mobile Number',
			'about_the_business' => 'About The Business',
			'additional_info' => 'Additional Info',
			'address_line_1' => 'Address Line 1',
			'address_line_2' => 'Address Line 2',
			'land_mark' => 'Land Mark',
			'pin_code' => 'Pin Code',
			'prefix' => 'Prefix',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'designation' => 'Designation',
			'email1' => 'Email1',
			'mobile_no' => 'Mobile No',
			'prefix2' => 'Prefix2',
			'first_name2' => 'First Name2',
			'last_name2' => 'Last Name2',
			'designation2' => 'Designation2',
			'email2' => 'Email2',
			'mobile_no2' => 'Mobile No2',
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
		$criteria->compare('start_age_group',$this->start_age_group,true);
		$criteria->compare('end_age_group',$this->end_age_group,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('about_the_business',$this->about_the_business,true);
		$criteria->compare('additional_info',$this->additional_info,true);
		$criteria->compare('address_line_1',$this->address_line_1,true);
		$criteria->compare('address_line_2',$this->address_line_2,true);
		$criteria->compare('land_mark',$this->land_mark,true);
		$criteria->compare('pin_code',$this->pin_code,true);
		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('prefix2',$this->prefix2,true);
		$criteria->compare('first_name2',$this->first_name2,true);
		$criteria->compare('last_name2',$this->last_name2,true);
		$criteria->compare('designation2',$this->designation2,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('mobile_no2',$this->mobile_no2,true);
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