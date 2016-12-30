<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property string $even_id
 * @property string $even_titulo
 * @property string $even_subtitulo
 * @property string $even_contenido
 * @property string $even_imagen
 * @property string $even_imagen_detail
 * @property string $even_fecha
 * @property string $even_fechacreacion
 * @property string $even_fechamodificacion
 * @property integer $even_destacado
 * @property integer $even_activo
 * @property integer $usuario_id
 * @property string $even_email
 * @property string $even_telefono_1
 * @property string $even_telefono_2
 * @property integer $even_cat_id
 *
 * The followings are the available model relations:
 * @property EventoCategoria $evenCat
 * @property Usuario $usuario
 * @property Interesado[] $interesados
 */
class Evento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('even_titulo,even_email,even_contenido,even_telefono_1, even_subtitulo, even_cat_id', 'required'),
                        array('even_imagen, even_imagen_detail','required','on'=>'insert'),
			array('even_destacado, even_activo, usuario_id, even_cat_id', 'numerical', 'integerOnly'=>true),
			array('even_titulo, even_subtitulo, even_imagen, even_imagen_detail', 'length', 'max'=>255),
			array('even_email, even_telefono_1, even_telefono_2', 'length', 'max'=>45),
			array('even_contenido, even_fecha, even_fechacreacion, even_fechamodificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('even_id, even_titulo, even_subtitulo, even_contenido, even_imagen, even_imagen_detail, even_fecha, even_fechacreacion, even_fechamodificacion, even_destacado, even_activo, usuario_id, even_email, even_telefono_1, even_telefono_2, even_cat_id', 'safe', 'on'=>'search'),
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
			'evenCat' => array(self::BELONGS_TO, 'EventoCategoria', 'even_cat_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
			'interesados' => array(self::HAS_MANY, 'Interesado', 'int_even_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'even_id' => 'Even',
			'even_titulo' => 'Titulo',
			'even_subtitulo' => 'Subtitulo',
			'even_contenido' => 'Contenido',
			'even_imagen' => 'Imagen',
			'even_imagen_detail' => 'Imagen Detail',
			'even_fecha' => 'Fecha',
			'even_fechacreacion' => 'Fechacreacion',
			'even_fechamodificacion' => 'Fechamodificacion',
			'even_destacado' => 'Destacado',
			'even_activo' => 'Activo',
			'usuario_id' => 'Usuario',
			'even_email' => 'Email',
			'even_telefono_1' => 'Telefono 1',
			'even_telefono_2' => 'Telefono 2',
			'even_cat_id' => 'Categoria',
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

		$criteria->compare('even_id',$this->even_id,true);
		$criteria->compare('even_titulo',$this->even_titulo,true);
		$criteria->compare('even_subtitulo',$this->even_subtitulo,true);
		$criteria->compare('even_contenido',$this->even_contenido,true);
		$criteria->compare('even_imagen',$this->even_imagen,true);
		$criteria->compare('even_imagen_detail',$this->even_imagen_detail,true);
		$criteria->compare('even_fecha',$this->even_fecha,true);
		$criteria->compare('even_fechacreacion',$this->even_fechacreacion,true);
		$criteria->compare('even_fechamodificacion',$this->even_fechamodificacion,true);
		$criteria->compare('even_destacado',$this->even_destacado);
		$criteria->compare('even_activo',$this->even_activo);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('even_email',$this->even_email,true);
		$criteria->compare('even_telefono_1',$this->even_telefono_1,true);
		$criteria->compare('even_telefono_2',$this->even_telefono_2,true);
		$criteria->compare('even_cat_id',$this->even_cat_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
