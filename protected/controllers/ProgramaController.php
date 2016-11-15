<?php

class ProgramaController extends Controller
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
				'actions'=>array('create','update','fotos','UploadFoto','FotoDelete','caracteristicas'
                ,'combinaciones','addCombinacion','setHotel','combinacionDelete','tarifas','generatePdf',
                'openIncluye','saveIncluye','deleteIncluye','openNoIncluye','saveNoIncluye','deleteNoIncluye'
                ,'openSuplemento','saveSuplemento','deleteSuplemento','setCiudad','getPDF','deleteTarifa','editarTarifa','editCombinacion'),
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

    public function actionGetPdf(){
        $id   = Yii::app()->request->getParam('id');
        $model = Programa::model()->findByPk($id);
        $incluye = ProgramaIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $noIncluye = ProgramaNoIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $suplemento = ProgramaSuplementoAereo::model()->findAllByAttributes(array('programa_id'=>$id));

        $combi=new ProgramaCombinacion('search');
        $combi->unsetAttributes();  // clear any default values
        $combi->programa_id = $id;

        $this->render('application.views.programa.pdf2.programa_pdf',
            array('model'=> $model,
                'incluye'=> $incluye,
                'combi' => $combi,
                'noIncluye'=>$noIncluye,
                'suplemento'=>$suplemento
            ));
    }

    public function actionGeneratePdf($id){

        //$id       = Yii::app()->request->getParam('id');
        $model      = Programa::model()->findByPk($id);
        $incluye    = ProgramaIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $noIncluye  = ProgramaNoIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $suplemento = ProgramaSuplementoAereo::model()->findAllByAttributes(array('programa_id'=>$id));
		$condiciones = Condiciones::model()->findAll();

        /*$combi=new ProgramaCombinacion('search');
        $combi->unsetAttributes();  // clear any default values
        $combi->programa_id = $id;*/
		
		 $combi = ProgramaCombinacion::model()->findAllByAttributes(array('programa_id'=>$id));

        $filename = $this->string_sanitize($model->nombre);
        if(file_exists(Yii::app()->basePath.'/../images/pdf/'.$filename.'.pdf')){
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
        //$mPDF1->SetHTMLHeader('<div class="header"><span class="direccion">http://23kycorp.com/</span></div>');
        $mPDF1->setFooter('<div style="text-align:center;width:800px;font-weight:0;padding-top:5px;">
								<p><span style="font-weight:bold;">Havanatur Chile – Operador Mayorista</span> / Padre Mariano 82 Of. 502</p>
								<p>Tel: (562) 22330844 - 22331381</p>
								<p>ventas1@havanatur.cl - ventas2@havanatur.cl – ventas3@havanatur.cl - ger.comercial@havanatur.cl </p>
							</div>');

        $mPDF1->WriteHTML($this->renderPartial('application.views.programa.pdf2.programa_pdf',
            array('model'     => $model,
                  'incluye'   => $incluye,
                  'combi'     => $combi,
                  'noIncluye' => $noIncluye,
                  'suplemento'=> $suplemento,
				  'condiciones'=>$condiciones
            ), true));

        $mPDF1->Output(Yii::app()->basePath.'/../images/pdf/'.$filename.'.pdf', 'F');

        $old = $model->pdf;

        $model->pdf = $filename.'.pdf';
        $model->update();

        if($old != ''){
            if($old != $model->pdf){
                unlink(Yii::app()->basePath.'/../images/pdf/'.$old);
            }
        }
		
		/*
		$pdf = Yii::app()->basePath.'/../images/pdf/'.$filename.'.pdf';
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="'.$pdf.'"');
		readfile($pdf);*/
    }

    public function actionTarifas(){
        $id   = Yii::app()->request->getParam('id');

        $combi    = ProgramaCombinacion::model()->findByPk($id);
        $vigencia = new ProgramaCombinacionVigencia();

        $tarifa = New Tarifa();
        //$tarifa->nombre = 'default';
        $tarifas   = array();
        $tarifas[] = $tarifa;

        foreach($combi->hotels as $hotel){
            $tarifa = new Tarifa();
            $tarifa->nombre = $hotel->ciudad->codigo;
            $tarifas[] = $tarifa;
        }

        if(isset($_POST['ProgramaCombinacionVigencia'])){

            $vigencia->attributes = $_POST['ProgramaCombinacionVigencia'];
			$vigencia->comentario = $_POST['ProgramaCombinacionVigencia']['comentario'];
			
            $error = false;
            if(isset($_POST['Tarifa'])){
                foreach($_POST['Tarifa']  as $index=>$tarifa){

                    $int = new Tarifa();
                    $int->attributes = $tarifa;
                    $int->validate();
                    $tarifas[$index] = $int;
                    if(count($int->getErrors())>0){
                        $error = true;
                    }
                }
            }

            if($vigencia->validate() && $error == false){
                $vigencia->programa_combinacion_id= $id;
                $vigencia->save();

				$menorCombi = 0;
                foreach($tarifas as $tarifa){
					
                    $tarifa->programa_combinacion_vigencia_id = $vigencia->id;
                    $tarifa->insert();
					
					
					if($tarifa->nombre == ''){
						if($menorCombi == 0 ){
							$menorCombi = $tarifa->dbl;
						}else{
							if($tarifa->dbl < $menorCombi){
								$menorCombi = $tarifa->dbl;
							}
						}
					}
                }

                /* Actualiar Precio desde Combinacion */

                $menor = 0;
				foreach($combi->programa->programaCombinacions as $combinacion){
					foreach($combinacion->programaCombinacionVigencias as $vigencias){
						foreach($vigencias->tarifas as $tarifa){
							if($tarifa->nombre == ''){
								if($menor == 0 ){
									$menor = $tarifa->dbl;
								}else{
									if($tarifa->dbl < $menor){
										$menor = $tarifa->dbl;
									}
								}
							}
						}
					}
				}

                $combi->precio_desde = $menorCombi;
                $combi->update();

                $programa = Programa::model()->findByPk($combi->programa_id);
                $programa->precio_desde = $menor;
                $programa->update();

                $this->actionGeneratePdf($programa->id);

                /*fin Precio desde Combinacion*/

                Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

                header("Content-type: application/json");
                echo CJSON::encode(array(
                    'status'=> 'success',
                    'div'   => $this->renderPartial('_tarifa',array('vigencia'=>$vigencia),true,true),
                    'id'=>$id,
                    'message'=>'Guardado con Exito'
                ));
                exit;
            }
        }

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'status'=>'false',
            'div'=>$this->renderPartial('_formTarifa',array('combi'=>$combi,'tarifas'=>$tarifas,'vigencia'=>$vigencia,'id'=>$id),true,true)
        ));
        exit;
    }
	
	 public function actionEditarTarifa(){
		
		$id   = Yii::app()->request->getParam('id');
        $vigencia = ProgramaCombinacionVigencia::model()->findByPk($id);		
        $combi    = ProgramaCombinacion::model()->findByPk($vigencia->programa_combinacion_id);

        $tarifas = $vigencia->tarifas;

        if(isset($_POST['ProgramaCombinacionVigencia'])){

            $vigencia->attributes = $_POST['ProgramaCombinacionVigencia'];
			$vigencia->comentario = $_POST['ProgramaCombinacionVigencia']['comentario'];
			
            $error = false;
            if(isset($_POST['Tarifa'])){
                foreach($_POST['Tarifa']  as $index=>$tarifa){

                    $int = Tarifa::model()->findByPk($tarifa['id']);
                    $int->attributes = $tarifa;
                    $int->validate();
                    $tarifas[$index] = $int;
                    if(count($int->getErrors())>0){
                        $error = true;
                    }
                }
            }

            if($vigencia->validate() && $error == false){
			
                $vigencia->save();

				
                foreach($tarifas as $tarifa){
					
                    $tarifa->programa_combinacion_vigencia_id = $vigencia->id;
                    $tarifa->save();

                }

                /* Actualiar Precio desde Combinacion */
				
				$menorCombi = 0;
				foreach($combi->programaCombinacionVigencias as $vigencias){
					foreach($vigencias->tarifas as $tarifa){
						if($tarifa->nombre == ''){
							if($menorCombi == 0 ){
								$menorCombi = $tarifa->dbl;
							}else{
								if($tarifa->dbl < $menorCombi){
									$menorCombi = $tarifa->dbl;
								}
							}
						}
					}
				}
				

                $menor = 0;
				foreach($combi->programa->programaCombinacions as $combinacion){
					foreach($combinacion->programaCombinacionVigencias as $vigencias){
						foreach($vigencias->tarifas as $tarifa){
							if($tarifa->nombre == ''){
								if($menor == 0 ){
									$menor = $tarifa->dbl;
								}else{
									if($tarifa->dbl < $menor){
										$menor = $tarifa->dbl;
									}
								}
							}
						}
					}
				}
                

                $combi->precio_desde = $menorCombi;
                $combi->update();

                $programa = Programa::model()->findByPk($combi->programa_id);
                $programa->precio_desde = $menor;
                $programa->update();

                $this->actionGeneratePdf($programa->id);

                /*fin Precio desde Combinacion*/

                Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

                header("Content-type: application/json");
                echo CJSON::encode(array(
                    'status'=> 'success',
                    'div'   => $this->renderPartial('_tarifa',array('vigencia'=>$vigencia),true,true),
                    'id'=>$id,
                    'message'=>'Guardado con Exito'
                ));
                exit;
            }
        }

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'status'=>'false',
            'div'=>$this->renderPartial('_formTarifa',array('combi'=>$combi,'tarifas'=>$tarifas,'vigencia'=>$vigencia,'id'=>$id),true,true)
        ));
        exit;
    }

    public function actionDeleteTarifa(){
        $id   = Yii::app()->request->getParam('id');
        $vigencia = ProgramaCombinacionVigencia::model()->findByPk($id);
        $combi    = ProgramaCombinacion::model()->findByPk($vigencia->programa_combinacion_id);

        $vigencia->delete();
        /* Actualiar Precio desde Combinacion */

        $menor = 0;
        foreach($combi->programaCombinacionVigencias as $vigencias){
            foreach($vigencias->tarifas as $tarifa){
                if($tarifa->nombre == ''){
                    if($menor == 0 ){
                        $menor = $tarifa->sgl;
                    }else{
                        if($tarifa->sgl < $menor){
                            $menor = $tarifa->sgl;
                        }
                    }
                }
            }
        }

        $combi->precio_desde = $menor;
        $combi->update();

        $programa = Programa::model()->findByPk($combi->programa_id);
        $programa->precio_desde = $menor;
        $programa->update();

        $this->actionGeneratePdf($programa->id);

        /*fin Precio desde Combinacion*/

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'status'=>'success',
            'id'=>$id
        ));
        exit;
    }

    public function actionCombinaciones(){
        $id    = Yii::app()->request->getParam('id');
        $model = Programa::model()->findByPk($id);

        $combi = new ProgramaCombinacion('search');
        $combi->unsetAttributes();  // clear any default values
        $combi->programa_id = $id;
        if(isset($_GET['ProgramaCombinacion']))
            $model->attributes=$_GET['ProgramaCombinacion'];

        $this->render('combinaciones',array('model'=>$model,'combi'=>$combi));
    }

    public function actionAddCombinacion(){

        $id     = Yii::app()->request->getParam('id');
        $model  = Programa::model()->findByPk($id);
        $combi  = new ProgramaCombinacion();
        $ciudad = ProgramaHasCiudad::model()->findAllByAttributes(array('programa_id'=>$id));

        $ciudades = array();



        foreach($ciudad as $ci){
            $hotel = new ProgramaCombinacionHasHotel();
            $ciudades[] = array(
                             'ciudad'=>$ci->ciudad_id,
                             'hotel' =>$hotel
                            );
        }

        if(isset($_POST['ProgramaCombinacion'])){

            $combi->attributes = $_POST['ProgramaCombinacion'];
            $combi->programa_id = $id;

            $error = false;
            if(isset($_POST['Hotel'])){
                foreach($_POST['Hotel']  as $index=>$hotel){

                    $int = new ProgramaCombinacionHasHotel();
                    $int->attributes = $hotel;
                    $int->validate();
                    $ciudades[$index] = array(
                             'ciudad'=>$hotel['ciudad_id'],
                             'hotel' =>$int
                    );
                    if(count($int->getErrors())>0){
                        $error = true;
                    }
                }
            }

            if($combi->validate() && $error == false){
                if($combi->save()){

                    foreach($ciudades as $ciudad){
                        $hotel = $ciudad['hotel'];
                        $hotel->programa_combinacion_id = $combi->id;
                        $hotel->save();
                    }

                    $this->redirect(array('combinaciones','id'=>$id));
                }
            }
        }


        $this->render('createCombinacion',array(
            'model'     => $model,
            'combi'     => $combi,
            //'hoteles'   => $hoteles,
            'ciudades'  => $ciudades
        ));
    }
	
	public function actionEditCombinacion(){

        $id     = Yii::app()->request->getParam('id');
        $combi  = ProgramaCombinacion::model()->findByPk($id);
       

        if(isset($_POST['ProgramaCombinacion'])){

            $combi->attributes = $_POST['ProgramaCombinacion'];
            //$combi->programa_id = $id;

            $error = false;

            if($combi->validate()){
                if($combi->save()){

                    $this->redirect(array('combinaciones','id'=>$combi->programa_id));
                }
            }
        }

        $this->render('editCombinacion',array(
            'combi'     => $combi,
        ));
    }

    public function actionSetHotel()
    {
        require_once Yii::app()->basePath . '/extensions/booster/widgets/TbActiveForm.php';
        $hotel = new ProgramaCombinacionHasHotel();
        $form  = new TbActiveForm();
        $i     = Yii::app()->request->getParam('i');
        $i++;

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'div'=>$this->renderPartial('_hotel',array('hotel'=>$hotel,'i'=>$i,'form'=>$form),true,true)
        ));
        exit;
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

    public function actionCaracteristicas($id)
    {
        $incluye    = ProgramaIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $noIncluye  = ProgramaNoIncluye::model()->findAllByAttributes(array('programa_id'=>$id));
        $suplemento = ProgramaSuplementoAereo::model()->findAllByAttributes(array('programa_id'=>$id));

        $this->render('caracteristicas',array(
            'model'=>$this->loadModel($id),
            'incluye'=>$incluye,
            'noIncluye'=>$noIncluye,
            'suplemento'=>$suplemento
        ));
    }

    /* PROGRAMA INCLUYE*/

    public function actionSaveIncluye(){

        if(isset($_POST['ProgramaIncluye'])){

            $id         = Yii::app()->request->getParam('id');
            $programa         = $_POST['programa'];
            $msj = '';

            if(empty($id)){
                $model = new ProgramaIncluye();
                $model->attributes = $_POST['ProgramaIncluye'];
                $model->programa_id = $programa;
                $msj = 'insert';
            }else{
                $model = ProgramaIncluye::model()->findByPk($id);
                $model->attributes = $_POST['ProgramaIncluye'];
                $msj = 'update';
            }

            if($model->validate()){
                if($model->save()){

                    $link =  '<li id="li-'.$model->id.'" class="list-group-item list-group-item-success">';
                    $link .= '<i class="fa fa-check-square-o"></i>'.$model->nombre;
                    $link .= '<div class="action">';
                    $link .=  CHtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openIncluye({$model->id})"));
                    $link .=  Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteIncluye({$model->id})"));
                    $link .=  '</div>';
                    $link .=  '</li>';

                    header("Content-type: application/json");
                    echo CJSON::encode(array(
                        'result'=> $msj,
                        'link'  => $link,
                        'id'    => $model->id,
                        'data'  => $model->nombre
                    ));
                    exit;
                }
            }
        }
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formIncluye',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    public function actionOpenIncluye(){

        $id   = Yii::app()->request->getParam('id');
        $programa   = Yii::app()->request->getParam('programa');

        if(empty($id)){
            $model = new ProgramaIncluye();

        }else{
            $model = ProgramaIncluye::model()->findByPk($id);
            $programa = $model->programa_id;
        }

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formIncluye',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    function actionDeleteIncluye(){
        $id       = Yii::app()->request->getParam('id');
        $programa = ProgramaIncluye::model()->findByPk($id);
        $programa->delete();

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'id'=>$id,
            'result'=>'save'
        ));
        exit;
    }

    /* FIN PROGRAMA INCLUYE*/

    /* PROGRAMA NO INCLUYE*/

    public function actionSaveNoIncluye(){

        if(isset($_POST['ProgramaNoIncluye'])){

            $id         = Yii::app()->request->getParam('id');
            $programa   = $_POST['programa'];
            $msj = '';

            if(empty($id)){
                $model = new ProgramaNoIncluye();
                $model->attributes = $_POST['ProgramaNoIncluye'];
                $model->programa_id = $programa;
                $msj = 'insert';
            }else{
                $model = ProgramaNoIncluye::model()->findByPk($id);
                $model->attributes = $_POST['ProgramaNoIncluye'];
                $msj = 'update';
            }

            if($model->validate()){
                if($model->save()){

                    $link =  '<li id="li-'.$model->id.'" class="list-group-item list-group-item-danger">';
                    $link .= '<i class="fa fa-check-square-o"></i>'.$model->nombre;
                    $link .= '<div class="action">';
                    $link .=  CHtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openNoIncluye({$model->id})"));
                    $link .=  Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteNoIncluye({$model->id})"));
                    $link .=  '</div>';
                    $link .=  '</li>';

                    header("Content-type: application/json");
                    echo CJSON::encode(array(
                        'result'=> $msj,
                        'link'  => $link,
                        'id'    => $model->id,
                        'data'  => $model->nombre
                    ));
                    exit;
                }
            }
        }
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formNoIncluye',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    public function actionOpenNOIncluye(){

        $id   = Yii::app()->request->getParam('id');
        $programa   = Yii::app()->request->getParam('programa');

        if(empty($id)){
            $model = new ProgramaNoIncluye();

        }else{
            $model = ProgramaNoIncluye::model()->findByPk($id);
            $programa = $model->programa_id;
        }

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formNoIncluye',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    function actionDeleteNoIncluye(){
        $id       = Yii::app()->request->getParam('id');
        $programa = ProgramaNoIncluye::model()->findByPk($id);
        $programa->delete();

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'id'=>$id,
            'result'=>'save'
        ));
        exit;
    }

    /* FIN PROGRAMA NO INCLUYE*/


    /* PROGRAMA SUPLEMENTO AEREO*/

    public function actionSaveSuplemento(){

        if(isset($_POST['ProgramaSuplementoAereo'])){

            $id         = Yii::app()->request->getParam('id');
            $programa   = $_POST['programa'];
            $msj = '';

            if(empty($id)){
                $model = new ProgramaSuplementoAereo();
                $model->attributes = $_POST['ProgramaSuplementoAereo'];
                $model->programa_id = $programa;
                $msj = 'insert';
            }else{
                $model = ProgramaSuplementoAereo::model()->findByPk($id);
                $model->attributes = $_POST['ProgramaSuplementoAereo'];
                $msj = 'update';
            }

            if($model->validate()){
                if($model->save()){

                    $link =  '<li id="li-'.$model->id.'" class="list-group-item list-group-item-info">';
                    $link .= '<i class="fa fa-plane"></i>CLASE '.$model->clase.' USD '.$model->usd;
                    $link .= '<div class="action">';
                    $link .=  CHtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openSuplemento({$model->id})"));
                    $link .=  Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteSuplemento({$model->id})"));
                    $link .=  '</div>';
                    $link .=  '</li>';

                    header("Content-type: application/json");
                    echo CJSON::encode(array(
                        'result'=> $msj,
                        'link'  => $link,
                        'id'    => $model->id,
                    ));
                    exit;
                }
            }
        }
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formSuplemento',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    public function actionOpenSuplemento(){

        $id   = Yii::app()->request->getParam('id');
        $programa   = Yii::app()->request->getParam('programa');

        if(empty($id)){
            $model = new ProgramaSuplementoAereo();

        }else{
            $model = ProgramaSuplementoAereo::model()->findByPk($id);
            $programa = $model->programa_id;
        }

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>true,
            'data'=>$this->renderPartial('_formSuplemento',array('model'=>$model,'programa'=>$programa),true)
        ));
        exit;
    }

    function actionDeleteSuplemento(){
        $id       = Yii::app()->request->getParam('id');
        $programa = ProgramaSuplementoAereo::model()->findByPk($id);
        $programa->delete();

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'id'=>$id,
            'result'=>'save'
        ));
        exit;
    }

    /* FIN PROGRAMA SUPLEMENTO AEREO*/



    public function actionSetCiudad()
    {
        require_once Yii::app()->basePath . '/extensions/booster/widgets/TbActiveForm.php';
        $ciudad = new ProgramaHasCiudad();
        $form  = new TbActiveForm();
        $i     = Yii::app()->request->getParam('i');
        $i++;

        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
        header("Content-type: application/json");
        echo CJSON::encode(array(
            'div'=>$this->renderPartial('_ciudad',array('ciudad'=>$ciudad,'i'=>$i,'form'=>$form),true,true)
        ));
        exit;
    }


    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model       = new Programa;
        $ciudad      = new ProgramaHasCiudad();
        $ciudades[0] = $ciudad;

		if(isset($_POST['Programa']))
		{
			$model->attributes=$_POST['Programa'];

            $error = false;
            if(isset($_POST['ProgramaHasCiudad'])){
                foreach($_POST['ProgramaHasCiudad']  as $index=>$ciudad){
                    $int = new ProgramaHasCiudad();
                    $int->attributes = $ciudad;
                    $int->validate();
                    $ciudades[$index] = $int;
                    if(count($int->getErrors())>0){
                        $error = true;
                    }
                }
            }

            if($model->validate()  && $error == false ){
                $model->fecha_creacion = date("Y-m-d H:i:s");
                $model->fecha_modificacion = date("Y-m-d H:i:s");
                if($model->save()){
                    foreach($ciudades as $ciudad){
                        $ciudad->programa_id = $model->id;
                        $ciudad->insert();
                    }

                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'ciudades'=>$ciudades

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
        $ciudades = ProgramaHasCiudad::model()->findAllByAttributes(array('programa_id'=>$id));
        
		if(isset($_POST['Programa']))
		{
			$model->attributes=$_POST['Programa'];

            $error =false;
            $ciudades =array();
			if(isset($_POST['ProgramaHasCiudad'])){
				foreach($_POST['ProgramaHasCiudad']  as $index=>$ciudad){
					if(!empty($ciudad['id'])){
						$int = ProgramaHasCiudad::model()->findByAttributes(array('id'=>$ciudad['id']));
					}else{
						$int = new ProgramaHasCiudad();
					}
					$int->attributes=$ciudad;
					$int->validate();
					$ciudades[$index] = $int;
					if(count($int->getErrors())>0){
						$error = true;
					}
				}
			}
            

            if($model->validate() && $error == false ){
                $model->fecha_modificacion = date("Y-m-d H:i:s");
                if($model->save()){
                    $ids2= array();
					
					$criteria = new CDbCriteria;
					$criteria->params= array(':id'=>$model->id);
                    $criteria->condition = 'programa_id=:id';
					
                    ProgramaHasCiudad::model()->deleteAll($criteria);
					
                    foreach($ciudades as $ciudad){
						$ci = new ProgramaHasCiudad();
						$ci->ciudad_id   =  $ciudad->ciudad_id;
                        $ci->programa_id =  $model->id;
                        $ci->insert();
                        //$ids2[] = $ciudad->id;
                    }

                    

                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'ciudades'=>$ciudades
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
		$dataProvider=new CActiveDataProvider('Programa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Programa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Programa']))
			$model->attributes=$_GET['Programa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionFotos($id)
    {

        $model=$this->loadModel($id);

        $fotos=new ProgramaImagen('search');

        $fotos->unsetAttributes();  // clear any default values
        $fotos->programa_id = $id;
        if(isset($_GET['ProgramaImagen']))
            $model->attributes=$_GET['ProgramaImagen'];

        $this->render('fotos',array(
            'model'=>$model,
            'fotos'=>$fotos
        ));
    }

    public function actionUploadFoto()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $id   = Yii::app()->request->getParam('id');
        $foto = new ProgramaImagen();
        $foto->programa_id = $id;

        $folder= Yii::app()->basePath.'/../images/programa/';
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

    public function actionFotoDelete($id)
    {
        $foto = ProgramaImagen::model()->findByPk($id);
        $imagen = $foto->imagen;
        $foto->delete();

        if(file_exists(Yii::app()->basePath.'/../images/programa/'.$imagen) && !is_dir(file_exists(Yii::app()->basePath.'/../images/programa/'.$imagen))){
            if($imagen != ''){
                unlink(Yii::app()->basePath.'/../images/programa/'.$imagen);
            }
        }

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>'success',
        ));
        exit;
    }


    public function actionCombinacionDelete(){

        $id   = Yii::app()->request->getParam('id');
        $combinacion = ProgramaCombinacion::model()->findByPk($id);
        $combinacion->delete();

        header("Content-type: application/json");
        echo CJSON::encode(array(
            'result'=>'success',
        ));
        exit;

    }

    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Programa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Programa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Programa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='programa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
