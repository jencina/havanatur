<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property string $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $telefono
 * @property string $email
 * @property string $fecha_creacion
 * @property string $comentario
 * @property integer $respondido
 * @property integer $programa_combinacion_vigencia_id
 *
 * The followings are the available model relations:
 * @property ProgramaCombinacionVigencia $programaCombinacionVigencia
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, email, comentario', 'required'),
			array('respondido, programa_combinacion_vigencia_id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellidos, telefono, email', 'length', 'max'=>100),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellidos, telefono, email, fecha_creacion, comentario, respondido, programa_combinacion_vigencia_id', 'safe', 'on'=>'search'),
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
			'programaCombinacionVigencia' => array(self::BELONGS_TO, 'ProgramaCombinacionVigencia', 'programa_combinacion_vigencia_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'fecha_creacion' => 'Fecha Creacion',
			'comentario' => 'Comentario',
			'respondido' => 'Respondido',
			'programa_combinacion_vigencia_id' => 'Programa Combinacion Vigencia',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('respondido',$this->respondido);
		$criteria->compare('programa_combinacion_vigencia_id',$this->programa_combinacion_vigencia_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
