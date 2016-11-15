<?php

/**
 * This is the model class for table "programa".
 *
 * The followings are the available columns in table 'programa':
 * @property integer $id
 * @property string $nombre
 * @property integer $precio_desde
 * @property string $descripcion
 * @property integer $programa_tipo_id
 * @property integer $orden
 * @property integer $activo
 * @property integer $destacado
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $pdf
 *
 * The followings are the available model relations:
 * @property ProgramaTipo $programaTipo
 * @property ProgramaCombinacion[] $programaCombinacions
 * @property ProgramaCondiciones[] $programaCondiciones
 * @property ProgramaIncluye[] $programaIncluyes
 * @property ProgramaNoIncluye[] $programaNoIncluyes
 * @property ProgramaSuplementoAereo[] $programaSuplementoAereos
 * @property SuplementoAereo[] $suplementoAereos
 */
class Programa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, programa_tipo_id, orden, activo, destacado', 'required'),
			array('precio_desde, programa_tipo_id, orden, activo, destacado', 'numerical', 'integerOnly'=>true),
			array('nombre, pdf', 'length', 'max'=>100),
			array('fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, precio_desde, descripcion, programa_tipo_id, orden, activo, destacado, fecha_creacion, fecha_modificacion, pdf', 'safe', 'on'=>'search'),
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
			'programaTipo' => array(self::BELONGS_TO, 'ProgramaTipo', 'programa_tipo_id'),
			'programaCombinacions' => array(self::HAS_MANY, 'ProgramaCombinacion', 'programa_id'),
			'programaCondiciones' => array(self::HAS_MANY, 'ProgramaCondiciones', 'programa_id'),
			'programaIncluyes' => array(self::HAS_MANY, 'ProgramaIncluye', 'programa_id'),
			'programaNoIncluyes' => array(self::HAS_MANY, 'ProgramaNoIncluye', 'programa_id'),
			'programaSuplementoAereos' => array(self::HAS_MANY, 'ProgramaSuplementoAereo', 'programa_id'),
			'suplementoAereos' => array(self::HAS_MANY, 'SuplementoAereo', 'programa_id'),
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
			'precio_desde' => 'Precio Desde',
			'descripcion' => 'Descripcion',
			'programa_tipo_id' => 'Programa Tipo',
			'orden' => 'Orden',
			'activo' => 'Activo',
			'destacado' => 'Destacado',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'pdf' => 'Pdf',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('precio_desde',$this->precio_desde);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('programa_tipo_id',$this->programa_tipo_id);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('destacado',$this->destacado);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('pdf',$this->pdf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Programa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
