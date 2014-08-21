<?php

/**
 * This is the model class for table "cms".
 *
 * The followings are the available columns in table 'cms':
 * @property integer $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $page
 * @property string $content
 * @property string $position
 * @property integer $status
 * @property integer $activation
 */
class Cms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cms the static model class
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
		return 'cms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page, position', 'required'),
			array('status, activation', 'numerical', 'integerOnly'=>true),
			array('meta_title, page', 'length', 'max'=>100),
			array('meta_description, meta_keywords', 'length', 'max'=>255),
			array('position', 'length', 'max'=>5),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, meta_title, meta_description, meta_keywords, page, content, position, status, activation', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'page' => 'Page',
			'content' => 'Content',
			'position' => 'Position',
			'status' => 'Status',
			'activation' => 'Activation',
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
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('page',$this->page,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation',$this->activation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}