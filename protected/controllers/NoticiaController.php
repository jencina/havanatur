<?php

class NoticiaController extends Controller
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
				'actions'=>array('admin','delete','categorias','categoriaCreate'),
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
		$model=new Noticia;

		if(isset($_POST['Noticia']))
		{
                    $model->attributes=$_POST['Noticia'];
                    $model->not_fechacreacion     = date("Y-m-d H:i:s"); 
                    $model->not_fechamodificacion = date("Y-m-d H:i:s"); 
                    $model->usuario_id            = Yii::app()->user->id;
                    $uploadedFile  = CUploadedFile::getInstance($model,'not_imagen');
                    $uploadedDetail= CUploadedFile::getInstance($model,'not_imagen_detail');
                    
                    if(isset($uploadedFile->name)){
                        $fileName    = "{$uploadedFile}";  // random number + file name
                        $fileName    = str_replace(" ","_",$fileName);
                        if(file_exists(Yii::app()->basePath.'/../images/noticias/'.$fileName)){
                            $ran=rand(100,999);
                            $fileName =$ran.'_'.$fileName;
                            $model->not_imagen = $fileName;
                        }else{
                            $model->not_imagen = $fileName;
                        }
                    }
                    
                    if(isset($uploadedDetail->name)){
                        $fileName2    = "{$uploadedDetail}";  // random number + file name
                        $fileName2    = str_replace(" ","_",$fileName2);
                        if(file_exists(Yii::app()->basePath.'/../images/noticias/'.$fileName2)){
                            $ran=rand(100,999);
                            $fileName2 =$ran.'_'.$fileName2;
                            $model->not_imagen_detail = $fileName2;
                        }else{
                            $model->not_imagen_detail = $fileName2;
                        }
                    }
                    
                    if($model->validate()){
                        if($model->save()){
                            if(!empty($model->not_imagen)):
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/noticias/'.$fileName);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/noticias/'.$fileName);
                                $thumb->adaptiveResize(350,150);
                                $imagen = explode(".", $fileName);
                                $thumb->save(Yii::app()->basePath.'/../images/noticias/'.$imagen[0].'_350_150.'.$imagen[1]);
                            endif;
                            
                            if(!empty($model->not_imagen_detail)):
                                $uploadedDetail->saveAs(Yii::app()->basePath.'/../images/noticias/'.$fileName2);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/noticias/'.$fileName2);
                                $thumb->adaptiveResize(450,350);
                                $imagen = explode(".", $fileName2);
                                $thumb->save(Yii::app()->basePath.'/../images/noticias/'.$imagen[0].'_450_350.'.$imagen[1]);
                            endif;
                            
                            $this->redirect(array('view','id'=>$model->not_id));
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

		if(isset($_POST['Noticia']))
		{
			$model->attributes=$_POST['Noticia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->not_id));
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
		$dataProvider=new CActiveDataProvider('Noticia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Noticia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Noticia']))
			$model->attributes=$_GET['Noticia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionCategorias()
	{
		$model=new Categoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Categoria']))
			$model->attributes=$_GET['Categoria'];

		$this->render('categorias',array(
			'model'=>$model,
		));
	}
        
        public function actionCategoriaCreate()
	{
		$model=new Categoria();

		if(isset($_POST['Categoria']))
		{
                    $model->attributes=$_POST['Categoria'];

                    if($model->validate()){
                        if($model->save()){
                            $this->redirect(array('categorias'));
                        }
                    }	
		}

		$this->render('categoriaCreate',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Noticia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Noticia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Noticia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='noticia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
