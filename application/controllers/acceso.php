<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_usuario');
		$this->load->helper(array('form', 'url'));
        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');

         date_default_timezone_set("America/Lima");

	}
	
	public function login() 
	{
        $data = array();
        // Se carga la libreria form_validation.
        $this->load->library('form_validation');
        // Añadimos las reglas necesarias.
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Generamos el mensaje de error personalizado para la accion 'required'
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        // Si no esta vacio $_POST
        if(!empty($_POST)) {
            // Si las reglas se cumplen, entramos a la condicion.
            if ($this->form_validation->run() == TRUE) 
            {
                // Obtenemos la informacion del usuario desde el modelo
                $logged_user = $this->model_usuario->get($_POST['username'], $_POST['password']);
               
                // Si existe el usuario creamos la sesion y redirigimos al index.
                if($logged_user) {
                	
                    $this->session->set_userdata('logged_user', $logged_user);
                    redirect('inicio/index');
                } else {
                    // De lo contrario se activa el error_login.
                    $data['error_login'] = TRUE;
                }
            }
        }
        $this->load->view('login', $data);
    }
    public function logout() 
    {
        $this->session->unset_userdata('logged_user');

        redirect('inicio/index','refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */