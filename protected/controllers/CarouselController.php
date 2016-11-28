<?php

class CarouselController extends Controller
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
				'actions'=>array('create','update','index','view'),
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
		$model=new Carousel;

		if(isset($_POST['Carousel']))
		{
			$model->attributes=$_POST['Carousel'];

            $uploadedFile= CUploadedFile::getInstance($model,'foto');

            if(isset($uploadedFile->name)){
                $fileName    = "{$uploadedFile}";  // random number + file name
                $fileName    = str_replace(" ","_",$fileName);
                $fileName = $this->sanear_string($fileName);

                if(file_exists(Yii::app()->basePath.'/../images/carousel/'.$fileName)){
                    $ran=rand(100,999);
                    $fileName =$ran.'_'.$fileName;

                    $model->foto = $fileName;
                }else{
                    $model->foto = $fileName;
                }
            }



            if($model->validate()){

                $model->usuario_id = Yii::app()->user->id;
                $model->fecha_creacion = date('Y-m-d H:i:s');
                $model->fecha_modificacion = date('Y-m-d H:i:s');

                if($model->save()){
                    if(!empty($model->foto)):
                        $uploadedFile->saveAs(Yii::app()->basePath.'/../images/carousel/'.$fileName);
                        $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/carousel/'.$fileName);
                        $thumb->adaptiveResize(1024,400);
                        $imagen = explode(".", $fileName);
                        $thumb->save(Yii::app()->basePath.'/../images/carousel/'.$imagen[0].'_1024_400.'.$imagen[1]);
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
		$model = $this->loadModel($id);
        $foto  = $model->foto;

		if(isset($_POST['Carousel']))
		{
			$model->attributes=$_POST['Carousel'];

            $uploadedFile = CUploadedFile::getInstance($model,'foto');

            if(isset($uploadedFile->name)){
                $fileName    = "{$uploadedFile}";  // random number + file name
                $fileName    = str_replace(" ","_",$fileName);

                if(file_exists(Yii::app()->basePath.'/../images/carousel/'.$fileName)){
                    $ran         = rand(100,999);
                    $fileName    = $ran.'_'.$fileName;
                    $model->foto = $fileName;
                }else{
                    $model->foto = $fileName;
                }
            }else{
                $model->foto = $foto;
            }

            if($model->validate()){
                $model->fecha_modificacion = date('Y-m-d H:i:s');
                if($model->update()){

                    if(isset($uploadedFile->name)):
                        $uploadedFile->saveAs(Yii::app()->basePath.'/../images/carousel/'.$fileName);
                        if(file_exists(Yii::app()->basePath.'/../images/carousel/'.$foto) && !is_dir(file_exists(Yii::app()->basePath.'/../images/carousel/'.$foto))){
                            if($foto != ''){
                                unlink(Yii::app()->basePath.'/../images/carousel/'.foto);
                            }
                        }
                    endif;

                    $this->redirect(array('view','id'=>$model->id));
                }
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
		$dataProvider=new CActiveDataProvider('Carousel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Carousel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Carousel']))
			$model->attributes=$_GET['Carousel'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Carousel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Carousel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Carousel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='carousel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
