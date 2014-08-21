<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $code_1
 * @property string $code_2
 * @property string $image
 * @property string $add_date
 * @property string $description
 * @property integer $published
 * @property integer $status
 * @property integer $countries_id
 *
 * The followings are the available model relations:
 * @property Cities[] $cities
 * @property Countries $countries
 */
class States extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return States the static model class
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
		return 'states';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, countries_id', 'required'),
			array('published, status, countries_id', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>100),
			array('code_1, code_2', 'length', 'max'=>4),
			array('image', 'length', 'max'=>45),
			array('add_date, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, code_1, code_2, image, add_date, description, published, status, countries_id', 'safe', 'on'=>'search'),
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
			'cities' => array(self::HAS_MANY, 'Cities', 'states_id'),
			'countries' => array(self::BELONGS_TO, 'Countries', 'countries_id'),
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
			'alias' => 'Alias',
			'code_1' => 'Code 1',
			'code_2' => 'Code 2',
			'image' => 'Image',
			'add_date' => 'Add Date',
			'description' => 'Description',
			'published' => 'Published',
			'status' => 'Status',
			'countries_id' => 'Countries',
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
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('code_1',$this->code_1,true);
		$criteria->compare('code_2',$this->code_2,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('status',$this->status);
		$criteria->compare('countries_id',$this->countries_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}