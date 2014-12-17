<?php

/**
 * This is the model class for table "finance_goal".
 *
 * The followings are the available columns in table 'finance_goal':
 * @property integer $id
 * @property integer $finance_id
 * @property integer $type
 * @property string $data
 * @property string $description
 * @property integer $state
 * @property integer $create_date
 *
 * The followings are the available model relations:
 * @property Finance $finance
 */
class FinanceGoalTable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'finance_goal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('finance_id, type, create_date', 'required'),
			array('finance_id, type, state, create_date', 'numerical', 'integerOnly'=>true),
			array('data, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, finance_id, type, data, description, state, create_date', 'safe', 'on'=>'search'),
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
			'finance' => array(self::BELONGS_TO, 'Finance', 'finance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'finance_id' => 'Finance',
			'type' => 'Type',
			'data' => 'Data',
			'description' => 'Description',
			'state' => 'State',
			'create_date' => 'Create Date',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('finance_id',$this->finance_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('create_date',$this->create_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FinanceGoalTable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
