<?php
class Produk_model extends CI_Model
{
    // Tampil Data 
    function get_produk()
    {
        $this->db->select('p.*, k.nama_kategori, s.nama_status');
        $this->db->from('produk as p');
        $this->db->join('kategori as k', 'p.kategori_id = k.id_kategori', 'inner');
        $this->db->join('status as s', 'p.status_id = s.id_status', 'inner');
        $this->db->order_by('p.id_produk', 'ASC');
        // $this->db->where('s.nama_status', 'Bisa Dijual');
        $query = $this->db->get();
        return $query->result();
    }
    function get_daftar_kategori()
    {
        // Query untuk mendapatkan daftar kategori
        $query = $this->db->get('kategori');
        return $query->result();
    }
    function get_daftar_status()
    {
        // Query untuk mendapatkan daftar kategori
        $query = $this->db->get('status');
        return $query->result();
    }
    // Tambah Data 
    function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    // Edit Data 
    function get_produk_by_id($id_produk)
    {
        $this->db->select('p.*, k.nama_kategori, s.nama_status');
        $this->db->from('produk as p');
        $this->db->join('kategori as k', 'p.kategori_id = k.id_kategori', 'inner');
        $this->db->join('status as s', 'p.status_id = s.id_status', 'inner');
        $this->db->where('p.id_produk', $id_produk);
        $query = $this->db->get();
        return $query->row();
    }
    function update_produk($id_produk, $data)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }
    // Hapus Data 
    function delete_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
}
