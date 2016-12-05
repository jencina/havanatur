<?php

/**
 * This is the model class for table "interesado".
 *
 * The followings are the available columns in table 'interesado':
 * @property integer $int_id
 * @property string $int_nombre
 * @property string $int_apellido
 * @property string $int_email
 * @property string $int_telefono
 * @property string $int_celular
 * @property string $int_rut
 * @property string $int_fechacreacion
 * @property string $int_even_id
 *
 * The followings are the available model relations:
 * @property Evento $intEven
 */
class Interesado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'interesado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('int_id, int_even_id', 'required'),
			array('int_id', 'numerical', 'integerOnly'=>true),
			array('int_nombre, int_apellido, int_email', 'length', 'max'=>100),
			array('int_telefono, int_celular, int_rut, int_fechacreacion', 'length', 'max'=>45),
			array('int_even_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('int_id, int_nombre, int_apellido, int_email, int_telefono, int_celular, int_rut, int_fechacreacion, int_even_id', 'safe', 'on'=>'search'),
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
			'intEven' => array(self::BELONGS_TO, 'Evento', 'int_even_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'int_id' => 'Int',
			'int_nombre' => 'Nombre',
			'int_apellido' => 'Apellido',
			'int_email' => 'Email',
			'int_telefono' => 'Telefono',
			'int_celular' => 'Celular',
			'int_rut' => 'Rut',
			'int_fechacreacion' => 'Fechacreacion',
			'int_even_id' => 'Even',
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

		$criteria->compare('int_id',$this->int_id);
		$criteria->compare('int_nombre',$this->int_nombre,true);
		$criteria->compare('int_apellido',$this->int_apellido,true);
		$criteria->compare('int_email',$this->int_email,true);
		$criteria->compare('int_telefono',$this->int_telefono,true);
		$criteria->compare('int_celular',$this->int_celular,true);
		$criteria->compare('int_rut',$this->int_rut,true);
		$criteria->compare('int_fechacreacion',$this->int_fechacreacion,true);
		$criteria->compare('int_even_id',$this->int_even_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Interesado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
