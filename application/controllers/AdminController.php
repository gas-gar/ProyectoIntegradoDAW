<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct()
  {
		//session_start;//inicia o continua una sesión
    parent::__construct();
		//creamos la conexión
    $this->load->model( 'BackEndModel', 'BackEndModel');
		$this->load->library("session");//cargar librería
  }
	public function index()
	{
		//echo "AdminController";/*
    $datos = array();
		//la vista que cargará desde el layout
    $vista = array(
      'vista' => 'admin/index.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view ( $vista);
	}//fin index
	public function bienvenido()
	{
		//página de inicio
    $datos = array();//no le pasamos nada
		//la vista que cargará desde el layout
    $vista = array(
      'vista' => 'bienvenido.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view ( $vista);
	}//fin bienvenido
  /** LOGIN con mensaje de error */
  public function login()
  {//debug($this->uri);die;
		//si viene redireccionado de login/error
    if ( $this->uri->segment(2) ==! null && $this->uri->segment(2) == 'error' )
    {
      $datos = array (
        'error' => "Usuario o contraseña invalidos"
      );
    }
    else{
      $datos = array ();
    }
    //array que le pasamos al layout para cargar la vista
    $vista = array(
      'vista' => 'admin/login.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );
    $this->layouts->view ( $vista);//mostramos la vista
  }//fin login
	/** SE EJECUTA DESPUÉS DE LOGIN
	crear una consulta que nos devuelva el usuario y pass */
	public function login2()
	{
//		debug($_POST);die;
		// Tratamos los datos para pasarselos al modelo
		$datos['correo'] = $_POST['email'];
		//Codificamos el password con MD5 porque asi esta codificado en la base de datos
    # (Se puede utilizar cualquier otra codificacion como sha1 o mezcla)
    $datos['pass'] = md5( $_POST['password']);
		//$datos['pass'] = $_POST['password'];
//debug($datos);die;
    # Enviamos los datos al modelo que hará la consulta  a la base de datos y nos devolvera un
    # Array con los datos del usuario o un array vacio si no encuentra nada.
		//guardamos lo que devuelve la llamada al modelo con los datos del formulario login
    $user = $this->BackEndModel->login( $datos);
debug($user);
    // comprobamos que ha devuelto el modelo
    if ( empty( $user))//si devolución vacía, error!
    {
      header ( "location: /login/error");//redirigir
    }else{

			//inicializar las variables de sesión con los datos del usuario
			$this->session->set_userdata("cliente", $user[0]);
			//array que le pasamos al layout para cargar la vista
/*	    $vista = array(
	      'vista' => 'reservas/reserva.php',
	      'params' => "",
	      'layout' => 'ly_home.php',
	      'titulo' => 'Prueba de controlador login',
	    );
	    $this->layouts->view ( $vista);//mostramos la vista */
			debug($this->session->cliente);
//			debug($this->session->cliente['telefono']); die;
/*			$this->session->set_userdata("nombre", $user[0]['nombre']);
			$this->session->set_userdata("correo", $user[0]['correo']);
			$this->session->set_userdata("tipo", $user[0]['tipo']);*/
//			echo "sesión nombre: " . $this->session->nombre; die;
			//preguntar el tipo de usuario
//			if ($this->session->cliente['tipo']) {
//				echo "administrador: " . $this->session->cliente['tipo']; die;
				//si tipo es true (1) es administrador, activar todos los privilegios
				// TODO: privilegios on!!
//			}else{
				//cliente no administrador, enviar a reservas
				header ( "location: /reserva");
			}

//    }
	}//fin login2
	/** REGISTRO DE UN NUEVO CLIENTE */
	public function registro()
  {
		$datos = array();

    $vista = array(
      'vista' => 'admin/new_cliente.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view ( $vista);

  }//FIN FUNCIÓN REGISTRO
	/** ADD CLIENTE */
	public function add_cliente()
  {
		//Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
		foreach ( $_POST as $key => $value)
		{
			$datos[ $key] = $value;
		}

		//debug($datos);die;
		//codificar con md5 para que se guarde codificado
		$datos['pass'] = md5( $datos['pass'] );
		//llamar al modelo, función insert, con la tabla y los datos
		$this->BackEndModel->insert( 'usuario', $datos);
		//redirigir a la pagina de reservas
		header ( "location: /reserva");

  }//FIN FUNCIÓN ADD CLIENTE
	/**
	RESERVA
	*/
	public function reserva()
	{
		//comprobar que está logueado el usuario
		if (!$this->session->has_userdata("cliente")) {
	    //no está logueado
			//redirigir a la pagina de login
			header ( "location: /admin/login");
		}
//		debug($this->uri);
		//si viene redireccionado de reserva/error
    if ( $this->uri->segment(2) ==! null && $this->uri->segment(2) == 'error' )
    {
      $datos = array (
        'error' => "No hay sitio para la fecha seleccionada."
      );
    }
    else{
			$datos = array();
    }
		$vista = array(
			'vista' => 'reservas/reserva.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login',
		);

		$this->layouts->view ( $vista);
//		echo "Reserva";

	}
	/** RESERVA NUEVA */
	public function add_reserva()
	{
		// Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
		foreach ( $_POST as $key => $value)
		{
			$datos[ $key] = $value;
		}
		//		debug($datos);
		//resultado de la consulta (aforo y sitios reservados)
		$reserva = $this->BackEndModel->comprobar_reserva( $datos);
//		debug($reserva);
		//comprobar total aforo con esta reserva
		if ($reserva['aforo'] < ($reserva['reservado']+$datos['comensales'])) {
		//      echo "No hay sitio";
			header ( "location: /reserva/error");
		} else {
			//echo "Si hay sitio";
//			debug($this->session->cliente);

			//agregar los datos para realizar el insert
			$datos['id_restaurante'] = 1;// TODO: forma dinámica
			$datos['id_cliente'] = $this->session->cliente['id_usuario'];
			debug($datos);
			//guardar los datos en la BD, true si todo bien
			if ($this->BackEndModel->insert( 'reserva', $datos)) {
				// TODO: guardar en variable de sesión los datos del cliente para mostrarlos en exito.php
				$this->session->set_userdata("fecha", $datos['fecha']);
				$this->session->set_userdata("hora", $datos['hora']);
				$this->session->set_userdata("comensales", $datos['comensales']);
//				$this->session->set_userdata("cliente", $user[0]);
//debug($datos);
//				debug($this->session);die;
				header ( "location: /reserva/exito");//redirigir
			}



		}
	}//fin add_reserva
	/** RESERVA REALIZADA CON ÉXITO */
	public function exito()
	{
//		echo "Correcto";
		$datos = array();
//		debug($datos); die;
		$vista = array(
			'vista' => 'reservas/exito.php',
			'params' => array(),
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login',
		);
		$this->layouts->view ( $vista);
	}//fin función exito
	/** MODIFICAR_RESERVA */
	public function modificar_reserva(){
		//comprobar que está logueado el usuario
		if (!$this->session->has_userdata("cliente")) {
	    //no está logueado
			//redirigir a la pagina de login
			header ( "location: /admin/login");
		}
//		debug($this->session->cliente);
		//si el usuario es administrador
		if ($this->session->cliente['tipo'] == 1) {
			//llamar al modelo para mostrar "todas" las reservas
			$reservas = $this->BackEndModel->listado_reservas();
			$datos = array(
				'reservas' => $reservas
			);
		}else{
			//el cliente sólo puede modificar sus reservas
			$reservas = $this->BackEndModel->listado_reservas_cliente($this->session->cliente['id_usuario']);
			$datos = array(
				'reservas' => $reservas
			);
		}
		//		debug($datos); die;
				$vista = array(
					'vista' => 'reservas/modificar_reserva.php',
					'params' => $datos,
					'layout' => 'ly_home.php',
					'titulo' => 'Prueba de controlador login',
				);
				$this->layouts->view ( $vista);
//		$datos = array();

	}//FIN MODIFICAR_RESERVA
	/** SALIR */
	public function salir(){
		debug($this->session);
		//cerrar sesión
//		$this->session->unset_userdata();
		$this->session->sess_destroy();
		debug($this->session);
		//redirigir a la pagina de login
		header ( "location: /bienvenido");
	}
	/** AJAX
	los parámetros se pasan por el URI */
	public function ajax()
	{
		debug($this->uri);die;
		if (!$this->input->is_ajax_request()) {
            redirect('404');
        } else {
		debug($data);die;
		$reserva = $this->BackEndModel->comprobar_reserva( $data);
	}
	}
}//fin clase
