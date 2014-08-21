<?php

/**
 * This is the model class for table "login".
 *
 * The followings are the available columns in table 'login':
 * @property integer $id
 * @property string $user_name
 * @property string $password
 * @property string $add_date
 * @property string $last_login
 * @property integer $login_status
 * @property integer $block
 * @property integer $activation
 * @property integer $status
 * @property integer $roles_id
 *
 * The followings are the available model relations:
 * @property Roles $roles
 * @property SchoolsProfile[] $schoolsProfiles
 * @property UserLog[] $userLogs
 * @property UserProfiles[] $userProfiles
 * @property UserReviews[] $userReviews
 */
class Login extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Login the static model class
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
		return 'login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, password, roles_id', 'required'),
			array('login_status, block, activation, status, roles_id', 'numerical', 'integerOnly'=>true),
			array('user_name, password', 'length', 'max'=>45),
			array('add_date, last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, password, add_date, last_login, login_status, block, activation, status, roles_id', 'safe', 'on'=>'search'),
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
			'roles' => array(self::BELONGS_TO, 'Roles', 'roles_id'),
			'schoolsProfiles' => array(self::MANY_MANY, 'SchoolsProfile', 'schools_profile_has_login(login_id, schools_profile_id)'),
			'userLogs' => array(self::HAS_MANY, 'UserLog', 'login_id'),
			'userProfiles' => array(self::MANY_MANY, 'UserProfiles', 'user_profiles_has_login(login_id, user_profiles_id)'),
			'userReviews' => array(self::HAS_MANY, 'UserReviews', 'login_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => 'User Name',
			'password' => 'Password',
			'add_date' => 'Add Date',
			'last_login' => 'Last Login',
			'login_status' => 'Login Status',
			'block' => 'Block',
			'activation' => 'Activation',
			'status' => 'Status',
			'roles_id' => 'Roles',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('login_status',$this->login_status);
		$criteria->compare('block',$this->block);
		$criteria->compare('activation',$this->activation);
		$criteria->compare('status',$this->status);
		$criteria->compare('roles_id',$this->roles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}