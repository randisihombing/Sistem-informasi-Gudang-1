<?php
$this->load->view('layout/header');
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Jenis Barang</a>
                </li>
                <li class="active">Tambah Jenis Barang</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Tambah Jenis Barang
                </h1>
            </div>
            <div class="page-body">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form role="form" id="frmtbh">
                                    <div class="form-group">
                                        <label>Kode Jenis Barang *</label>
                                        <input class="form-control" value="" type="text" id="kode_jenis" name="kode_jenis" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang *</label>
                                        <input class="form-control" value="" type="text" id="jenis" name="jenis" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btnsimpan" class="btn btn-success btn-flat">Simpan</button>
                                        <button type="reset" class="btn btn-default btn-flat">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$this->load->view('layout/footer');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#kode_jenis").focus().select();


        $("#btnsimpan").click(function() {
            $("#frmtbh").validate({
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>/jenis/store",
                        dataType: "text",
                        data: $("#frmtbh").serialize(),
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    Swal.fire("Success", "Berhasil", "success").then(function() {
                                        window.location.href = "<?php echo base_url(); ?>jenis/kelola_jenis";
                                    });
                                    break;
                                case 'errjenis':
                                    Swal.fire("Gagal", "Kode Jenis Harus Diisi", "error").then(function() {
                                        $("#kode_kat").focus().select();
                                    });
                                    break;
                                case 'katada':
                                    Swal.fire("Gagal", "Kode Jenis Sudah Ada", "error").then(function() {
                                        $("#kode_kat").focus().select();
                                    });
                                    break;
                                case 'errnama':
                                    Swal.fire("Gagal", "Jenis Barang Harus Diisi", "error").then(function() {
                                        $("#nama").focus().select();
                                    });
                                    break;
                                case 'namaada':
                                    Swal.fire("Gagal", "Jenis Barang Sudah Ada", "error").then(
                                        function() {
                                            $("#nama").focus().select();
                                        });
                                    break;
                                default:
                                    Swal.fire("Gagal", header[0], "error");
                            }
                        }
                    });
                }
            });
        });
    });
</script>