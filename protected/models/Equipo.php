<?php

/**
 * This is the model class for table "equipo".
 *
 * The followings are the available columns in table 'equipo':
 * @property integer $id
 * @property string $cargo
 * @property string $nombre
 * @property string $foto
 * @property string $email
 * @property string $anexo
 * @property integer $equipo_tipo_id
 *
 * The followings are the available model relations:
 * @property EquipoTipo $equipoTipo
 */
class Equipo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' cargo, nombre, email, anexo ,equipo_tipo_id', 'required'),
			array('equipo_tipo_id', 'numerical', 'integerOnly'=>true),
			array('cargo, nombre, foto, email, anexo', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cargo, nombre, foto, email, anexo, equipo_tipo_id', 'safe', 'on'=>'search'),
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
			'equipoTipo' => array(self::BELONGS_TO, 'EquipoTipo', 'equipo_tipo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cargo' => 'Cargo',
			'nombre' => 'Nombre',
			'foto' => 'Foto',
			'email' => 'Email',
			'anexo' => 'Anexo',
			'equipo_tipo_id' => 'Equipo Tipo',
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
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('anexo',$this->anexo,true);
		$criteria->compare('equipo_tipo_id',$this->equipo_tipo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equipo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
