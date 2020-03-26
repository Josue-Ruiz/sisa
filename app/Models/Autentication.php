<?php

namespace App\Models;

use DB;

class Autentication
{

    private $correo;
    private $usuario;
    private $password;
    private $token;
    private $tipo;


    function getUsuario()
    {
        return $this->usuario;
    }

    function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
        
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        return $this->correo = $correo;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        return $this->token = $token;
       
    }
    
    public function auth(){
        
        $tipo = filter_var($this->usuario,FILTER_VALIDATE_EMAIL) ? 1 : 2;
        $sql = "call DA_spSIVADB_Autenticacion('1','".$tipo."','".$this->getUsuario()."','".$this->getPassword()."','null')";
        $result = DB::select($sql,array(0,1));
        return $result; 

    }

    public function verify_email(){
        $sql = "call DA_spSIVADB_Autenticacion('2','0','".$this->getCorreo()."','null','".$this->getToken()."')";
        $result = DB::select($sql,array(0,1));
        return $result; 
    }

    public function update_password(){
        $sql = "call DA_spSIVADB_Autenticacion('3','0','null','".$this->getPassword()."','".$this->getToken()."')";
        $result = DB::select($sql,array(1,1));
        return $result;
    }
    
}
