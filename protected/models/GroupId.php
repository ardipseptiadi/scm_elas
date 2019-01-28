<?php

/**
 * This is the model class for table "hb_group_id".
 *
 * The followings are the available columns in table 'hb_group_id':
 * @property string $group_id
 * @property string $group_name
 * @property integer $is_active
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property Menu[] $hbMenus
 */
class GroupId extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_group_id';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, group_name', 'required'),
			array('is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('group_id', 'length', 'max'=>40),
			array('group_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, group_name, is_active, is_deleted', 'safe', 'on'=>'search'),
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
			'hbMenus' => array(self::MANY_MANY, 'Menu', 'hb_menu_group(group_user, id_menu)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupId the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
