<?php

/**
 * This is the model class for table "tarifa".
 *
 * The followings are the available columns in table 'tarifa':
 * @property integer $id
 * @property string $nombre
 * @property string $dbl
 * @property string $sgl
 * @property string $tpl
 * @property string $chd
 * @property string $chd2
 * @property integer $programa_combinacion_vigencia_id
 *
 * The followings are the available model relations:
 * @property ProgramaCombinacionVigencia $programaCombinacionVigencia
 */
class Tarifa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarifa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dbl, sgl, tpl, chd', 'required'),
			array('programa_combinacion_vigencia_id', 'numerical', 'integerOnly'=>true),
			array('nombre, dbl, sgl, tpl, chd, chd2', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, dbl, sgl, tpl, chd, programa_combinacion_vigencia_id, chd2', 'safe', 'on'=>'search'),
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
			'dbl'  => 'Dbl',
			'sgl'  => 'Sgl',
			'tpl'  => 'Tpl',
			'chd'  => 'Chd',
			'chd2' => 'Chd2',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('dbl',$this->dbl,true);
		$criteria->compare('sgl',$this->sgl,true);
		$criteria->compare('tpl',$this->tpl,true);
		$criteria->compare('chd',$this->chd,true);
		$criteria->compare('chd2',$this->chd2,true);
		$criteria->compare('programa_combinacion_vigencia_id',$this->programa_combinacion_vigencia_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tarifa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
