<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
                            'actions'=>array('LoadComunas'),
                            'users'=>array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                            'actions'=>array('perfil','editar','editarAdicional','inscribirEvento'),
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
	public function actionPerfil()
	{
                $id = Yii::app()->user->id;
		
                $adicional = DatosAdicional::model()->findByAttributes(array('interesado_int_id'=>$id));
                if(!$adicional){
                    $adicional = new DatosAdicional();
                }
                
                $this->render('perfil',array(
			'model'=>$this->loadModel($id),
                        'adicional'=>$adicional
		));
	}
        
        public function actionEditar(){
            $id = Yii::app()->user->id;
            $model = $this->loadModel($id);
            
            if(isset($_POST['Interesado']))
            {
                $model->attributes=$_POST['Interesado'];                
                // validate user input and redirect to the previous page if valid
                if($model->validate()){
                    if($model->update()){
                        $this->redirect(array('user/perfil'));
                    }  
                }
            } 
             
            $this->render('editar',array(
                    'model'=>$model,
            ));
        }
        
        public function actionEditarAdicional(){
            $id = Yii::app()->user->id;
            $model = DatosAdicional::model()->findByAttributes(array('interesado_int_id'=>$id));
            if(!$model){
                $model = new DatosAdicional();
            }
            
            if(isset($_POST['DatosAdicional']))
            {
                $model->attributes=$_POST['DatosAdicional'];                
                $model->ad_fechamodificacion = date("Y-m-d H:i:s");
                if($model->isNewRecord){
                    $model->interesado_int_id = Yii::app()->user->id;
                    $model->ad_fechacreacion = date("Y-m-d H:i:s");
                }
                if($model->save()){
                        $this->redirect(array('user/perfil'));
                }
            } 
             
            $this->render('editarAdicional',array(
                    'model'=>$model,
            ));
        }
        
        public function actionLoadComunas(){
            
           $id = Yii::app()->request->getParam('id');
           
           //CHtml::listData(Comunas::model()->findAll(array('order'=>'nombre ASC'),array("regiones_id"=>$id)),'id', 'nombre')
           $datos = Comunas::model()->findAllByAttributes(array("regiones_id"=>$id),array('order'=>'nombre ASC'));
           
           $data = '<option value="">Seleccione Comuna</option>';
           foreach ($datos as $dato){
               $data .= '<option value ='.$dato->id.'>'.$dato->nombre.'</option>';
           }
           echo CJSON::encode(
                    array(
                        'status'=>'success',
                        'data'=>  $data
                        ));
            exit;            
        }
        
        public function actionInscribirEvento(){
            $id = Yii::app()->request->getParam('id');
            
            $inscrito = DatosAdicional::model()->findAllByAttributes(array('interesado_int_id'=>Yii::app()->user->id));
            
            if($inscrito){
                
                $model = new EventoHasInteresado();
                $model->evento_even_id = $id;
                $model->interesado_int_id = Yii::app()->user->id;
                $model->fecha_creacion = date("Y-m-d H:i:s");
                
                if($model->save()){
                    $count = EventoHasInteresado::model()->countByAttributes(array('evento_even_id'=>$id));
                    echo CJSON::encode(array('status'=>'success','count'=>$count));
                    exit;   
                }else{
                    echo CJSON::encode(array('status'=>'failed','msj'=>$model->getErrors('evento_even_id')[0]));
                    exit;  
                }
                
            }else{
                echo CJSON::encode(array('status'=>'failed','msj'=>"Debe agregar sus datos adicionales en su perfil de usuario" ));
                exit; 
            } 
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Interesado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Interesado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Interesado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Interesado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='interesado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
