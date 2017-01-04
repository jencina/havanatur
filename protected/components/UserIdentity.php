
<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    const ERROR_USERNAME_NOT_ACTIVE = 3;
    private $_id;
    
    public function authenticate()
    {
        $user = Usuario::model()->findByAttributes(array('usuario'=>$this->username));
        if(!isset($user)){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            //   }elseif ($user->password !== crypt($this->password, $user->password)) {
        }elseif ($user->contrasena !== md5($this->password)) {
            /*  $time = rand(1,5);
              sleep($time);*/
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }elseif($user->activo == 0){
            $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
        }else{
            $this->_id=$user->id;
            $this->setState('tipo_usuario',$user->usuarioTipo->nombre);
            $this->setState('type','admin');
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    public function authenticateWeb()
    {
        $user = Interesado::model()->findByAttributes(array('int_user'=>$this->username));
        if(!isset($user)){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            //   }elseif ($user->password !== crypt($this->password, $user->password)) {
        }elseif ($user->int_password !== md5($this->password)) {
            /*  $time = rand(1,5);
              sleep($time);*/
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }elseif($user->int_activo == 0){
            $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
        }else{
            $this->_id=$user->int_id;
            $this->setState('type','web');
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}