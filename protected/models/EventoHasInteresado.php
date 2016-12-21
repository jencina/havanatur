<?php

/**
 * This is the model class for table "evento_has_interesado".
 *
 * The followings are the available columns in table 'evento_has_interesado':
 * @property string $evento_even_id
 * @property integer $interesado_int_id
 * @property string $fecha_creacion
 */
class EventoHasInteresado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento_has_interesado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('evento_even_id, interesado_int_id', 'required'),
			array('interesado_int_id', 'numerical', 'integerOnly'=>true),
			array('evento_even_id', 'length', 'max'=>20),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('evento_even_id, interesado_int_id, fecha_creacion', 'safe', 'on'=>'search'),
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
			'evento_even_id' => 'Evento Even',
			'interesado_int_id' => 'Interesado Int',
			'fecha_creacion' => 'Fecha Creacion',
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

		$criteria->compare('evento_even_id',$this->evento_even_id,true);
		$criteria->compare('interesado_int_id',$this->interesado_int_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventoHasInteresado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
