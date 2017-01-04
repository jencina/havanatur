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
 * @property string $int_user
 * @property string $int_password
 * @property string $int_pasaporte
 * @property integer $int_activo
 * @property integer $regiones_id
 * @property integer $comunas_id
 *
 * The followings are the available model relations:
 * @property Evento[] $eventos
 * @property Comunas $comunas
 * @property Regiones $regiones
 */
class Interesado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
        public $int_password_repetir = '';
         
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
                        array('regiones_id, comunas_id,int_email, int_nombre, int_apellido, int_rut','required'),
                        array('int_user, int_password, int_password_repetir','required','on'=>'insert'),
			array('int_activo, regiones_id, comunas_id', 'numerical', 'integerOnly'=>true),
			array('int_nombre, int_apellido, int_email', 'length', 'max'=>100),
			array('int_telefono, int_celular, int_rut, int_user, int_password', 'length', 'max'=>45),
			array('int_pasaporte', 'length', 'max'=>255),
                    
                        array('int_rut','unique'),
                        array('int_rut','valida_rut'),
                        array('int_password','repetir','on'=>'insert'),
			array('int_fechacreacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('int_id, int_nombre, int_apellido, int_email, int_telefono, int_celular, int_rut, int_fechacreacion, int_user, int_password, int_pasaporte, int_activo, regiones_id, comunas_id', 'safe', 'on'=>'search'),
		);
	}
        
         public function repetir($attribute,$params){           
            if($this->int_password != $this->int_password_repetir){
                $this->addError($attribute, 'Las password son distintas');
            }
        }
        
        public function valida_rut($attribute,$params)
        {
            $rut = $this->int_rut;
            if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
                $this->addError($attribute, 'rut no valido!');
            }
            $rut = preg_replace('/[\.\-]/i', '', $rut);
            $dv = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut) - 1);
            $i = 2;
            $suma = 0;
            foreach (array_reverse(str_split($numero)) as $v) {
                if ($i == 8){
                    $i = 2;
                } 
                $suma += $v * $i;
                ++$i;
            }
            $dvr = 11 - ($suma % 11);
            if ($dvr == 11){
                $dvr = 0;
            }
                
            if ($dvr == 10){
                $dvr = 'K';
            }
                
            if ($dvr == strtoupper($dv)){
                 //$this->addError($attribute, 'rut valido!');
                return true;
            }else{
                $this->addError($attribute, 'rut no valido!');
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
			'eventos' => array(self::MANY_MANY, 'Evento', 'evento_has_interesado(interesado_int_id, evento_even_id)'),
			'comunas' => array(self::BELONGS_TO, 'Comunas', 'comunas_id'),
			'regiones' => array(self::BELONGS_TO, 'Regiones', 'regiones_id'),
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
			'int_apellido' => 'Apellidos',
			'int_email' => 'Email',
			'int_telefono' => 'Telefono',
			'int_celular' => 'Celular',
			'int_rut' => 'Rut',
			'int_fechacreacion' => 'Fechacreacion',
			'int_user' => 'Usuario',
			'int_password' => 'Password',
			'int_pasaporte' => 'Pasaporte',
			'int_activo' => 'Activo',
                        'int_password_repetir'=>'Repetir Password',
			'regiones_id' => 'Region',
			'comunas_id' => 'Comuna',
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
		$criteria->compare('int_user',$this->int_user,true);
		$criteria->compare('int_password',$this->int_password,true);
		$criteria->compare('int_pasaporte',$this->int_pasaporte,true);
		$criteria->compare('int_activo',$this->int_activo);
		$criteria->compare('regiones_id',$this->regiones_id);
		$criteria->compare('comunas_id',$this->comunas_id);

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
