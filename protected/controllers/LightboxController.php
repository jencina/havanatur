<?php

class LightboxController extends Controller
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
				'actions'=>array('create','update'),
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
		$model=new Lightbox;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lightbox']))
		{
			$model->attributes=$_POST['Lightbox'];

            $uploadedFile= CUploadedFile::getInstance($model,'imagen');

            if(isset($uploadedFile->name)){
                $fileName    = "{$uploadedFile}";  // random number + file name
                $fileName    = str_replace(" ","_",$fileName);
                if(file_exists(Yii::app()->basePath.'/../images/lightbox/'.$fileName)){
                    $ran=rand(100,999);
                    $fileName =$ran.'_'.$fileName;
                    $model->imagen = $fileName;
                }else{
                    $model->imagen = $fileName;
                }
            }

            if($model->validate()){
                $model->usuario_id         = Yii::app()->user->id;
                $model->fecha_creacion     = date("Y-m-d H:i:s");
                $model->fecha_modificacion = date("Y-m-d H:i:s");
                if($model->save()){
                    if(!empty($model->imagen)):
                        $uploadedFile->saveAs(Yii::app()->basePath.'/../images/lightbox/'.$fileName);
                    endif;
                    $this->redirect(array('view','id'=>$model->id));
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

        $uploadedFile= CUploadedFile::getInstance($model,'imagen');

        if($model){
            $imagen = $model->imagen;
        }

		if(isset($_POST['Lightbox']))
		{
			$model->attributes=$_POST['Lightbox'];
            $model->activo = $_POST['Lightbox']['activo'];

            if(isset($uploadedFile->name)){
                $fileName    = "{$uploadedFile}";  // random number + file name
                $fileName    = str_replace(" ","_",$fileName);

                if(file_exists(Yii::app()->basePath.'/../images/lightbox/'.$fileName)){
                    $ran=rand(100,999);
                    $fileName =$ran.'_'.$fileName;
                    $model->imagen = $fileName;
                }else{
                    $model->imagen = $fileName;
                }
            }else{
                $model->imagen = $imagen;
            }

			if($model->save()){

                if(isset($uploadedFile->name)) {
                    if (!empty($model->imagen)):
                        $uploadedFile->saveAs(Yii::app()->basePath . '/../images/lightbox/' . $fileName);
                    endif;
                }

                $this->redirect(array('view','id'=>$model->id));
            }

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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lightbox');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lightbox('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lightbox']))
			$model->attributes=$_GET['Lightbox'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lightbox the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lightbox::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lightbox $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lightbox-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
