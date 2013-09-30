<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cargar_permisos_del_usuario($idusuario)
	{
			$ci =& get_instance();
			$ci->db->select('*');
			$ci->db->from('l_permisos');
			$ci->db->join('usuario_x_permiso', 'l_permisos.idpermiso = usuario_x_permiso.id_permiso_per');
			$ci->db->where('id_usuario_per', $idusuario);
			$query = $ci->db->get();
			return $query->result_array();
		
	}