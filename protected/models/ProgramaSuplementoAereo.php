<?php

/**
 * This is the model class for table "programa_suplemento_aereo".
 *
 * The followings are the available columns in table 'programa_suplemento_aereo':
 * @property integer $id
 * @property string $clase
 * @property string $usd
 * @property integer $programa_id
 *
 * The followings are the available model relations:
 * @property Programa $programa
 */
class ProgramaSuplementoAereo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programa_suplemento_aereo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clase,usd', 'required'),
			array('programa_id', 'numerical', 'integerOnly'=>true),
			array('clase, usd', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, clase, usd, programa_id', 'safe', 'on'=>'search'),
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
			'programa' => array(self::BELONGS_TO, 'Programa', 'programa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clase' => 'Clase',
			'usd' => 'Usd',
			'programa_id' => 'Programa',
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
		$criteria->compare('clase',$this->clase,true);
		$criteria->compare('usd',$this->usd,true);
		$criteria->compare('programa_id',$this->programa_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProgramaSuplementoAereo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
