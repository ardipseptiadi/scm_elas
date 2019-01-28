<?php

/**
 * This is the model class for table "hb_menu".
 *
 * The followings are the available columns in table 'hb_menu':
 * @property integer $id_menu
 * @property string $label
 * @property string $description
 * @property string $url
 * @property string $menu_icon
 * @property integer $parent
 * @property integer $is_active
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property GroupId[] $hbGroups
 */
class Menu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('label, description, url', 'required'),
			array('parent, is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>20),
			array('url, menu_icon', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_menu, label, description, url, menu_icon, parent, is_active, is_deleted', 'safe', 'on'=>'search'),
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
			'hbGroups' => array(self::MANY_MANY, 'GroupId', 'hb_menu_group(id_menu, group_user)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_menu' => 'Id Menu',
			'label' => 'Label',
			'description' => 'Description',
			'url' => 'Url',
			'menu_icon' => 'Menu Icon',
			'parent' => 'Parent',
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

		$criteria->compare('id_menu',$this->id_menu);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('menu_icon',$this->menu_icon,true);
		$criteria->compare('parent',$this->parent);
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
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
