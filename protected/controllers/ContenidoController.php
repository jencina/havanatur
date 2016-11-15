<?php

class ContenidoController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','create','update','viewAdicional','createAdicional','updateAdicional','imagenAdicional','imagenAdicionalUpload'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','deleteAdicional','adicional','imagenAdicionalDelete','viewAdicional'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

    public function actionViewAdicional($id)
    {
        $model = ContenidoAdicional::model()->findByPk($id);
        $this->render('viewAdicional',array(
            'model'=>$model,
        ));
    }



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Contenido;

		if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];

            if($model->validate()){
                $model->fecha_creacion     = date("Y-m-d H:i:s");
                $model->fecha_modificacion = date("Y-m-d H:i:s");

                if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    public function actionCreateAdicional($id)
    {

        $model=new ContenidoAdicional();
        $model->contenido_id = $id;

        if(isset($_POST['ContenidoAdicional']))
        {
            $model->attributes=$_POST['ContenidoAdicional'];

            if($model->validate()){

                if($model->save()){
                    if($model->contenido_adicional_tipo_id == 2){
                        $this->redirect(array('imagenAdicional','id'=>$model->id));
                    }else{
                        $this->redirect(array('viewAdicional','id'=>$model->id));
                    }

                }
            }
        }

        $this->render('createAdicional',array(
            'model'=>$model
        ));
    }
	
	public function actionUpdateAdicional($id){

        $model = ContenidoAdicional::model()->findByPk($id);

        if(isset($_POST['ContenidoAdicional']))
        {
            $model->attributes=$_POST['ContenidoAdicional'];

            if($model->validate()){

                if($model->save()){
                    if($model->contenido_adicional_tipo_id == 2){
                        $this->redirect(array('imagenAdicional','id'=>$model->id));
                    }else{
                        $this->redirect(array('viewAdicional','id'=>$model->id));
                    }

                }
            }
        }

        $this->render('updateAdicional',array(
            'model'=>$model
        ));

    }

    public function actionImagenAdicional($id){
        $model = ContenidoAdicional::model()->findByPk($id);
        $fotos = new ContenidoFoto('search');

        $fotos->unsetAttributes();  // clear any default values
        $fotos->contenido_adicional_id = $id;
        if(isset($_GET['ContenidoAdicional']))
            $model->attributes=$_GET['ContenidoAdicional'];

        $this->render('imagenAdicional',array(
            'model'=>$model,
            'fotos'=>$fotos
        ));
    }

    public function actionImagenAdicionalUpload(){
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $id   = Yii::app()->request->getParam('id');
        $foto = new ContenidoFoto();
        $foto->contenido_adicional_id = $id;

        $folder= Yii::app()->basePath.'/../images/contenidoAdicional/';
        $allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 50 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        $foto->foto =$fileName;
        $foto->insert();


        echo $return;// it's array
    }

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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

    public function actionDeleteAdicional($id)
    {

        $model = ContenidoAdicional::model()->findByPk($id);

        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('adicional'));
    }

    public function actionImagenAdicionalDelete($id)
    {

        $model = ContenidoFoto::model()->findByPk($id);
        $imagen = $model->foto;
        $model->delete();

        if(file_exists(Yii::app()->basePath.'/../images/contenidoAdicional/'.$imagen) && !is_dir(file_exists(Yii::app()->basePath.'/../images/contenidoAdicional/'.$imagen))){
            if($imagen != ''){
                chmod(Yii::app()->basePath.'/../images/contenidoAdicional/'.$imagen,0777);
                unlink(Yii::app()->basePath.'/../images/contenidoAdicional/'.$imagen);
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('adicional'));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Contenido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contenido('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contenido']))
			$model->attributes=$_GET['Contenido'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionAdicional($id)
    {

        $contenido = Contenido::model()->findByPk($id);
        $model=new ContenidoAdicional('search');

        $model->unsetAttributes();  // clear any default values
		$model->contenido_id = $id;
        if(isset($_GET['Contenido']))
            $model->attributes=$_GET['Contenido'];

        $this->render('adicional',array(
            'model'=>$model,
            'contenido'=>$contenido
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contenido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contenido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contenido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contenido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
