<?php

class HotelController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='//layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','fotos','UploadFoto','FotoDelete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function init() {
            if(!Yii::app()->user->isGuest){
                if(Yii::app()->user->type == 'web'){
                    $this->redirect(array('admin/index'));
                }
            }
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Hotel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hotel']))
		{
			$model->attributes=$_POST['Hotel'];
			if($model->validate()) {
                $model->fecha_creacion = date('Y-m-d H:i:s');
                $model->fecha_modificacion = date('Y-m-d H:i:s');
                $model->usuario_id = Yii::app()->user->id;
                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hotel']))
		{
			$model->attributes=$_POST['Hotel'];

            if($model->validate()){
                $model->fecha_modificacion = date('Y-m-d H:i:s');
                if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    public function actionFotos($id)
    {
        $model=$this->loadModel($id);

        $fotos=new HotelImagen('search');

        $fotos->unsetAttributes();  // clear any default values
        $fotos->hotel_id = $id;
        if(isset($_GET['Hotel']))
            $model->attributes=$_GET['Hotel'];

        $this->render('fotos',array(
            'model'=>$model,
            'fotos'=>$fotos
        ));
    }

    public function actionUploadFoto()
    {
        @ini_set("post_max_size","50M");
        @ini_set("upload_max_filesize","50M");

        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $id   = Yii::app()->request->getParam('id');
        $foto = new HotelImagen();
        $foto->hotel_id = $id;

        $folder= Yii::app()->basePath.'/../images/hotel/';
        $allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 50 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        $foto->imagen =$fileName;
        $foto->insert();


        echo $return;// it's array
    }
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    public function actionFotoDelete($id)
    {
        $foto = HotelImagen::model()->findByPk($id);
        $imagen = $foto->imagen;
        $foto->delete();

        if(file_exists(Yii::app()->basePath.'/../images/hotel/'.$imagen) && !is_dir(file_exists(Yii::app()->basePath.'/../images/hotel/'.$imagen))){
            if($imagen != ''){
                unlink(Yii::app()->basePath.'/../images/hotel/'.$imagen);
            }
        }
        //unset();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Hotel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Hotel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hotel']))
			$model->attributes=$_GET['Hotel'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Hotel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Hotel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Hotel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hotel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
