<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/menu_model');
    }

    public function index()
    {
        //$data['data_menu']=$this->menu_model->tampil_menu(5);
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['page']='modul_admin/beranda_modul_admin_view';
			$this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }
} 

?>