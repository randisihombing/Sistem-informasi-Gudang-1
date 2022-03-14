<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    function count_item()
    {
        $this->ci->load->model('barang_m');
        return $this->ci->barang_m->get()->num_rows();
    }
    function count_stock()
    {
        $this->ci->load->model('stock_m');
        return $this->ci->stock_m->get()->num_rows();
    }
    function count_user()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }
}
