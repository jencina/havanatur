<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $ca = Carousel::model()->findAll(array('condition'=>'activo = 1 ORDER BY orden ASC'));
        $programaDestacados = Programa::model()->findAllByAttributes(array('destacado'=>1));
        $noticias = Noticia::model()->findAll();
        $eventos   = Evento::model()->findAll();
        
        $carousel = array();
        foreach ($ca as $caro) {
            $imagen = explode(".", $caro->foto);
            $carousel[] =array(
                //'image' => Yii::app()->request->baseUrl.'/images/carousel/'.$caro->foto,
                'div' => '<div style="background-image: url('."'".Yii::app()->request->baseUrl.'/images/carousel/'.$caro->foto."'".')"></div>',
                'label' => $caro->titulo,
                'caption' => $caro->descripcion
            );
        }
		$this->render('index',array(
                    'carousel'          => $carousel,
                    'programaDestacados'=> $programaDestacados,
                    'noticias'          => $noticias,
                    'eventos'           => $eventos
                        ));
	}

    public function actionNuestraEmpresa(){
        Yii::app()->controller->menu_activo= 'nuestraEmpresa';
		
        $id   = Yii::app()->request->getParam('id');
        $model = Contenido::model()->findByPk($id);

        $top    = false;
        $rigth  = false;
        $bottom = false;

        $top_model = '';
        $right_model = '';
        $bottom_model = '';
        if(count($model->contenidoAdicionals)>0){
            foreach ($model->contenidoAdicionals as $adicional) {
                if($adicional->contenido_adicional_posicion_id == 1){ //top
                    $top_model = $adicional;
                    $top = true ;
                }else if($adicional->contenido_adicional_posicion_id == 2){ //right
                    $right_model = $adicional;
                    $rigth = true ;
                }else if($adicional->contenido_adicional_posicion_id == 3){ //bottom
                    $bottom_model = $adicional;
                    $bottom = true ;
                }
            }
        }

        $this->render('contenido',array(
            'model'=>$model,
            'top'=>$top,
            'top_model'=>$top_model,
            'right'=>$rigth,
            'right_model'=>$right_model,
            'bottom'=>$bottom,
            'bottom_model'=>$bottom_model));
    }

    public function actionInformaciones(){
        Yii::app()->controller->menu_activo= 'informaciones';
		
        $id   = Yii::app()->request->getParam('id');
        $model = Contenido::model()->findByPk($id);

        $top    = false;
        $rigth  = false;
        $bottom = false;

        $top_model = '';
        $right_model = '';
        $bottom_model = '';

        if(count($model->contenidoAdicionals)>0){
            foreach ($model->contenidoAdicionals as $adicional) {
                if($adicional->contenido_adicional_posicion_id == 1){ //top
                    $top_model = $adicional;
                    $top = true ;
                }else if($adicional->contenido_adicional_posicion_id == 2){ //right
                    $right_model = $adicional;
                    $rigth = true ;
                }else if($adicional->contenido_adicional_posicion_id == 3){ //bottom
                    $bottom_model = $adicional;
                    $bottom = true ;
                }
            }
        }

        $this->render('contenido',array(
            'model'=>$model,
         'top'=>$top,
            'top_model'=>$top_model,
            'right'=>$rigth,
            'right_model'=>$right_model,
            'bottom'=>$bottom,
            'bottom_model'=>$bottom_model));
    }
	
    public function actionTurismoSalud(){
        Yii::app()->controller->menu_activo= 'turismoSalud';
		
        $id   = Yii::app()->request->getParam('id');
        $model = Contenido::model()->findByPk($id);

        $top    = false;
        $rigth  = false;
        $bottom = false;

        $top_model = '';
        $right_model = '';
        $bottom_model = '';

        if(count($model->contenidoAdicionals)>0){
            foreach ($model->contenidoAdicionals as $adicional) {
                if($adicional->contenido_adicional_posicion_id == 1){ //top
                    $top_model = $adicional;
                    $top = true ;
                }else if($adicional->contenido_adicional_posicion_id == 2){ //right
                    $right_model = $adicional;
                    $rigth = true ;
                }else if($adicional->contenido_adicional_posicion_id == 3){ //bottom
                    $bottom_model = $adicional;
                    $bottom = true ;
                }
            }
        }

        $this->render('contenido',array(
            'model'=>$model,
			'top'=>$top,
            'top_model'=>$top_model,
            'right'=>$rigth,
            'right_model'=>$right_model,
            'bottom'=>$bottom,
            'bottom_model'=>$bottom_model));
    }
	
    public function actionOtros(){
        Yii::app()->controller->menu_activo= 'otros';
		
        $id   = Yii::app()->request->getParam('id');
        $model = Contenido::model()->findByPk($id);

        $top    = false;
        $rigth  = false;
        $bottom = false;

        $top_model = '';
        $right_model = '';
        $bottom_model = '';

        if(count($model->contenidoAdicionals)>0){
            foreach ($model->contenidoAdicionals as $adicional) {
                if($adicional->contenido_adicional_posicion_id == 1){ //top
                    $top_model = $adicional;
                    $top = true ;
                }else if($adicional->contenido_adicional_posicion_id == 2){ //right
                    $right_model = $adicional;
                    $rigth = true ;
                }else if($adicional->contenido_adicional_posicion_id == 3){ //bottom
                    $bottom_model = $adicional;
                    $bottom = true ;
                }
            }
        }

        $this->render('contenido',array(
            'model'=>$model,
			'top'=>$top,
            'top_model'=>$top_model,
            'right'=>$rigth,
            'right_model'=>$right_model,
            'bottom'=>$bottom,
            'bottom_model'=>$bottom_model));
    }

    public function actionPrograma()
    {
        Yii::app()->controller->menu_activo= 'programa';
		
        $id   = Yii::app()->request->getParam('id');

        $model = Programa::model()->findByPK($id);
		$condiciones = Condiciones::model()->findAll();

        $imagenes = array();
        foreach($model->programaImagens as $imagen){
           $imagenes[] = array(
                //'image' => Yii::app()->request->baseUrl.'/images/programa/'.$imagen->imagen
				'div' => '<div style="height:400px;background-image: url('."'".Yii::app()->request->baseUrl.'/images/programa/'.$imagen->imagen."'".')"></div>',
            );
        }

        $criteria=new CDbCriteria();
        $criteria->params = array(':id'=>$id);
        $criteria->condition = 'programa_id=:id';

        $dataProvider = new CActiveDataProvider('ProgramaCombinacion', array(
            'pagination'=>array(
                'pageSize'=>5,
            ),
            'criteria'=>$criteria,
        ));
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('programa',array('model'=>$model,'imagenes'=>$imagenes,'combi'=>$dataProvider,'condiciones'=>$condiciones));
    }

    public function actionGetCombinacion(){

        $id   = Yii::app()->request->getParam('id');

        $model = ProgramaCombinacion::model()->findByPk($id);

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('combi',array('model'=>$model),true)
        ));
        exit;
    }

    public function actionCotizar(){
        $id   = Yii::app()->request->getParam('id');
        $cotizacion = new Cotizacion();
        $cotizacion->programa_combinacion_vigencia_id = $id;

        if(isset($_POST['Cotizacion'])){
            $cotizacion->attributes = $_POST['Cotizacion'];

            if($cotizacion->validate()){
                $cotizacion->respondido = 0;
                $cotizacion->fecha_creacion = date("Y-m-d H:i:s");
                if($cotizacion->save()){

                    $subject  = 'Cotizacion Havanatur';
                    $to       = 'ger.general@havanatur.cl,ger.comercial@havanatur.cl';
                    $titulo2  = 'Cotizacion';
                    $cuerpo   = '<b>Estimado Usuario:</b> <br>';
                    $cuerpo  .= 'cuerpo';
                    $html     = $this->bodyEmail($titulo2,$cotizacion);
                    $this->sendMail($to,$subject,$html,$cotizacion->email);

                    header("Content-type: application/json");
                    echo CJSON::encode(array(
                        'status'=>'success',
                        'div'=>'Cotizacion enviada con exito!'
                    ));
                    exit;
                }
            }
        }

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'status'=>'load',
            'div'=>$this->renderPartial('cotizacion',array('cotizacion'=>$cotizacion),true)
        ));
        exit;
    }

    public function actionEquipo(){
		Yii::app()->controller->menu_activo = 'nuestraEmpresa';

        $gerencia  = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>1));
        $ventas    = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>2));
        $marketing = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>3));
        $operaciones = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>4));
        $contabilidad = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>5));
		$admin 	    	= Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>6));
		$asistente = Equipo::model()->findAllByAttributes(array('equipo_tipo_id'=>7));

        $this->render('equipo',array(
            'gerencia'=>$gerencia,
            'ventas'=>$ventas,
            'marketing'=>$marketing,
            'operaciones'=>$operaciones,
            'contabilidad'=> $contabilidad,
			'admin'=> $admin,
			'asistente'=> $asistente
        ));
    }


    public function actionEmpresa(){
        $this->render('empresa');
    }

    /**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
            if(!Yii::app()->user->isGuest){
               $this->layout='//layouts/admin';
            }
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
            $model=new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                    $model->attributes=$_POST['LoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login())
                            $this->redirect(Yii::app()->user->returnUrl);
            }
            // display the login form
            $this->render('login',array('model'=>$model));
	}
	
	
	public function obtenerIndicadores($date){
		
        //$indicadores = $this->General_model->findAllByPk('par_indicadoresFinancieros',$date,'ind_fecha');
        $indicadores = SbifRecursos::model()->findAllByAttributes(array('sbif_fecha'=>$date));
       
        if(count($indicadores)==5){
            $dato = array();
            foreach ($indicadores as $indicador){
                
                switch ($indicador->sbif_recurso){
                    case 'utm':
                        $fecha = date("Y-m",  strtotime($indicador->sbif_fecha));
                        break;
                    case 'ipc':
                        $fecha = date("Y-m", strtotime('-1 month',strtotime($indicador->sbif_fecha)));
                        break;
                    default :
                        $fecha = $indicador->sbif_fecha;
                        break;
                }
                
                $dato[$indicador->sbif_recurso] = array(
                    'ind_valor'=>$indicador->sbif_valor,
                    'sbif_fecha'=>$fecha,
                );
            }
            return $dato;
            //echo json_encode($dato);
            //exit;
        }else{
            $anio = date("Y", strtotime($date));
            $mes  = date("m", strtotime($date));
            $dia  = date("d", strtotime($date));
            
            $tipos = array('dolar','euro','uf','utm','ipc');
            $dato = array();
            SbifRecursos::model()->deleteAll();
            foreach ($tipos as $tipo){
                if($tipo == 'ipc'){
                    $mes  = date("m", strtotime('-1 month',strtotime($date)));
                }
                $result = $this->getSbifRecurso($tipo, $anio, $mes, $dia);
                $result['ind_fecha'] = $date;
				
                $dato[$tipo] = $result;
                $ind = new SbifRecursos();
                $ind->sbif_valor = $result['ind_valor'];
                $ind->sbif_recurso = $result['ind_tipo'];
                $ind->sbif_vigencia = $result['ind_vigencia'];
                $ind->sbif_fecha = $result['ind_fecha'];
                $ind->insert();
            }

            return $dato;
            //echo json_encode($dato);
        }
    }
    
	
    public function actionGetIndicadoresHome(){
        
        $date = date("Y-m-d");
       
        $dato = $this->obtenerIndicadores($date);
         	
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'status'=>'success',
            'div'=>$this->renderPartial('sbif_indicadores',array('data'=>$dato),true)
        ));
        exit;
    }
	
    function getSbifRecurso($recurso,$anio,$mes,$dia) {
        $tuCurl = curl_init();
        if($recurso == 'utm' || $recurso == 'ipc'){
            curl_setopt($tuCurl, CURLOPT_URL, "http://api.sbif.cl/api-sbifv3/recursos_api/{$recurso}/{$anio}/{$mes}?apikey=185102d489e7c2c9e9be8b2ba890044eee89e98c&formato=json");
        }else{
            if(date("D") == 'Sun'){
                $dia = date("d",strtotime ( '-2 day' , strtotime (date("Y-m-d")))) ;  
            }else if(date("D") == 'Sat'){
                $dia = date("d",strtotime ( '-1 day' , strtotime (date("Y-m-d")))) ; 
            }
            curl_setopt($tuCurl, CURLOPT_URL, "http://api.sbif.cl/api-sbifv3/recursos_api/{$recurso}/{$anio}/{$mes}/dias/{$dia}?apikey=185102d489e7c2c9e9be8b2ba890044eee89e98c&formato=json");
        }
        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, true);
        $tuData = curl_exec($tuCurl);

        curl_close($tuCurl);

        $dolar = json_decode($tuData);

        switch($recurso){
            case 'dolar':
                $vigencia ='d';
                $dolar = (isset($dolar->Dolares[0]))?$dolar->Dolares[0]->Valor:0;
                break;
            case 'euro':
                $vigencia ='d';
                $dolar = (isset($dolar->Euros[0]))?$dolar->Euros[0]->Valor:0;
                break;
            case 'uf':
                $vigencia ='d';
                $dolar = (isset($dolar->UFs[0]))?$dolar->UFs[0]->Valor:0;
                break;
            case 'utm':
                $vigencia ='m';
                $dolar = $dolar->UTMs[0]->Valor;
                break;
            case 'ipc':
                $vigencia ='m';
                $dolar = $dolar->IPCs[0]->Valor;
                break;
        }
               
        $data = array(
            'ind_tipo'  => $recurso,
            'ind_valor' => floatval(str_replace(',', '.',  str_replace('.','',$dolar))),
            'ind_vigencia'=> $vigencia 
        );
                
        return $data;
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
    }
        
    public function actionNoticias(){

        $this->layout='//layouts/main-eventos';

        Yii::app()->controller->menu_activo= 'eventos';

        $categorias = Categoria::model()->findAll();

        $criteria = new CDbCriteria();

        if(isset($_GET['id'])){
            if($_GET['id'] != 0){
                $criteria->addCondition('categoria_cat_id = '.$_GET['id']);
            }
        }

        $dataProvider=new CActiveDataProvider('Noticia', array(
            'criteria'=>$criteria
        ));

        $this->render('noticias',array('dataProvider'=>$dataProvider,'categorias'=>$categorias));

    }
        
    public function actionNoticiaDetalle(){
        $this->layout='//layouts/main-eventos';
        Yii::app()->controller->menu_activo= 'eventos';

        $id   = Yii::app()->request->getParam('id');

        $noticia = Noticia::model()->findByPk($id);
        
        $criteria= new CDbCriteria();
        $criteria->condition = 'categoria_cat_id='.$noticia->categoria_cat_id;
        $criteria->limit     = 3;

        $otros   = Noticia::model()->findAll($criteria);
        
        $this->render('noticiaDetalle',array('noticia'=>$noticia,'otros'=>$otros));
    }
    
    public function actionEventos(){

        $this->layout='//layouts/main-eventos';

        Yii::app()->controller->menu_activo= 'eventos';
        $id   = Yii::app()->request->getParam('id');
         
        $criteria = new CDbCriteria();
        $criteria->addCondition('even_cat_id = '.$id);

        $dataProvider=new CActiveDataProvider('Evento', array(
            'criteria'=>$criteria
        ));
        
        $categoria = EventoCategoria::model()->findByPk($id);

        $this->render('eventos',array('dataProvider'=>$dataProvider,'categoria'=>$categoria));

    }
    
    public function actionEventoDetalle(){
        $this->layout='//layouts/main-eventos';
        Yii::app()->controller->menu_activo= 'eventos';

        $id   = Yii::app()->request->getParam('id');
        $model = new Interesado();

        $evento = Evento::model()->findByPk($id);
        $categorias = EventoCategoria::model()->findAll();

        $this->render('eventoDetalle',array('evento'=>$evento,'categorias'=>$categorias,'model'=>$model));
    }
    
    public function actionSetInteresado(){
        
        $id     = Yii::app()->request->getParam('id');
        $model  = new Interesado();
        $evento = Evento::model()->findByPk($id);
        if(isset($_POST['Interesado'])){
            $model->attributes = $_POST['Interesado'];
            $model->int_even_id = $id;
            $model->int_fechacreacion = date("Y-m-d H:i:s");
            if($model->validate()){
                
                if($model->save()){
                    $subject  = 'Inscripion Evento Havanatur';
                    //$to       = 'ger.general@havanatur.cl,ger.comercial@havanatur.cl';
                    $to       = 'jonny.encina@gmail.com';
                    $titulo2  = 'Inscripcion';
                    $cuerpo   = '<b>Estimado Usuario:</b> <br>';
                    //$cuerpo  .= 'cuerpo';
                    $html     = $this->bodyEmailInteresado($titulo2,$model);
                    $this->sendMail($to,$subject,$html,$model->int_email);
                    
                    header("Content-type: application/json");
                    echo json_encode('<div class="alert alert-success fade in alert-block">
                            <h4 class="alert-heading">Inscripcion Realizada!</h4>
                                Su inscripcion ha sido realizada con exito!<br>
                                nos pondremos en contacto con usted a la brevedad.
                            </div>');
                    exit;
                }
            }
            
            return $this->renderPartial('_interesadoForm',array('model'=>$model,'evento'=>$evento));
            exit;
           
        }   
    }
    
    public function actionIngresar()
	{
            $this->layout='//layouts/main-eventos';
            $model=new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                $model->type = 'web';                  
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                        $this->redirect(array('site/index'));
            }
            // display the login form
            $this->render('ingresar',array('model'=>$model));
	}
       
    public function actionRegistrar(){
        
        $model = new Interesado();
        
        if(isset($_POST['Interesado']))
        {
            $model->attributes=$_POST['Interesado'];                
            // validate user input and redirect to the previous page if valid
            if($model->validate()){
                $model->int_activo        = 0;
                $model->int_fechacreacion = date('Y-m-d H:i:s');
                $model->int_password      = md5($model->int_password);
                
                if($model->insert()){
                    
                    $subject  = 'Registro Havanatur';
                    //$to     = 'ger.general@havanatur.cl,ger.comercial@havanatur.cl';
                    $to       = $model->int_email;
                    $titulo2  = 'Registro';
                    $cuerpo   = '<b>Estimado Usuario:</b> <br>';
                    
                    $model->int_codigo = md5($model->int_email.'_registro'.$model->int_id);
                    $model->update();
                    
                    $link     = Yii::app()->request->hostInfo.Yii::app()->createUrl('user/activateUser',array('cod'=>$model->int_codigo,'codigo'=>$model->int_id));
                    $html     = $this->bodyEmailRegistro($titulo2,$model,$link);
                    if($this->sendMail($to,$subject,$html,$model->int_email)){
                        header("Content-type: application/json");
                        echo CJSON::encode(array(
                            'status'=>'success',
                            'data'  => '<div class="alert alert-success" role="alert">
                                        <strong>Usuario registrado con exito!</strong>
                                         Te estamos redirigiendo hacia el login.
                                        </div>'
                            ));
                        exit;
                    }else{
                         header("Content-type: application/json");
                        echo CJSON::encode(array(
                            'status'=>'success',
                            'data'  => '<div class="alert alert-danger" role="alert">
                                        <strong>Usuario registrado con exito!</strong>
                                         error al enviar email, contactar al administrador
                                        </div>'
                            ));
                        exit;
                    }
                    
                    
                }  
            }
            
            header("Content-type: application/json");
            echo CJSON::encode(
                    array(
                        'status'=>'failed',
                        'data'=>$this->renderPartial('application.views.user.registrar',array('model'=>$model),true)
                        ));
            exit;
        }        
                
        $this->render('application.views.user.registrar',array('model'=>$model));
    }
    
}