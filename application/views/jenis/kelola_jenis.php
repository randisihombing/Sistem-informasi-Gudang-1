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
                <li class="active">Kelola Jenis Barang</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Kelola Jenis Barang
                </h1>
            </div>
            <div class="page-body">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>Kode Jenis Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $data_jen) {
                                ?>
                                    <tr>
                                        <td><?php echo $data_jen->id_jenis ?></td>
                                        <td><?php echo $data_jen->jenis_barang ?></td>
                                        <td class="text-center" width="160px">
                                            <button class="btn btn-warning btn-xs" id="btnedit" data-id="<?php echo $data_jen->id_jenis ?>" title="Atur">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger btn-xs" id="btndel" data-id="<?php echo $data_jen->id_jenis ?>" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="frmUbh">
                    <div class="form-group">
                        <label>Kode Jenis Barang</label>
                        <input class="form-control" type="text" id="kode_jen" name="kode_jen" placeholder="Masukan kode kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input class="form-control" id="jenis" name="jenis" placeholder="Masukan nama kategori">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnsave">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#btnedit', function() {
            var kode_jen = $(this).attr("data-id");

            $.ajax({
                type: "post",
                url: "<?php echo base_url();  ?>jenis/cari",
                dataType: "json",
                data: {
                    kode_jen: kode_jen
                },
                cache: false,
                success: function(data) {
                    $('#kode_jen').val(data[0].id_jenis);
                    $('#jenis').val(data[0].jenis_barang);
                    $('#modal-Edit').modal('show');
                    setTimeout(function() {
                        $("#jenis").focus().select();
                    }, 1000);
                }
            });
        });
        $(document).on('click', '#btnsave', function() {
            var kode_jen = $("#kode_jen").val();
            var jenis = $("#jenis").val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>/jenis/update",
                dataType: "text",
                data: {
                    kode_jen: kode_jen,
                    jenis: jenis
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    switch (header[0]) {
                        case 'OK':
                            Swal.fire("Success", "Berhasil", "success").then(function() {
                                window.location.href = "<?php echo base_url(); ?>/jenis/kelola_jenis";
                            });
                            break;
                        case 'errkode':
                            Swal.fire("Gagal", "Kode kategori Barang Harus Diisi", "error").then(function() {
                                $("#kode_kat").focus().select();
                            });
                            break;
                        case 'errnama':
                            Swal.fire("Gagal", "Nama kategori Barang Harus Diisi", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        case 'namaada':
                            Swal.fire("Gagal", "Nama kategori Barang Sudah Ada", "error").then(function() {
                                $("#nama").focus().select();
                            });
                            break;
                        default:
                            Swal.fire("Gagal", header[0], "error");
                    }
                }
            });
        });

        $(document).on('click', '#btndel', function() {
            var kode_jen = $(this).attr("data-id");

            Swal.fire({
                title: "Apakah Anda Yakin Ingin Menghapus Data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Hapus`
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url();  ?>jenis/delete",
                        dataType: "text",
                        data: {
                            kode_jen: kode_jen
                        },
                        cache: false,
                        success: function(data) {
                            var header = data.split("\t");
                            switch (header[0]) {
                                case 'OK':
                                    setTimeout(function() {
                                        Swal.fire('Success', 'Berhasil', 'success').then(function() {
                                            window.location.href = "<?php echo base_url(); ?>jenis/kelola_jenis";
                                        });
                                    }, 1000);
                                    break;
                                default:
                                    setTimeout(function() {
                                        Swal.fire("Gagal", header[0], "error");
                                    }, 1000);
                            }
                        }
                    });
                }
            })
        });
    });
</script>