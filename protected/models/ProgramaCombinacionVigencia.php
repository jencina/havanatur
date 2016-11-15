<?php

/**
 * This is the model class for table "programa_combinacion_vigencia".
 *
 * The followings are the available columns in table 'programa_combinacion_vigencia':
 * @property integer $id
 * @property string $desde
 * @property string $hasta
 * @property string $comentario
 * @property integer $programa_combinacion_id
 *
 * The followings are the available model relations:
 * @property ProgramaCombinacion $programaCombinacion
 * @property Tarifa[] $tarifas
 */
class ProgramaCombinacionVigencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programa_combinacion_vigencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desde,hasta', 'required'),
			array('programa_combinacion_id', 'numerical', 'integerOnly'=>true),
			array('desde, hasta, comntario', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, desde, hasta, programa_combinacion_id, comentario', 'safe', 'on'=>'search'),
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
			'programaCombinacion' => array(self::BELONGS_TO, 'ProgramaCombinacion', 'programa_combinacion_id'),
			'tarifas' => array(self::HAS_MANY, 'Tarifa', 'programa_combinacion_vigencia_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'desde' => 'Desde',
			'hasta' => 'Hasta',
			'comentario' => 'Comentario',
			'programa_combinacion_id' => 'Programa Combinacion',
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
		$criteria->compare('desde',$this->desde,true);
		$criteria->compare('hasta',$this->hasta,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('programa_combinacion_id',$this->programa_combinacion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProgramaCombinacionVigencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
