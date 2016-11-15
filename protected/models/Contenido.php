<?php

/**
 * This is the model class for table "contenido".
 *
 * The followings are the available columns in table 'contenido':
 * @property integer $id
 * @property string $titulo
 * @property string $contenido
 * @property integer $contenido_tipo_id
 * @property integer $orden
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 *
 * The followings are the available model relations:
 * @property ContenidoTipo $contenidoTipo
 * @property ContenidoAdicional[] $contenidoAdicionals
 */
class Contenido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contenido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenido_tipo_id', 'required'),
			array('contenido_tipo_id, orden', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>100),
			array('contenido, fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, contenido, contenido_tipo_id, orden, fecha_creacion, fecha_modificacion', 'safe', 'on'=>'search'),
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
			'contenidoTipo' => array(self::BELONGS_TO, 'ContenidoTipo', 'contenido_tipo_id'),
			'contenidoAdicionals' => array(self::HAS_MANY, 'ContenidoAdicional', 'contenido_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'contenido' => 'Contenido',
			'contenido_tipo_id' => 'Contenido Tipo',
			'orden' => 'Orden',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('contenido_tipo_id',$this->contenido_tipo_id);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contenido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
