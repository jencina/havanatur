<?php

/**
 * This is the model class for table "lightbox".
 *
 * The followings are the available columns in table 'lightbox':
 * @property integer $id
 * @property string $nombre
 * @property string $imagen
 * @property integer $orden
 * @property integer $usuario_id
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 */
class Lightbox extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lightbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orden,nombre', 'required'),
            array('imagen', 'required','on'=>'create'),
			array('orden, usuario_id', 'numerical', 'integerOnly'=>true),
			array('nombre, imagen', 'length', 'max'=>100),
			array('fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, imagen, orden, usuario_id, fecha_creacion, fecha_modificacion', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
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
			'imagen' => 'Imagen',
			'orden' => 'Orden',
			'usuario_id' => 'Usuario',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('usuario_id',$this->usuario_id);
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
	 * @return Lightbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
