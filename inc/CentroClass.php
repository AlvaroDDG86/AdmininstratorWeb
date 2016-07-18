<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoClass
 *
 * @author usuario
 */
class CentroClass {
    
    //Variable que contendra un objeto de la conexión
    private $conBBDD; 
    
    /**
     * Método constructor de la clase, que se inicializia la conexión a la base de datos
     * @param String $host
     * @param String $usuario
     * @param String $password
     * @param String $baseDatos
     * @throws Exception
     */    
    public function __construct($host, $usuario, $password, $baseDatos) {
        //Se inicializa el objeto sqli con los parámetros del constructor
        $this->conBBDD=new mysqli($host,$usuario,$password,$baseDatos);
        //Evaluamos si no hay código de error en  la creación del objeto
        if($this->conBBDD->connect_errno){
            throw new Exception("Error en la conexión");
        }
        //Mediante este método asignamos el tipo de codificación de la base de datos
        $this->conBBDD->set_charset("UTF8");
    }
    
    /**
     * Método para evaluar si un usuario existe dentro de la base de datos con su contraseña correspondiente
     * @param String $usuario variable con el nombre de usuario a evaluar
     * @param String $contraseña variable con la contraseña del usuario a evaluar
     * @return boolean true si el usuario y contraseña existen dentro de la base de datos, false si el usuario o contraseña no existen o están relacionados
     */
    public function isValidUser($usuario,$contrasena) {
        if(!preg_match("/^[0-9a-zA-Z]{1,10}$/",$usuario))
		throw new Exception("Valor incorrecto en el nombre de usuario");
	//Filtramos la contraseña
	if(!preg_match("/^[0-9a-zA-Z]{1,15}$/",$contrasena))
		throw new Exception("Valor incorrecto en la contraseña");
        //Variable que recogerá los datos de la consulta
        $srcDatos = $this->conBBDD->query("call getUsuario(".$usuario.", '".$contrasena."');");
        return $srcDatos->fetch_object()==null?false:true;
    }
    
    /**
     * Método para devolver un nombre pasándolse un id de usuario
     * @param int $id
     * @return boolean
     */
    public function getNombre($id) {
        $sql = "call getNombre(".$id.");";
        return  $this->conBBDD->query($sql);
    }
    

    //Adminitración de NOTICIAS
    
    
    /**
     * Método para agregar una nueva noticia a la base de datos
     * @param int $id
     * @param String $nombre
     * @param String $descripcion
     * @param String $fecha
     * @return boolean 
     */
    public function newNoticia($id,$nombre,$descripcion,$fecha) {
        $sql = "call newNoticia(".$id.",'".$nombre."','".$descripcion."','".$fecha."',1);";
        return $this->conBBDD->query($sql);
    }
     /**
      * Método para eliminar una noticia
      * @param int $id
      * @return boolean
      */
    public function deleteNoticia($id) {
        $sql = "call deleteNoticia(".$id.");";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para editar una noticia
     * @param int $id
     * @return boolean
     */
    public function editNoticia($id,$nombre,$descripcion,$fecha) {
        $sql = "call editNoticia(".$id.",'".$nombre."','".$descripcion."','".$fecha."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para conseguir todas las noticias
     * @return aNoticias
     */
    public function getNoticias() {
        //Variable que contendra los datos de las noticias
        $aNoticias=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getNoticias();");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aNoticias[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aNoticias;
    }
    
    
    
    //Administracion de EVENTOS
    
    /**
     * Método para crear un nuevo evento
     * @param int $id
     * @param String $nombre
     * @param String $descripcion
     * @param String $fecha
     * @return boolean
     */
    public function newEvento($id,$nombre,$descripcion,$fecha, $imagen) {
        $sql = "call newEvento(".$id.",'".$nombre."','".$descripcion."','".$fecha."','".$imagen."',1);";
        return $this->conBBDD->query($sql);
    }
    
     /**
      * Método para eliminar una noticia
      * @param int $id
      * @return boolean
      */
    public function deleteEvento($id) {
        $sql = "call deleteEvento(".$id.");";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para editar una noticia
     * @param int $id
     * @return boolean
     */
    public function editEvento($id,$nombre,$descripcion,$fecha, $imagen) {
        $sql = "call editEvento(".$id.",'".$nombre."','".$descripcion."','".$fecha."','".$imagen."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para conseguir todas las noticias
     * @return aNoticias
     */
    public function getEventos() {
        //Variable que contendra los datos de las noticias
        $aEventos=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getEventos();");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aEventos[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aEventos;
    }
    
    
    
    //Administración de Teléfonos
    
    
    /**
     * Método para agregar un nuevo teléfono
     * @param int $id
     * @param String $telefono
     * @return boolean
     */
    public function newTelefono($descripcion,$telefono) {
        $sql = "call newTelefono('".$descripcion."','".$telefono."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para eliminar un teléfono
     * @param int $id
     * @return boolean
     */
    public function deleteTelefono($descripcion) {
        $sql = "call deleteTelefono('".$descripcion."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para editar un teléfono
     * @param int $id
     * @param String $telefono
     * @return boolean
     */
    public function editTelefono($descripcion,$telefono) {
        $sql = "call editTelefono('".$descripcion."','".$telefono."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para conseguir todas las noticias
     * @return aNoticias
     */
    public function getTelefonos() {
        //Variable que contendra los datos de las noticias
        $aTelefonos=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getTelefonos();");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aTelefonos[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aTelefonos;
    }
    
    
    
    //Administracion PROFESORES
    
    /**
     * Método para agregar un nuevo profesor
     * @param int $id
     * @param String $nombre
     * @param String $apellidos
     * @param String $email
     * @return boolean
     */
    public function newProfesor($id,$nombre,$apellidos,$email) {
        $sql = "call newProfesor(".$id.",'".$nombre."','".$apellidos."','".$email."');";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para eliminar un profesor
     * @param int $id
     * @return boolean
     */
    public function deleteProfesor($id) {
         $sql = "call deleteProfesor(".$id.");";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para editar un profesor
     * @param int $id
     * @param String $nombre
     * @param String $apellidos
     * @param String $email
     * @return boolean
     */
    public function editProfesor($id,$nombre,$apellidos,$email) {
       $sql = "call editProfesor(".$id.",'".$nombre."','".$apellidos."','".$email."');";
       return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para obtener los profesores
     * @return aProfesores
     */
    public function getProfesores() {
        //Variable que contendra los datos de las noticias
        $aProfesores=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getProfesores();");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aProfesores[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aProfesores;
    }
    
    
    
    
    //Administración para los CURSOS
    /**
     * Método para agregar un nuevo curso a la base de datos
     * @param int $id
     * @param String $nombre
     * @param String $descripcion
     * @param String $horas
     * @return boolean 
     */
    public function newCurso($id,$nombre,$descripcion,$fecha,$profesor) {
        $sql = "call newCurso(".$id.",'".$nombre."','".$descripcion."','".$fecha."','".$profesor."');";
        return $this->conBBDD->query($sql);
    }
    
     /**
      * Método para eliminar un curso
      * @param int $id
      * @return boolean
      */
    public function deleteCurso($id) {
        $sql = "call deleteCurso(".$id.");";
        return $this->conBBDD->query($sql);
    }
    
   /**
    * Método para editar un curso
    * @param int $id
    * @param String $nombre
    * @param String $descripcion
    * @param int $horas
    * @param int $profesor
    * @return boolean
    */
    public function editCurso($id,$nombre,$descripcion,$horas,$profesor) {
        $sql = "call editCurso(".$id.",'".$nombre."','".$descripcion."',".$horas.",".$profesor.");";
        return $this->conBBDD->query($sql);
    }
    
    /**
     * Método para conseguir todos los cursos
     * @return aCursos
     */
    public function getCursos() {
        //Variable que contendra los datos de las noticias
        $aCursos=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getCursos();");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aCursos[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aCursos;
    }
    
    /**
     * Método para recoger todos los cursos de un profesor
     * @param int $profesor
     * @return aCursos
     */
    public function getCursosProfesor($profesor) {
        //Variable que contendra los datos de las noticias
        $aCursos=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getCursosProfesor(".$profesor.");");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aCursos[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aCursos;
    }
    
    public function getAlumnosCurso($curso){
        //Variable que contendra los datos de las noticias
        $aAlumnos=[];
        //Variable que contendra el resultado de la consulta
        $rscDatos=  $this->conBBDD->query("call getAlumnosCurso(".$curso.");");
        //Bucle para recorrer todas las filas de los datos
        while($filFila=$rscDatos->fetch_object())
        {
            $aAlumnos[]=$filFila;
        }
        //Se devuelve el array con todos los datos
        return $aAlumnos;
    }




    //Administración para CENTRO
    
    /**
     * Método para editar los datos del centro
     * @param String $nombre
     * @param String $descripcion
     * @param String $resumen
     * @param String $direccion
     * @return boolean
     */
    public function editCentro($nombre, $descripcion, $resumen, $direccion) {
        $sql = "call editCentro('".$nombre."','".$descripcion."','".$resumen."','".$direccion."');";
        return $this->conBBDD->query($sql);
    }

    /**
     * Método para recoger los datos del centro
     * @return Centro
     */
    public function getCentro() {
        $sql = "call getCentro();";
        return $this->conBBDD->query($sql)->fetch_object();
    }
    
    
    
    
    
    /**
     * Función para detruir el objeto de la clase y cerrar la conexión
     */
    public function __destruct() {
        $this->conBBDD->close();
    }
}
