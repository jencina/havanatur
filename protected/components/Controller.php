<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	
	public $menu_activo = '';

    /*menu*/
        public $quienessomos  = 1;
        public $informaciones = 2;
	public $otros         = 3;
	public $turismo       = 4;

    /*Programa*/

        public $programas     = 1;
        public $bloqueos      = 2;
        public $otroDestino   = 3;
        public $turismoSalud  = 4;
        public $otroServicio  = 5;
        
        public $carousel      = array();
        
        public $breadcrumbs     = array();
        public $widthPageClass  = '';
        public $headerTitulo    = '';
        public $headerImagen    = '';
        public $headerCategoria = '';
        public $headerFecha     = '';

        public $pagetitulo       = '';
        public $pagesubtitulo    = '';
        public $pageicon         = 'fa-home';
        public $btncreate        = '';
        public $padding          = '';
        public $btncreateajax    = '';
        
        public $otrosNoticias   = array();



    public function string_sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");

        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = str_replace("ñ","n",$clean);
        $clean = str_replace("Ñ","N",$clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

    function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "[", "^", "`", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":", " "),
            '',
            $string
        );

        return $string;
    }

    function sendMail($to,$subject,$html,$cc = ''){

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        //$cabeceras .= 'To: H <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $cabeceras .= 'From: Havanatur <info@havanatur.cl>' . "\r\n";
        $cabeceras .= 'Cc:'.$cc.' '. "\r\n";
        $cabeceras .= 'Bcc: jonny.encina@gmail.com' . "\r\n";

        if(mail($to,$subject,$html,$cabeceras)){
            return true;
        }else{
            return false;
        }
    }

    function bodyEmail($titulo2,$cuerpo,$titulo1 = ''){

        $html = $this->renderPartial('application.components._mail',array('titulo'=>$titulo2,'cuerpo'=>$cuerpo,'totulo1'=>$titulo1),true);

        return $html;
    }
    
    function bodyEmailInteresado($titulo2,$cuerpo,$titulo1 = ''){

        $html = $this->renderPartial('application.components._mail_interesado',array('titulo'=>$titulo2,'cuerpo'=>$cuerpo,'totulo1'=>$titulo1),true);

        return $html;
    }
    
    function bodyEmailRegistro($titulo2,$cuerpo,$link){

        $html = $this->renderPartial('application.components._mail_registro',array('titulo'=>$titulo2,'cuerpo'=>$cuerpo,'link'=>$link),true);

        return $html;
    }
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
    
            
    function img_350_150($img){
         if(!empty($img)){
            $imagen = explode(".", $img);
            return $imagen[0].'_350_150.'.$imagen[1];
        }else{
            return $img;
        }
    }
    
    function img_450_350($img){
        if(!empty($img)){
            $imagen = explode(".", $img);
            return $imagen[0].'_450_350.'.$imagen[1];
        }else{
            return $img;
        }
        
    }
    
    
}