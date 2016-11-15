<?php

/**
 * This is the model class for table "hotel".
 *
 * The followings are the available columns in table 'hotel':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $estrellas
 * @property integer $activo
 * @property string $mapa
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $usuario_id
 * @property integer $ciudad_id
 *
 * The followings are the available model relations:
 * @property Ciudad $ciudad
 * @property Usuario $usuario
 * @property HotelImagen[] $hotelImagens
 * @property ProgramaCombinacionHasHotel[] $programaCombinacionHasHotels
 */
class Hotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('nombre, estrellas,ciudad_id,descripcion', 'required'),
			array('estrellas, activo, usuario_id, ciudad_id', 'numerical', 'integerOnly'=>true),
			array('nombre, mapa', 'length', 'max'=>255),
			array('descripcion, fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, estrellas, activo, mapa, fecha_creacion, fecha_modificacion, usuario_id, ciudad_id', 'safe', 'on'=>'search'),
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
			'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
			'hotelImagens' => array(self::HAS_MANY, 'HotelImagen', 'hotel_id'),
			'programaCombinacionHasHotels' => array(self::HAS_MANY, 'ProgramaCombinacionHasHotel', 'hotel_id'),
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
			'descripcion' => 'Descripcion',
			'estrellas' => 'Estrellas',
			'activo' => 'Activo',
			'mapa' => 'Mapa',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'usuario_id' => 'Usuario',
			'ciudad_id' => 'Ciudad',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estrellas',$this->estrellas);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('mapa',$this->mapa,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('ciudad_id',$this->ciudad_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
