<?php

/**
 * This is the model class for table "contenido_adicional".
 *
 * The followings are the available columns in table 'contenido_adicional':
 * @property integer $id
 * @property string $contenido
 * @property string $mapa
 * @property string $foto
 * @property integer $contenido_id
 * @property integer $activo
 * @property integer $contenido_adicional_posicion_id
 * @property integer $contenido_adicional_tipo_id
 *
 * The followings are the available model relations:
 * @property Contenido $contenido0
 * @property ContenidoAdicionalPosicion $contenidoAdicionalPosicion
 * @property ContenidoAdicionalTipo $contenidoAdicionalTipo
 * @property ContenidoFoto[] $contenidoFotos
 */
class ContenidoAdicional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contenido_adicional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenido_id, contenido_adicional_posicion_id, contenido_adicional_tipo_id', 'required'),
			array('contenido_id, activo, contenido_adicional_posicion_id, contenido_adicional_tipo_id', 'numerical', 'integerOnly'=>true),
            array('contenido_adicional_posicion_id','unico'),
            array('mapa', 'length', 'max'=>255),
			array('foto', 'length', 'max'=>100),
			array('contenido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, contenido, mapa, foto, contenido_id, activo, contenido_adicional_posicion_id, contenido_adicional_tipo_id', 'safe', 'on'=>'search'),
		);
	}
	
	 public function unico($attribute, $params){

		foreach($this->contenido0->contenidoAdicionals as $adicional){
			$contenido = ContenidoAdicional::model()->findByPk($this->id);
			if($contenido->contenido_adicional_posicion_id != $this->contenido_adicional_posicion_id){
				if($adicional->contenido_adicional_posicion_id == $this->contenido_adicional_posicion_id){
					$this->addError($attribute, 'Posicion ya asignada');
				}
			}
			
		}
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contenido0' => array(self::BELONGS_TO, 'Contenido', 'contenido_id'),
			'contenidoAdicionalPosicion' => array(self::BELONGS_TO, 'ContenidoAdicionalPosicion', 'contenido_adicional_posicion_id'),
			'contenidoAdicionalTipo' => array(self::BELONGS_TO, 'ContenidoAdicionalTipo', 'contenido_adicional_tipo_id'),
			'contenidoFotos' => array(self::HAS_MANY, 'ContenidoFoto', 'contenido_adicional_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contenido' => 'Contenido',
			'mapa' => 'Mapa',
			'foto' => 'Foto',
			'contenido_id' => 'Contenido',
			'activo' => 'Activo',
			'contenido_adicional_posicion_id' => 'Contenido Adicional Posicion',
			'contenido_adicional_tipo_id' => 'Contenido Adicional Tipo',
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
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('mapa',$this->mapa,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('contenido_id',$this->contenido_id);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('contenido_adicional_posicion_id',$this->contenido_adicional_posicion_id);
		$criteria->compare('contenido_adicional_tipo_id',$this->contenido_adicional_tipo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContenidoAdicional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
