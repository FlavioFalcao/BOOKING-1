<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_usuario');
		$this->load->model('model_ventas');
		$this->load->model('model_reservas');

		$this->load->driver('cache');
		$this->load->helper(array('form', 'url'));

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
		$data['active'] = '1';
		$data['subactive'] = '0';

		/*$data['listar_venta_calendario'] = $this->model_ventas->cargar_venta_calendario();
		$data['listar_reserva_calendario'] = $this->model_reservas->cargar_reserva_calendario();*/

		$this->load->helper('url');
		$this->load->view('plantillas/header');
		$this->load->view('plantillas/menu',$data);
		$this->load->view('plantillas/header_content');
		$this->load->view('inicio');
		$this->load->view('plantillas/footer');
	}
	public function calendario_reserva()
	{
		$data['active'] = '1';
		$data['subactive'] = '0';

		$listar_reserva_calendario = $this->model_reservas->cargar_reserva_calendario();
		 $data = array();
                    $indice = 1;
                      foreach($listar_reserva_calendario as $row){

                          $aux['id'] = $indice;
                          $aux['title'] = $row['nombre'].'('.$row['apart'].') in: '.$row['inen'].' out: '.$row['outsal'];
                          $aux['start'] = $row['entrada'];
                          $aux['end'] = $row['salida'];
                          $data[] = $aux;
                          $indice += $indice;
                    
                   }
             echo json_encode($data);
	}
	public function calendario_venta()
	{
		
		$listar_venta_calendario = $this->model_ventas->cargar_venta_calendario();

                    $data = array();
                    $indice = 1;
                      foreach($listar_venta_calendario as $row){

                          $aux['id'] = $indice;
                          $aux['title'] = $row['clientev'].'('.$row['descripcion_ap'].') in: '.$row['inen'].' out: '.$row['outsal'];
                          $aux['start'] = $row['entrada'];
                          $aux['end'] = $row['salida'];
                          $data[] = $aux;
                          $indice += $indice;
                    
                   }
             echo json_encode($data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */