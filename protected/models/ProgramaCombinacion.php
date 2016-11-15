<?php

/**
 * This is the model class for table "programa_combinacion".
 *
 * The followings are the available columns in table 'programa_combinacion':
 * @property integer $id
 * @property integer $programa_id
 * @property string $ocupacion
 * @property string $descripcion
 * @property integer $precio_desde
 *
 * The followings are the available model relations:
 * @property Programa $programa
 * @property ProgramaCombinacionHasHotel[] $programaCombinacionHasHotels
 * @property ProgramaCombinacionVigencia[] $programaCombinacionVigencias
 */
class ProgramaCombinacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programa_combinacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('ocupacion', 'required'),
			array('programa_id, precio_desde', 'numerical', 'integerOnly'=>true),
			array('ocupacion', 'length', 'max'=>255),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, programa_id, ocupacion, descripcion, precio_desde', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */

    public function getImagen(){
		
		$foto = array();
		
		foreach($this->hotels as $hotel){
			
			foreach($hotel->hotelImagens as $imagen){
				$foto[] = $imagen;
			}
		}
		
		if(count($foto) > 0){
			$imagen = array_rand($foto,1);
			
			return 'hotel/'.$foto[$imagen]->imagen;
		}else{
			return 'error/image-not-found.png';
		}
		
    }

    public function getNombre(){

        $hoteles = array();
        foreach($this->hotels as $hotel){
            $hoteles[] = $hotel->nombre;
        }

        return implode(" - ",$hoteles );
    }



    public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'programa' => array(self::BELONGS_TO, 'Programa', 'programa_id'),
            'hotels' => array(self::MANY_MANY, 'Hotel', 'programa_combinacion_has_hotel(programa_combinacion_id, hotel_id)'),
			'programaCombinacionHasHotels' => array(self::HAS_MANY, 'ProgramaCombinacionHasHotel', 'programa_combinacion_id'),
			'programaCombinacionVigencias' => array(self::HAS_MANY, 'ProgramaCombinacionVigencia', 'programa_combinacion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'programa_id' => 'Programa',
			'ocupacion' => 'Ocupacion',
			'descripcion' => 'Descripcion',
			'precio_desde' => 'Precio Desde',
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
		$criteria->compare('programa_id',$this->programa_id);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('precio_desde',$this->precio_desde);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProgramaCombinacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
