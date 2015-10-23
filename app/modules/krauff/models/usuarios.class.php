<?php
class Modules_Krauff_Model_Usuarios{
private $_codusuario;               //serial, NOT NULL, Primary key
private $_codperfil;                //integer, NOT NULL, Foreign Key perfiles(codperfil)
private $_codigo;                //integer, NOT NULL
private $_tipodoc;                  //varchar(2)
private $_documento;                //varchar(30)
private $_primerapellido;           //varchar(100), NOT NULL
private $_segundoapellido;          //varchar(100), NOT NULL
private $_nombres;                  //varchar(150), NOT NULL
private $_correo;                   //varchar(200), NOT NULL
private $_genero;                   /* smallint, NOT NULL, DEFAULT 1, Domains CHECK ckc_genero_usuarios:
                                        1 Masculino
                                        2 Femenino */
private $_nombreusuario;            //varchar(100), NOT NULL
private $_clave;                    //varchar(50), NOT NULL
private $_programaacademico;                    //varchar(50), NOT NULL
private $_jornada;                    //varchar(50), NOT NULL
private $_telefono;                    //varchar(50), NOT NULL
private $_direccion;                    //varchar(50), NOT NULL
private $_tiposangre;                    //varchar(50), NOT NULL
private $_facultad;                    //varchar(50), NOT NULL
private $_rh;                    //varchar(50), NOT NULL



public function __construct(){}

//Setters
public function set_codusuario($value){$this->_codusuario = $value;}
public function set_codperfil($value){$this->_codperfil = $value;}
public function set_codigo($value){$this->_codigo = $value;}
public function set_tipodoc($value){$this->_tipodoc = $value;}
public function set_documento($value){$this->_documento = $value;}
public function set_primerapellido($value){$this->_primerapellido = $value;}
public function set_segundoapellido($value){$this->_segundoapellido = $value;}
public function set_nombres($value){$this->_nombres = $value;}
public function set_correo($value){$this->_correo = $value;}
public function set_genero($value){$this->_genero = $value;}
public function set_nombreusuario($value){$this->_nombreusuario = $value;}
public function set_clave($value){$this->_clave = $value;}
public function set_programaacademico($value){$this->_programaacademico = $value;}
public function set_jornada($value){$this->_jornada = $value;}
public function set_direccion($value){$this->_direccion = $value;}
public function set_telefono($value){$this->_telefono = $value;}
public function set_tiposangre($value){$this->_tiposangre = $value;}
public function set_facultad($value){$this->_facultad = $value;}
public function set_rh($value){$this->_rh = $value;}


//Getters
public function get_codusuario(){return $this->_codusuario;}
public function get_codperfil(){return $this->_codperfil;}
public function get_codigo(){return $this->_codperfil;}
public function get_tipodoc(){return $this->_tipodoc;}
public function get_documento(){return $this->_documento;}
public function get_primerapellido(){return $this->_primerapellido;}
public function get_segundoapellido(){return $this->_segundoapellido;}
public function get_nombres(){return $this->_nombres;}
public function get_correo(){return $this->_correo;}
public function get_genero(){return $this->_genero;}
public function get_nombreusuario(){return $this->_nombreusuario;}
public function get_clave(){return $this->_clave;}
public function get_programaacademico(){return $this->_programaacademico;}
public function get_jornada(){return $this->_jornada;}
public function get_direccion(){return $this->_direccion;}        
public function get_telefono(){return $this->_telefono;}
public function get_tiposangre(){return $this->_tiposangre;}
public function get_facultad(){return $this->_facultad;}
public function get_rh(){return $this->_rh;}
}//End class
?>