<?php

class Jenis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->model('jenis_m');
        set_time_limit(0);
        ini_set('memory_limit', '20000M');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_jenis()
    {
        $this->load->view('jenis/jenis_tambah');
    }

    public function store()
    {
        $kode_jenis = $_POST['kode_jenis'];
        $jenis       = $_POST['jenis'];
        $tgl_true   = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $kode_jenis = ltrim(rtrim($kode_jenis));
        $jenis       = ltrim(rtrim($jenis));


        //disini cek dulu kode kategori kosong atau tidak
        if ($kode_jenis == "") {
            echo "errkat\t";
            exit();
        }

        //disini cek kode kategori sudah ada atau belum
        $cek_kat = $this->jenis_m->cek_kode_kategori($kode_jenis);
        if ($cek_kat > 0) {
            echo "katada\t";
            exit();
        }

        //disini cek nama barang kosong atau tidak
        if ($jenis == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama barang sudah ada atau belum
        $cek_nama = $this->jenis_m->cek_nama_barang($jenis);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("INSERT INTO jenis SET
        				    id_jenis = '$kode_jenis',
        				    jenis_barang   = '$jenis',
                            created_by = '$user_login',
                            created_date = '$tgl_true'");

        echo "OK\t";
    }

    public function kelola_jenis()
    {
        $data['data'] = $this->jenis_m->get_alldata('jenis');
        $this->load->view('jenis/kelola_jenis', $data);
    }

    public function cari()
    {
        $kode_jen = $_POST['kode_jen'];

        $data = $this->jenis_m->cari('jenis', $kode_jen);

        echo json_encode($data);
    }

    public function update()
    {

        $kode_jen            = $_POST['kode_jen'];
        $jenis                = $_POST['jenis'];
        $tgl_true            = date("Y-m-d H:i:s");

        $user_login = $this->session->userdata("username");

        $kode_jen            = ltrim(rtrim($kode_jen));
        $jenis                = ltrim(rtrim($jenis));

        //disini cek kode  kategori barang kosong atau tidak
        if ($kode_jen == "") {
            echo "errkode\t";
            exit();
        }

        //disini cek nama kategori barang kosong atau tidak
        if ($jenis == "") {
            echo "errnama\t";
            exit();
        }

        //disini cek nama kategori barang sudah ada atau belum
        $cek_nama = $this->jenis_m->cek_nama_kode_kategori('kategori', $kode_jen, $jenis);
        if ($cek_nama > 0) {
            echo "namaada\t";
            exit();
        }

        $this->db->query("UPDATE jenis SET
                                    id_jenis = '$kode_jen',
                                    jenis_barang = '$jenis',
                                    modified_by = '$user_login',
                                    modified_date = '$tgl_true'
                                    WHERE id_jenis = '$kode_jen'");
        echo "OK\t";
    }

    public function delete()
    {
        $kode_jen = $_POST['kode_jen'];

        $data = $this->jenis_m->cek_kategori('barang', $kode_jen);

        if ($data > 0) {
            echo "Kode Jenis Sudah Digunakan di Data Barang\t";
            exit();
        }

        $this->db->query("DELETE FROM jenis WHERE id_jenis = '$kode_jen'");
        echo "OK\t";
    }
}
