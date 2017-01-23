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
             Yii::app()->controller->menu_activo= 'eventos';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
        public function actionGeneratePdf($id){

            $model     = Evento::model()->findByPk($id);	
            $filename  = $this->string_sanitize($model->even_titulo);
            $path      = Yii::app()->basePath.'/../images/eventos/pdf/';
            if(file_exists($path.$filename.'.pdf')){
                $random   = rand(100,200);
                $filename = $filename.$random;
            }

            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = file_get_contents(Yii::getPathOfAlias('ext.booster.assets.bootstrap.css'). DIRECTORY_SEPARATOR .'bootstrap.min.css');
            $stylesheet2 = file_get_contents(Yii::getPathOfAlias('webroot.css').DIRECTORY_SEPARATOR .'pdf.css');
            $font = file_get_contents(Yii::getPathOfAlias('ext.booster.assets.font-awesome.css'). DIRECTORY_SEPARATOR .'font-awesome.min.css');
            $mPDF1->WriteHTML($stylesheet,1);
            $mPDF1->WriteHTML($stylesheet2,1);
            $mPDF1->WriteHTML($font,1);
            $mPDF1->setFooter('<div style="text-align:center;width:800px;font-weight:0;padding-top:5px;">
                            <p><span style="font-weight:bold;">Havanatur Chile – Operador Mayorista</span> / Padre Mariano 82 Of. 502</p>
                            <p>Tel: (562) 22330844 - 22331381</p>
                            <p>ventas1@havanatur.cl - ventas2@havanatur.cl – ventas3@havanatur.cl - ger.comercial@havanatur.cl </p>
                    </div>');

            $mPDF1->WriteHTML($this->renderPartial('application.views.evento.pdf.pdf_template',
                array('model'     => $model
                ), true));

            $mPDF1->Output($path.$filename.'.pdf', 'F');

            $old = $model->even_pdf;

            $model->even_pdf = $filename.'.pdf';
            $model->update();

            if($old != ''){
                if($old != $model->even_pdf){
                    unlink($path.$old);
                }
            }
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            Yii::app()->controller->menu_activo= 'eventos';
            $model   = new Evento();
            $hoteles = new EventoTarifaHasHotel();
            $tarifa  = new EventoTarifa();

            if(isset($_POST['Evento']))
		{
                    $model->attributes             = $_POST['Evento'];
                    $tarifa->attributes            = $_POST['EventoTarifa'];
                    if(isset($_POST['EventoTarifaHasHotel'])){
                        $hoteles->attributes = $_POST['EventoTarifaHasHotel'];
                    }else{
                        $hoteles->hotel_id  = null;
                    }
                    
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
                    
                    $valid= $model->validate();
                    $valid= $hoteles->validate() && $valid;
                    $valid= $tarifa->validate() && $valid;
        
                    if($valid){
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
                            
                            $tarifa->evento_id = $model->even_id;
                            $tarifa->insert();
                            
                            foreach ($hoteles->hotel_id as $hotel){
                                $h = new EventoTarifaHasHotel();
                                $h->hotel_id = $hotel;
                                $h->evento_tarifa_tar_id = $tarifa->tar_id;
                                $h->insert();
                            }

                            $this->actionGeneratePdf($model->even_id);

                            $this->redirect(array('view','id'=>$model->even_id));
                        }
                    }	
		}

		$this->render('create',array(
			'model'  => $model,
                        'hoteles'=> $hoteles,
                        'tarifa' => $tarifa
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
            $model  = $this->loadModel($id);           
            $tarifa = EventoTarifa::model()->findByAttributes(array('evento_id'=>$model->even_id));

            if(!$tarifa){
               $tarifa = new EventoTarifa();
               $tarifa->evento_id = $model->even_id;
               $tarifa->insert();
            }
            
            $hoteles = new EventoTarifaHasHotel();
            
            $hot = array();
            if(isset($tarifa->hotels)){
                foreach($tarifa->hotels as $h){
                    $hot[] = $h->id;
                }
            }
            
            $hoteles->hotel_id = $hot;

            $titulo = $model->even_imagen; 
            $detail = $model->even_imagen_detail; 
            if(isset($_POST['Evento']))
            {
                $model->attributes             = $_POST['Evento'];
                 $tarifa->attributes            = $_POST['EventoTarifa'];
                    if(isset($_POST['EventoTarifaHasHotel'])){
                        $hoteles->attributes = $_POST['EventoTarifaHasHotel'];
                    }else{
                        $hoteles->hotel_id  = null;
                    }
                    
                
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
                }else{
                     $model->even_imagen = $titulo;
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
                }else{
                     $model->even_imagen_detail = $detail;
                }
                
                $valid= $model->validate();
                $valid= $hoteles->validate() && $valid;
                $valid= $tarifa->validate() && $valid;

                if($valid){
                    if($model->save()){
                        if(isset($uploadedFile->name)):
                            $uploadedFile->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                            $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName);
                            $thumb->adaptiveResize(350,150);
                            $imagen = explode(".", $fileName);
                            $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_350_150.'.$imagen[1]);
                        endif;

                        if(isset($uploadedDetail->name)):
                            $uploadedDetail->saveAs(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                            $thumb=Yii::app()->phpThumb->create(Yii::app()->basePath.'/../images/eventos/'.$fileName2);
                            $thumb->adaptiveResize(450,350);
                            $imagen = explode(".", $fileName2);
                            $thumb->save(Yii::app()->basePath.'/../images/eventos/'.$imagen[0].'_450_350.'.$imagen[1]);
                        endif;
                        
                        $tarifa->update();
                        EventoTarifaHasHotel::model()->deleteAllByAttributes(array('evento_tarifa_tar_id'=>$tarifa->tar_id));
                        
                        foreach ($hoteles->hotel_id as $hotel){
                            $h = new EventoTarifaHasHotel();
                            $h->hotel_id = $hotel;
                            $h->evento_tarifa_tar_id = $tarifa->tar_id;
                            $h->insert();
                        }

                        $this->actionGeneratePdf($model->even_id);
                        $this->redirect(array('view','id'=>$model->even_id));
                    }
                }	
            }

            $this->render('update',array(
                    'model'  => $model,
                    'hoteles'=> $hoteles,
                    'tarifa' => $tarifa
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
