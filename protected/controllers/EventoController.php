<?php

class EventoController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','categoriaCreate','categorias','CategoriaUpdate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','inscritos'),
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
             Yii::app()->controller->menu_activo= 'eventos';
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
            Yii::app()->controller->menu_activo= 'eventos';
		$model=new Evento;

		if(isset($_POST['Evento']))
		{
                    $model->attributes             = $_POST['Evento'];
                    $model->even_fechacreacion     = date("Y-m-d H:i:s"); 
                    $model->even_fechamodificacion = date("Y-m-d H:i:s"); 
                    $model->usuario_id             = Yii::app()->user->id;
                    $uploadedFile                  = CUploadedFile::getInstance($model,'even_imagen');
                    $uploadedDetail                = CUploadedFile::getInstance($model,'even_imagen_detail');
                    
                    if(isset($uploadedFile->name)){
                        $fileName    = "{$uploadedFile}";  // random number + file name
                        $fileName    = str_replace(" ","_",$fileName);
                        if(file_exists(Yii::app()->basePath.'/../images/eventos/'.$fileName)){
                            $ran=rand(100,999);
                            $fileName =$ran.'_'.$fileName;
                            $model->even_imagen = $fileName;
                        }else{
                            $model->even_imagen = $fileName;
                        }
                    }
                    
                    if(isset($uploadedDetail->name)){
                        $fileName2    = "{$uploadedDetail}";  // random number + file name
                        $fileName2    = str_replace(" ","_",$fileName2);
                        if(file_exists(Yii::app()->basePath.'/../images/eventos/'.$fileName2)){
                            $ran=rand(100,999);
                            $fileName2 =$ran.'_'.$fileName2;
                            $model->even_imagen_detail = $fileName2;
                        }else{
                            $model->even_imagen_detail = $fileName2;
                        }
                    }
                    
                    if($model->validate()){
                        if($model->save()){
                            if(!empty($model->even_imagen)):
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                                $thumb->adaptiveResize(350,150);
                                $imagen = explode(".", $fileName);
                                $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_350_150.'.$imagen[1]);
                            endif;
                            
                            if(!empty($model->even_imagen_detail)):
                                $uploadedDetail->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                                $thumb->adaptiveResize(450,350);
                                $imagen = explode(".", $fileName2);
                                $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_450_350.'.$imagen[1]);
                            endif;
                            
                            $this->redirect(array('view','id'=>$model->even_id));
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
            Yii::app()->controller->menu_activo= 'eventos';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
                    $model->attributes             = $_POST['Evento'];
                    $model->even_fechacreacion     = date("Y-m-d H:i:s"); 
                    $model->even_fechamodificacion = date("Y-m-d H:i:s"); 
                    $model->usuario_id             = Yii::app()->user->id;
                    $uploadedFile                  = CUploadedFile::getInstance($model,'even_imagen');
                    $uploadedDetail                = CUploadedFile::getInstance($model,'even_imagen_detail');
                    
                    if(isset($uploadedFile->name)){
                        $fileName    = "{$uploadedFile}";  // random number + file name
                        $fileName    = str_replace(" ","_",$fileName);
                        if(file_exists(Yii::app()->basePath.'/../images/eventos/'.$fileName)){
                            $ran=rand(100,999);
                            $fileName =$ran.'_'.$fileName;
                            $model->even_imagen = $fileName;
                        }else{
                            $model->even_imagen = $fileName;
                        }
                    }
                    
                    if(isset($uploadedDetail->name)){
                        $fileName2    = "{$uploadedDetail}";  // random number + file name
                        $fileName2    = str_replace(" ","_",$fileName2);
                        if(file_exists(Yii::app()->basePath.'/../images/eventos/'.$fileName2)){
                            $ran=rand(100,999);
                            $fileName2 =$ran.'_'.$fileName2;
                            $model->even_imagen_detail = $fileName2;
                        }else{
                            $model->even_imagen_detail = $fileName2;
                        }
                    }
                    
                    if($model->validate()){
                        if($model->save()){
                            if(!empty($model->even_imagen)):
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                                $thumb->adaptiveResize(350,150);
                                $imagen = explode(".", $fileName);
                                $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_350_150.'.$imagen[1]);
                            endif;
                            
                            if(!empty($model->even_imagen_detail)):
                                $uploadedDetail->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                                $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                                $thumb->adaptiveResize(450,350);
                                $imagen = explode(".", $fileName2);
                                $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_450_350.'.$imagen[1]);
                            endif;
                            
                            $this->redirect(array('view','id'=>$model->even_id));
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
		$dataProvider=new CActiveDataProvider('Evento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            Yii::app()->controller->menu_activo= 'eventos';
		$model=new Evento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evento']))
			$model->attributes=$_GET['Evento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
        public function actionCategorias()
	{
            Yii::app()->controller->menu_activo= 'eventoscategorias';
		$model=new EventoCategoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EventoCategoria']))
			$model->attributes=$_GET['EventoCategoria'];

		$this->render('categorias',array(
			'model'=>$model,
		));
	}
        
        public function actionCategoriaCreate()
	{
            Yii::app()->controller->menu_activo= 'eventoscategorias';
		$model=new EventoCategoria();

		if(isset($_POST['EventoCategoria']))
		{
                    $model->attributes=$_POST['EventoCategoria'];

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
        
        public function actionCategoriaUpdate($id)
	{
            Yii::app()->controller->menu_activo= 'eventoscategorias';
		$model= EventoCategoria::model()->findbypk($id);

		if(isset($_POST['EventoCategoria']))
		{
                    $model->attributes=$_POST['EventoCategoria'];

                    if($model->validate()){
                        if($model->save()){
                            $this->redirect(array('categorias'));
                        }
                    }	
		}

		$this->render('categoriaUpdate',array(
			'model'=>$model,
		));
	}
        
        public function actionInscritos(){
            Yii::app()->controller->menu_activo= 'eventosinscritos';
            
            $dataProvider=new CActiveDataProvider('Interesado',array(
                    'criteria'=>array(
                        'order'=>'int_fechacreacion DESC'
                    )
                ));

            $this->render('inscritos',array(
                    'dataProvider'=>$dataProvider,
            ));

        }
        
	public function loadModel($id)
	{
		$model=Evento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
}
