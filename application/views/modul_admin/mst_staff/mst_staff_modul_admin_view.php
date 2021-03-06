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
        Master data staff
        <small>Halaman kelola data staff</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list data staff</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List data staff</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah data staff</a>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff/cetak" style="margin-bottom:10px;"class="btn btn-danger pull-right" type="button" id="btn_cetak"><i class="fas fa-print"></i> Cetak</a>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff/export"style="margin-bottom:10px;"class="btn btn-danger pull-right" type="button"><i class="fas fa-upload"></i> Export</a>
            <a style="margin-bottom:10px;"class="btn btn-danger pull-right" type="button" id="btn_toggle_import"><i class="fas fa-download"></i> Import</a>
            <br>
            <div id="import_row">
                <form id="submit_import" method="post" action="mst_staff/import" enctype="multipart/form-data"><input style="width:100%;height:50px;" class="form-control-file" name="attachment_data" type="file" accept=".csv" /> <button class="btn btn-default" type="submit" style="width:100%;">Mulai proses import</button></form>
            </div>
            <br>
            
                <div class="table-responsive">
                <table class="table" id="tbl_mst_staff" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID STAFF</th>
                            <th>FOTO STAFF</th>
                            <th>NAMA LENGKAP STAFF</th>
                            <th>JENIS KELAMIN</th>
                            <th>TTL</th>
                            <th>JABATAN</th>
                            <th>ALAMAT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            if(count($data_mst_staff))
                            {
                                foreach($data_mst_staff as $list)
                                {
                                    echo '<tr>';
                                    echo '<td class="id_staff">'.$list['id_staff'].'</td>';
                                    if($list['foto_staff']=="")
                                    {
                                        echo '<td class="foto" file_foto="'.$list['foto_staff'].'"><img style="width:100px;height:100px;" src="'.base_url().'/assets/upload/index.png"></td>';
                                    }
                                    else
                                    {
                                        echo '<td class="foto" file_foto="'.$list['foto_staff'].'"><img style="width:100px;height:100px;" src="'.base_url().'/assets/upload/'.$list['foto_staff'].'"></td>';
                                    }
                                    
                                    echo '<td class="nama_staff">'.$list['nama_staff'].'</td>';
                                    echo '<td class="jk_staff">'.$list['jk_staff'].'</td>';
                                    echo '<td class="ttl" tempat="'.$list['t_staff'].'" tanggal="'.$list['tl_staff'].'">'.$list['t_staff'].', '.$list['tl_staff'].'</td>';
                                    echo '<td class="jabatan_staff">'.$list['jabatan_staff'].'</td>';
                                    echo '<td class="alamat_staff">'.$list['alamat_staff'].'</td>';
                                    echo '<td style="width:170px;">';
                                    echo    '<div class="btn-toolbar" style="width:100%;">';
                                    echo        '<div role="group" class="btn-group"><button id="btn_edit" data-toggle="modal" data-target="#modal-default" class="btn btn-default" type="button"><i class="fa fa-edit"></i> Edit</button><button id="btn_hapus" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i> Hapus</button></div>';
                                    echo    '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                            
                        
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
    

    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-default" style="margin: 0 auto;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit staff</h4>
              </div>
        <div class="modal-body">
    <form id="submit_edit">
    <div class="form-group">
        <p class="help-block">ID STAFF</p><input name="id" type="text" readonly class="form-control" id="id_edit" /></div>
    <div class="form-group">
        <p class="help-block">FOTO STAFF</p>
        <input type="file" class="form-control" name="file" id="foto_edit" accept="image/*"/>
    </div>
    <div class="form-group">
        <p class="help-block">NAMA LENGKAP STAFF</p><input name="nama" type="text" class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">JENIS KELAMIN</p>
        
        <select name="jk" id="jk_edit" class="form-control" >
            <option value="LAKI-LAKI">LAKI-LAKI</option>
            <option value="PEREMPUAN">PEREMPUAN</option>
        </select>
        
    </div>
    <div class="form-group">
        <p class="help-block">TEMPAT TANGGAL LAHIR</p>
        <input type="text" class="form-control" id="t_edit" name="t"  />
        <input type="date" class="form-control" id="tl_edit" name="tl">
    </div>
    <div class="form-group">
        <p class="help-block">JABATAN</p>
        <input type="text" class="form-control" id="jabatan_edit" name="jabatan" />
    </div>
    <div class="form-group">
        <p class="help-block">ALAMAT</p>
        <textarea name="alamat" id="alamat_edit" class="form-control"></textarea>
    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button id="btn_simpan_edit" type="submit" class="btn btn-primary">Simpan perubahan</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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
    //$('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    //$('.js-example-basic-single').select2();
    $('#tbl_mst_staff').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : false,
     'info'        : true,
     'autoWidth'   : true
    });
    $('#import_row').hide();
});

$('#btn_toggle_import').click(function (e) { 
    e.preventDefault();
    $('#import_row').toggle(2000);
});
var setDefaultActive = function() {
            var url = String(window.location);
            var url = url.replace('#', '');
            localStorage.setItem("url", url);
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();

            //console.log($('ul  li a[href="'+url+'"]').parent().parent().parent());
}           

setDefaultActive();

$('body').on('click','#btn_edit',function(){
        
        var row             = $(this).closest("tr");    // Find the row
        var id_staff        = row.find(".id_staff").text(); // Find the text
        var nama_staff      = row.find('.nama_staff').text();
        var jk_staff        = row.find('.jk_staff').text();
        var jabatan_staff   = row.find('.jabatan_staff').text();
        var alamat_staff   = row.find('.alamat_staff').text();
        var t_staff         = row.find('.ttl').attr('tempat');
        var tl_staff        = row.find('.ttl').attr('tanggal');
        var foto            = row.find('.foto').attr('file_foto');
        
        
        // alert(id_staff+' '+nama_staff+' '+jk_staff+' '+jabatan_staff+' '+t_staff +' '+tl_staff );
        $('#id_edit').val(id_staff);
        $('#nama_edit').val(nama_staff);
        $('#jk_edit').val(jk_staff);
        $('#t_edit').val(t_staff);
        $('#tl_edit').attr('value',tl_staff);
        $('#jabatan_edit').val(jabatan_staff);
        $('#alamat_edit').val(alamat_staff);
       
});


$('body').on('click','#btn_hapus',function(){
        var row = $(this).closest("tr");    // Find the row
        var id_mst_staff = row.find(".id_staff").text(); // Find the text
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_admin/mst_staff/aksi_hapus_mst_staff",
                        dataType : "JSON",
                        data : {id_mst_staff:id_mst_staff},
                        success: function(data){
                            $.alert('Data terhapus !');
                            console.log(data);
                            location.reload();
                            
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                    });
                },
                cancel: function () {
                    
                },
            }
        });
        
        
       
});

$('#submit_edit').submit(function(e){
    e.preventDefault(); 
    $.ajax({
                     url:'<?php echo base_url();?>index.php/modul_admin/mst_staff/aksi_edit_mst_staff',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          $.alert('Tersimpan');
                          console.log(data);
                            location.reload();
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                 });
        
});

// $('#submit_import').submit(function(e){
//     e.preventDefault(); 
//     $.ajax({
//                      url:'<?php echo base_url();?>index.php/modul_admin/mst_staff/import',
//                      type:"post",
//                      data:new FormData(this),
//                      processData:false,
//                      contentType:false,
//                      cache:false,
//                      async:false,
//                       success: function(data){
//                           $.alert('Tersimpan');
//                           console.log(data);
//                             location.reload();
//                         },
//                         error: function(xhr, textStatus, error) {
//                             console.log(xhr.responseText);
//                             console.log(xhr.statusText);
//                             console.log(textStatus);
//                             console.log(error);

//                         }
//                  });
        
// });
</script>