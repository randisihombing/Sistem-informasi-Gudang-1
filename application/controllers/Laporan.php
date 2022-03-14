<?php
class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['barang_m', 'stock_m']);
    }

    public function stock()
    {
        $data['barang'] = $this->barang_m->get();
        $this->load->view('laporan/stock', $data);
    }

    public function cetak_stock()
    {
        $this->load->view('laporan/cetak_laporan_stock');
    }
}
