<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Acc_rencana_anggaran extends CI_Controller
{
            function __construct()
            {
                        parent::__construct();
                        $this->load->model('modul_kegiatan/acc_rencana_anggaran_model');   
            }

            public function index()
            {

            }

            public function yatim()
            {
                        if($this->session->id_user=="")
                        {
                                    redirect(base_url('index.php/auth'), 'refresh');
                        }
                        else
                        {
                                    //$data['data_kegiatan_yatim']=$this->acc_rencana_anggaran_model->tampil_acc_rencana_anggaran_yatim_list();
                                    $data['page']='modul_kegiatan/acc_rencana_anggaran/acc_rencana_anggaran_yatim_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
                        }
                                
            }

            public function yayasan()
            {
                        if($this->session->id_user=="")
                        {
                                    redirect(base_url('index.php/auth'), 'refresh');
                        }
                        else
                        {
                                    //$data['data_kegiatan_yayasan']=$this->acc_rencana_anggaran_model->tampil_acc_rencana_anggaran_yayasan_list();
                                    $data['page']='modul_kegiatan/acc_rencana_anggaran/acc_rencana_anggaran_yayasan_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data); 
                        }
                          
            }

            public function aksi_edit_acc_rencana_anggaran()
            {
                        $data  = $this->acc_rencana_anggaran_model->edit_acc_rencana_anggaran();
                        echo json_encode($data);     
            }
}
?>