<?php

/**
 * This is the model class for table "evento_tarifa".
 *
 * The followings are the available columns in table 'evento_tarifa':
 * @property string $tar_id
 * @property string $tar_plan
 * @property integer $tar_sgl
 * @property integer $tar_dbl
 * @property string $evento_id
 * @property string $tar_fechacreacion
 *
 * The followings are the available model relations:
 * @property Evento $evento
 * @property Hotel[] $hotels
 */
class EventoTarifa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento_tarifa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tar_sgl, tar_dbl,tar_plan', 'required'),
			array('tar_sgl, tar_dbl', 'numerical', 'integerOnly'=>true),
			array('tar_plan', 'length', 'max'=>255),
			array('evento_id', 'length', 'max'=>20),
			array('tar_fechacreacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tar_id, tar_plan, tar_sgl, tar_dbl, evento_id, tar_fechacreacion', 'safe', 'on'=>'search'),
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
			'evento' => array(self::BELONGS_TO, 'Evento', 'evento_id'),
			'hotels' => array(self::MANY_MANY, 'Hotel', 'evento_tarifa_has_hotel(evento_tarifa_tar_id, hotel_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tar_id' => 'Tar',
			'tar_plan' => 'Tar Plan',
			'tar_sgl' => 'Tar Sgl',
			'tar_dbl' => 'Tar Dbl',
			'evento_id' => 'Evento',
			'tar_fechacreacion' => 'Tar Fechacreacion',
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

		$criteria->compare('tar_id',$this->tar_id,true);
		$criteria->compare('tar_plan',$this->tar_plan,true);
		$criteria->compare('tar_sgl',$this->tar_sgl);
		$criteria->compare('tar_dbl',$this->tar_dbl);
		$criteria->compare('evento_id',$this->evento_id,true);
		$criteria->compare('tar_fechacreacion',$this->tar_fechacreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventoTarifa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
