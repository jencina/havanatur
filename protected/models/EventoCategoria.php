<?php

/**
 * This is the model class for table "evento_categoria".
 *
 * The followings are the available columns in table 'evento_categoria':
 * @property integer $cat_id
 * @property string $cat_nombre
 * @property string $cat_fechacreacion
 * @property integer $categoria_menu_evento_cat_id
 *
 * The followings are the available model relations:
 * @property Evento[] $eventos
 * @property CategoriaMenuEvento $categoriaMenuEventoCat
 */
class EventoCategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_nombre,categoria_menu_evento_cat_id', 'required'),
			array('categoria_menu_evento_cat_id', 'numerical', 'integerOnly'=>true),
			array('cat_nombre', 'length', 'max'=>45),
			array('cat_fechacreacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cat_id, cat_nombre, cat_fechacreacion, categoria_menu_evento_cat_id', 'safe', 'on'=>'search'),
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
			'eventos' => array(self::HAS_MANY, 'Evento', 'even_cat_id'),
			'categoriaMenuEventoCat' => array(self::BELONGS_TO, 'CategoriaMenuEvento', 'categoria_menu_evento_cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => 'Cat',
			'cat_nombre' => 'Cat Nombre',
			'cat_fechacreacion' => 'Cat Fechacreacion',
			'categoria_menu_evento_cat_id' => 'Categoria Menu Evento Cat',
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

		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('cat_nombre',$this->cat_nombre,true);
		$criteria->compare('cat_fechacreacion',$this->cat_fechacreacion,true);
		$criteria->compare('categoria_menu_evento_cat_id',$this->categoria_menu_evento_cat_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventoCategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
