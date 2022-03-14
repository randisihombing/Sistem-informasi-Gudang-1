<?php

class jenis_m extends CI_Model
{

    public function cek_kode_kategori($kode_jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM jenis WHERE id_jenis ='$kode_jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_barang($jenis)
    {
        $chek_code = $this->db->query("SELECT * FROM jenis WHERE jenis_barang ='$jenis'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_nama_kode_kategori($kode_jen, $jenis_barang)
    {
        $chek_code = $this->db->query("SELECT * FROM jenis WHERE jenis_barang ='$jenis_barang' and id_jenis != '$kode_jen'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kode_kategori_barang($kode_jen)
    {
        $chek_code = $this->db->query("SELECT * FROM jenis WHERE id_jen != '$kode_jen'");
        return json_encode($chek_code->num_rows());
    }

    public function cek_kategori($table, $kode_jen)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_jenis', $kode_jen);
        $result = $this->db->get();
        return json_encode($result->num_rows());
    }

    public function get_alldata($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $result = $this->db->get()->result();
        return $result;
    }

    public function cari($table, $kode_jen)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_jenis', $kode_jen);
        $result = $this->db->get()->result();
        return $result;
    }
}
