<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_otros');

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
		$data['active'] = '7';
		$data['tabactive'] = '1';
		$data['subactive'] = '0';

			$data['listar_tipo_pago'] = $this->model_otros->cargar_tipo_pago();
			$data['listar_cuentas_usuario'] = $this->model_otros->cargar_cuentas_usuario($idusuario);


			$this->load->view('plantillas/header');
			$this->load->view('plantillas/menu',$data);
			$this->load->view('plantillas/header_content');
			$this->load->view('otros/otros');
			$this->load->view('plantillas/footer');

	}
	public function registrar_tipo_pago()
	{
		$this->form_validation->set_rules('descripcion','Descripcion','required');
		if ($this->form_validation->run() === FALSE)
		{
			redirect (site_url('otros'));
		}
		else
		{
			//$data['success'] = 'Se valido correctamente';

			$this->model_otros->m_registrar_tipo_pago();

			redirect (site_url('otros'));
		}
	} 
	public function registrar_cuenta()
	{
		$this->form_validation->set_rules('descripcion','Descripcion','required');
		if ($this->form_validation->run() === FALSE)
		{
			redirect (site_url('otros'));
		}
		else
		{
			//$data['success'] = 'Se valido correctamente';

			$this->model_otros->m_registrar_cuenta();

			redirect (site_url('otros'));
		}
	}
	public function anular_tipo_pago($id)
	{
		$this->model_otros->m_anular_tipo_pago($id);

		 redirect (site_url('otros'));
	}
	public function anular_cuenta($id)
	{
		$this->model_otros->m_anular_cuenta($id);

		 redirect (site_url('otros'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */