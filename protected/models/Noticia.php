<?php

/**
 * This is the model class for table "noticia".
 *
 * The followings are the available columns in table 'noticia':
 * @property string $not_id
 * @property string $not_titulo
 * @property string $not_subtitulo
 * @property string $not_contenido
 * @property string $not_imagen
 * @property string $not_imagen_detail
 * @property string $not_fecha
 * @property string $not_fechacreacion
 * @property string $not_fechamodificacion
 * @property integer $usuario_id
 * @property integer $not_destacado
 * @property integer $categoria_cat_id
 * @property string $not_activo
 *
 * The followings are the available model relations:
 * @property Categoria $categoriaCat
 * @property Usuario $usuario
 */
class Noticia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'noticia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('not_titulo,not_contenido, not_subtitulo, not_imagen,not_imagen_detail,usuario_id', 'required'),
			array('usuario_id, not_destacado, categoria_cat_id', 'numerical', 'integerOnly'=>true),
			array('not_titulo, not_subtitulo, not_imagen, not_imagen_detail', 'length', 'max'=>255),
			array('not_activo', 'length', 'max'=>45),
			array('not_contenido, not_fecha, not_fechacreacion, not_fechamodificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('not_id, not_titulo, not_subtitulo, not_contenido, not_imagen, not_imagen_detail, not_fecha, not_fechacreacion, not_fechamodificacion, usuario_id, not_destacado, categoria_cat_id, not_activo', 'safe', 'on'=>'search'),
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
			'categoriaCat' => array(self::BELONGS_TO, 'Categoria', 'categoria_cat_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'not_id' => 'Not',
			'not_titulo' => 'Not Titulo',
			'not_subtitulo' => 'Not Subtitulo',
			'not_contenido' => 'Not Contenido',
			'not_imagen' => 'Not Imagen',
			'not_imagen_detail' => 'Not Imagen Detail',
			'not_fecha' => 'Not Fecha',
			'not_fechacreacion' => 'Not Fechacreacion',
			'not_fechamodificacion' => 'Not Fechamodificacion',
			'usuario_id' => 'Usuario',
			'not_destacado' => 'Not Destacado',
			'categoria_cat_id' => 'Categoria Cat',
			'not_activo' => 'Not Activo',
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

		$criteria->compare('not_id',$this->not_id,true);
		$criteria->compare('not_titulo',$this->not_titulo,true);
		$criteria->compare('not_subtitulo',$this->not_subtitulo,true);
		$criteria->compare('not_contenido',$this->not_contenido,true);
		$criteria->compare('not_imagen',$this->not_imagen,true);
		$criteria->compare('not_imagen_detail',$this->not_imagen_detail,true);
		$criteria->compare('not_fecha',$this->not_fecha,true);
		$criteria->compare('not_fechacreacion',$this->not_fechacreacion,true);
		$criteria->compare('not_fechamodificacion',$this->not_fechamodificacion,true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('not_destacado',$this->not_destacado);
		$criteria->compare('categoria_cat_id',$this->categoria_cat_id);
		$criteria->compare('not_activo',$this->not_activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Noticia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
