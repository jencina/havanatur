<?php

/**
 * This is the model class for table "datos_adicional".
 *
 * The followings are the available columns in table 'datos_adicional':
 * @property integer $ad_id
 * @property string $ad_profesion
 * @property string $ad_especialidad
 * @property string $ad_lugar_trabajo
 * @property string $ad_contacto_nombre
 * @property string $ad_contacto_telefono
 * @property string $ad_pasaporte
 * @property string $ad_fechacreacion
 * @property string $ad_fechamodificacion
 * @property integer $interesado_int_id
 *
 * The followings are the available model relations:
 * @property Interesado $interesadoInt
 */
class DatosAdicional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_adicional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('interesado_int_id,ad_profesion, ad_especialidad, ad_lugar_trabajo,ad_contacto_telefono, ad_contacto_nombre, ad_pasaporte', 'required'),
			array('interesado_int_id', 'numerical', 'integerOnly'=>true),
			array('ad_profesion, ad_especialidad, ad_lugar_trabajo, ad_contacto_nombre, ad_pasaporte', 'length', 'max'=>255),
			array('ad_contacto_telefono', 'length', 'max'=>45),
			array('ad_fechacreacion, ad_fechamodificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ad_id, ad_profesion, ad_especialidad, ad_lugar_trabajo, ad_contacto_nombre, ad_contacto_telefono, ad_pasaporte, ad_fechacreacion, ad_fechamodificacion, interesado_int_id', 'safe', 'on'=>'search'),
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
			'interesadoInt' => array(self::BELONGS_TO, 'Interesado', 'interesado_int_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            return array(
                'ad_id' => 'Ad',
                'ad_profesion' => 'Profesion',
                'ad_especialidad' => 'Especialidad',
                'ad_lugar_trabajo' => 'Lugar Trabajo',
                'ad_contacto_nombre' => 'Nombre Contacto',
                'ad_contacto_telefono' => 'Telefono Contacto',
                'ad_pasaporte' => 'Pasaporte',
                'ad_fechacreacion' => 'Fechacreacion',
                'ad_fechamodificacion' => 'Fechamodificacion',
                'interesado_int_id' => 'Interesado Int',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('ad_profesion',$this->ad_profesion,true);
		$criteria->compare('ad_especialidad',$this->ad_especialidad,true);
		$criteria->compare('ad_lugar_trabajo',$this->ad_lugar_trabajo,true);
		$criteria->compare('ad_contacto_nombre',$this->ad_contacto_nombre,true);
		$criteria->compare('ad_contacto_telefono',$this->ad_contacto_telefono,true);
		$criteria->compare('ad_pasaporte',$this->ad_pasaporte,true);
		$criteria->compare('ad_fechacreacion',$this->ad_fechacreacion,true);
		$criteria->compare('ad_fechamodificacion',$this->ad_fechamodificacion,true);
		$criteria->compare('interesado_int_id',$this->interesado_int_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DatosAdicional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
