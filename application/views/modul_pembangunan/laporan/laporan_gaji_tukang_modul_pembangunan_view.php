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
        Laporan gaji tukang
        <small>Halaman laporan gaji tukang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">Laporan gaji tukang</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan gaji tukang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            
                
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">PILIH KEGIATAN PEMBANGUNAN</label>
                    <div class="col-sm-2">
                        <select name="" id="id_pengajuan" class="form-control js-example-basic-single" required="required" style="width:500px;" >
                            <option value="">--SELECT ONE--</option>
                            <?php
                                $a=$this->db->query("select * from pengajuan where kategori_pengajuan='pembangunan' and status_lpj='1' order by id_pengajuan desc")->result_array();
                                if(count($a))
                                {
                                    foreach($a as $a)
                                    {
                                        echo '<option value="'.$a['id_pengajuan'].'">'.$a['nama_pengajuan'].' (WAKTU : '.$a['waktu_kegiatan'].') (TEMPAT : '.$a['tempat_kegiatan'].')</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
            <br>
            <br>
                <a class="btn btn-default" id="btn_tampil">TAMPIL</a>
                <a class="btn btn-default" id="btn_cetak" >CETAK</a>
            <br>
            <hr>
                <div class="table-responsive">
                <table class="table" id="tbl_laporan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                                <th>NO</th>
                                <th>NAMA TUKANG</th>
                                <th>TELP</th>
                                <th>ALAMAT</th>
                                <th>NOMINAL GAJI</th>
                                <th>TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        
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
    $('.js-example-basic-single').select2();
    // var table=$('#tbl_laporan').DataTable({
    //    'paging'      : true,
    //    'lengthChange': true,
    //    'searching'   : true,
    //    'ordering'    : false,
    //    'info'        : true,
    //    'autoWidth'   : true,
    //    'destroy': true,
    //  });
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


// function format(a,b,c,d) {
// 	    return '<tr><td style="width:200px;">waktu kegiatan</td><td style="width:20px;">:</td><td> '+a+'</td></tr>'+
//                         '<tr><td style="width:200px;">tempat kegiatan</td><td style="width:20px;">:</td><td> '+b+'</td></tr>'+
//                         '<tr><td style="width:200px;">rincian kegiatan</td><td style="width:20px;">:</td><td> '+c+'</td></tr>'+
//                         '<tr><td style="width:200px;">pj kegiatan</td><td style="width:20px;">:</td><td> '+d+'</td></tr>';
// };


    

// $("tbody").on("click","#btn_detail", function () {
//         var tr = $(this).closest('tr');
// 	    var row = table.row(tr);

// 	    if (row.child.isShown()) {
// 	        // This row is already open - close it
// 	        row.child.hide();
// 	        tr.removeClass('shown');
// 	    } 
//         else {
// 	        // Open this row
// 	        row.child(format(tr.data('waktu_kegiatan'),tr.data('tempat_kegiatan'),tr.data('rincian_kegiatan'),tr.data('pj_kegiatan'))).show();
// 	        tr.addClass('shown');
// 	    }
// });

$("#btn_tampil").click(function (e) { 
            e.preventDefault();
            //alert('tampil');
            var id_pengajuan= $("#id_pengajuan").val();
            
            //lert(kegiatan+tgl_awal+tgl_akhir);

            if(id_pengajuan == "")
            {
                $.alert('silahkan pilih kegiatan terlebih dahulu');
            }
            else
            {
                $.ajax({
                        type: "post",
                        url: "<?php echo base_url();?>index.php/modul_pembangunan/laporan/tampil_gaji_tukang_list",
                        data: {id_pengajuan:id_pengajuan,},
                        dataType: "json",
                        success: function (data) {
                                    console.log(data);
                                    var html = '';
                                    var i;
                                    if(data.length>0)
                                    {
                                        for(i=0;i<data.length;i++)
                                        {
                                            html += "<tr>"+
                                                        "<td id_gaji_tukang='"+data[i].id_gaji_tukang+"' class='id_gaji_tukang'>"+(i+1)+"</td>"+
                                                        "<td>"+data[i].nama_tukang+"</td>"+
                                                        "<td>"+data[i].no_telp+"</td>"+
                                                        "<td>"+data[i].alamat+"</td>"+
                                                        "<td>"+data[i].nominal_gaji_tukang+"</td>"+
                                                        "<td>"+data[i].tgl_gaji_tukang+"</td>"+
                                                    "</tr>";
                                        }
                                        html +="<tr class='warning'><td colspan='4' align='center'><b>TOTAL</b></td><td>"+data[0].total+"</td></tr>";
                                    }
                                    else
                                    {
                                        html+="<tr class='warning'><td colspan='7' align='center'>TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>";
                                    }
                                    
                                    $('#show_data').html(html);
                        }, error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);
                        }        
                });
            }
            
});
$("#btn_cetak").click(function (e) { 
            e.preventDefault();
            var id_pengajuan= $("#id_pengajuan").val();
            
            //lert(kegiatan+tgl_awal+tgl_akhir);

            if(id_pengajuan == "")
            {
                $.alert('silahkan pilih kegiatan terlebih dahulu');
            }
            else
            { 
                location.href="<?php echo base_url();?>index.php/modul_pembangunan/laporan/cetak_laporan_gaji_tukang/"+id_pengajuan;
            }


});
</script>