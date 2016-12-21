<?php
ob_start();
class AdminController extends Controller
{
    /**
     * Declares class-based actions.
     */

    public $layout='//layouts/admin';

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
        $this->layout='//layouts/login';

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
            if($model->validate() && $model->login()){
                $this->redirect(array('admin/home'));
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }
    
    public function actionHome(){
        
        $cotSql = 'SELECT date(fecha_creacion) name,COUNT(*) count FROM `cotizacion` where fecha_creacion BETWEEN date(NOW() - INTERVAL 60 DAY) and date(now()) GROUP BY date(fecha_creacion)';
        
        $c = array();
        $cot = Yii::app()->db->createCommand($cotSql)->queryAll();
        foreach ($cot as $index=>$co){
            $c[] = array('name'=>$co['name'],'y'=>(float)$co['count']);
        }
        
        $intSql = 'SELECT date(int_fechacreacion) name,COUNT(*) contador FROM `interesado` where date(int_fechacreacion) BETWEEN date(NOW() - INTERVAL 60 DAY) and date(now()) GROUP BY date(int_fechacreacion)';
        
        $i = array();
        $int = Yii::app()->db->createCommand($intSql)->queryAll();
        foreach ($int as $index=>$in){
            $i[] = array('name'=>$in['name'],'y'=>(float)$in['contador']);
        }
        
        $this->render('home',array('cot'=>$c,'int'=>$i));
    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('admin/index'));
    }
}