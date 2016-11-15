<?php

/**
 * This is the model class for table "sbif_recursos".
 *
 * The followings are the available columns in table 'sbif_recursos':
 * @property integer $sbif_id
 * @property string $sbif_recurso
 * @property string $sbif_valor
 * @property string $sbif_fecha
 * @property string $sbif_vigencia
 */
class SbifRecursos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sbif_recursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sbif_recurso, sbif_valor, sbif_fecha, sbif_vigencia', 'required'),
			array('sbif_recurso, sbif_valor', 'length', 'max'=>100),
			array('sbif_vigencia', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sbif_id, sbif_recurso, sbif_valor, sbif_fecha, sbif_vigencia', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sbif_id' => 'Sbif',
			'sbif_recurso' => 'Sbif Recurso',
			'sbif_valor' => 'Sbif Valor',
			'sbif_fecha' => 'Sbif Fecha',
			'sbif_vigencia' => 'Sbif Vigencia',
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

		$criteria->compare('sbif_id',$this->sbif_id);
		$criteria->compare('sbif_recurso',$this->sbif_recurso,true);
		$criteria->compare('sbif_valor',$this->sbif_valor,true);
		$criteria->compare('sbif_fecha',$this->sbif_fecha,true);
		$criteria->compare('sbif_vigencia',$this->sbif_vigencia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SbifRecursos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
