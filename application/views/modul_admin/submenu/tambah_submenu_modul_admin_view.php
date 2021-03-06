<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/select2/dist/css/select2.min.css">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      submenu
        <small>Halaman kelola submenu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/submenu">List submenu</a></li>
        <li><a href="#">Tambah submenu</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah submenu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form>
            <div class="form-group">
        <p class="help-block">Menu | (Modul)</p>
        <select class="form-control js-example-basic-single" id="menu" style="width:100%;">
        <?php 
            $data_modul=$this->db->query('select * from modul order by id asc')->result_array();
            $d_menu=$this->db->query('select * from menu order by order_menu asc')->result_array();
            if(count($d_menu))
            {
                foreach($d_menu as $l)
                {
                    foreach($data_modul as $a)
                    {
                        if($a['id']==$l['id_modul'])
                        {
                            echo '<option value="'.$l['id'].'">'.$l['nama_menu'].' | ('.$a['nama_modul'].')</option>';
                        }
                    }
                    
                }
            }
        ?>
          </select>
    </div>
    <div class="form-group">
        <p class="help-block">Nama submenu</p><input type="text" class="form-control" id="nama" /></div>
    <div class="form-group">
        <p class="help-block">Link submenu</p><input type="text" class="form-control" id="link" value="#"/></div>
    <div class="form-group">
        <p class="help-block">Order submenu</p><input type="number" class="form-control" id="order" /></div>
    
        <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/submenu" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
        </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
    

    </section>
    <!-- /.content -->

    <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/fontawesome-iconpicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
            //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
            
    });
var setDefaultActive = function() {
    var url = localStorage.getItem("url");
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}           

setDefaultActive();
//Save product
$('#btn_simpan').on('click',function(){
            var nama_submenu = $('#nama').val();
            var id_menu = $('#menu').val();
            var link_submenu  = $('#link').val();
            var order_submenu = $('#order').val();
            
            if(nama_submenu==""||id_menu==""||link_submenu ==""||order_submenu=="")
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Form tidak boleh ada yg kosong !'});
            }
            else
            {
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url();?>index.php/modul_admin/submenu/aksi_tambah_submenu",
                dataType : "JSON",
                data : {nama_submenu:nama_submenu,id_menu:id_menu,link_submenu:link_submenu,order_submenu:order_submenu},
                success: function(data){
                    $.alert('Simpan berhasil');
                    window.location.href='<?php echo base_url();?>index.php/modul_admin/submenu';
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);

                  }
                });
            }
            
			//alert('tombol kepencet');
            return false;
        });
</script>