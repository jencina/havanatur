<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ingresar';
$this->breadcrumbs=array(
	'Ingresar',
);
?>

<div class="row" style="padding-top: 20px;">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
        <div class="page-header">
            <h1>
                Restrate como usuario
                <small></small>
            </h1>
        </div>
        <div class="col-md-12">
            <ul class="list-group">
                <li class="padding-10">
                    Al crear una cuenta de usuario en Havanatur,
                    podras inscribirte a los distintos eventos 
                    que estamos ofraciendo.
                </li>
                <li class="padding-10">
                    Al crear una cuenta de usuario en Havanatur,
                    podras inscribirte a los distintos eventos 
                    que estamos ofraciendo.
                </li>
                <li class="padding-10">
                    Si no tienes una cuenta con nosotros, ingresa al siguiente link:
                    <?php echo CHtml::link('Registrar',array('site/registrar'));?>
                </li>
            </ul>
        </div>   
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
        <?php
        $form = $this->beginWidget(
            'booster.widgets.TbActiveForm',
            array(
                'id' => 'verticalForm',
                'htmlOptions' => array('class' => 'well'), // for inset effect
            )
        );
        echo '<h1>Login Usuarios</h1>';
        echo $form->textFieldGroup($model, 'username');
        echo $form->passwordFieldGroup($model,'password');
        echo $form->checkboxGroup($model, 'rememberMe');
        $this->widget(
            'booster.widgets.TbButton',
            array('buttonType' => 'submit', 'label' => 'Login','htmlOptions'=>array('class'=>'btn btn-primary','style'=>'width:100%;'))
        );
        $this->endWidget();
        unset($form);
        ?>
    </div>
</div>


