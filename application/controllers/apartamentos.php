<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apartamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_apartamentos');

		$this->load->driver('cache');
		$this->load->helper(array('form', 'url','permisos_helper'));
		$this->load->library('form_validation');

        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');


        	$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			//redirect ('inicio/login');

         date_default_timezone_set("America/Lima");
        if(!@$this->user) redirect ('acceso/login');

        //$permisos = cargar_permisos_del_usuario($this->user->idusuario);
 
	}
	public function index()
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '6';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

			$data['listar_apartamentos'] = $this->model_apartamentos->cargar_apartamentos();


			$this->load->view('plantillas/header');
			$this->load->view('plantillas/menu',$data);
			$this->load->view('plantillas/header_content');
			$this->load->view('apartamento/apartamentos',$data);
			$this->load->view('plantillas/footer');

	}
	public function obtener_apartamento($id)
	{
		$idusuario = $this->user->id_usuario;
		$data['active'] = '6';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

			$data['listar_fila_apartamento'] = $this->model_apartamentos->cargar_apartamentos($id);


			$this->load->view('plantillas/header');
			$this->load->view('plantillas/menu',$data);
			$this->load->view('plantillas/header_content');
			$this->load->view('apartamento/obtener_apartamento',$data);
			$this->load->view('plantillas/footer');

	}
	public function registrar_apartamento()
	{
		$this->form_validation->set_rules('descripcion','Descripcion','required');
		$this->form_validation->set_rules('ubicacion','Ubicacion','required');
		if ($this->form_validation->run() === FALSE)
		{
			redirect (site_url('apartamentos'));
		}
		else
		{
			//$data['success'] = 'Se valido correctamente';

			$this->model_apartamentos->m_registrar_apartamento();

			redirect (site_url('apartamentos'));
		}
	} 

	public function editar_apartamento()
	{
		$this->model_apartamentos->m_editar_apartamento();

		 redirect (site_url('apartamentos'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */