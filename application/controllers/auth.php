<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    function __construct() {
        parent::__construct();
        // $this->load->model('login_model');
    }

    public function index()
    {
			$this->load->view('login');
    }

    public function login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $d_login=$this->db->query('select u.*, (select nama_staff from mst_staff where id_staff=u.id_staff) as nama_user, (select jabatan_staff from mst_staff where id_staff=u.id_staff) as bagian_user from user u where u.id_user="'.$username.'" and u.pass_user="'.$password.'"')->result();
        if(count($d_login)>0)
        {
            if($d_login[0]->status_user=="Aktif")
            {
                $datases=array(
                        'id_user'    => $d_login[0]->id_user,
                        'id_staff'    => $d_login[0]->id_staff,
                        'nama_user'  => $d_login[0]->nama_user,
                        'group_user' => $d_login[0]->group_user,
                );
                $this->session->set_userdata($datases);
                
                //$this->load->view('admin/admin.php');
                redirect(base_url('index.php/modul_list'), 'refresh');
            }
            else
            {
                echo "<script>alert('Status USER dinonaktifkan'); window.location.replace('".base_url()."');</script>";
            }
        }
        else
        {
            echo "<script>alert('Gagal Login'); window.location.replace('".base_url()."');</script>";
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url(),'refresh');
    }
} 

?>