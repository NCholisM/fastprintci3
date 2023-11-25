<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }
    // Tampil Data 
    function index()
    {
        $data['produk'] = $this->produk_model->get_produk();
        $data['daftar_kategori'] = $this->produk_model->get_daftar_kategori();
        $data['daftar_status'] = $this->produk_model->get_daftar_status();
        $this->load->view('produk_view', $data);
    }
    // Tambah Data 
    function tambah()
    {
        // Tambahkan data ke database tanpa validasi
        $data = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'kategori_id' => $this->input->post('kategori'),
            'status_id' => $this->input->post('status'),
        );

        $this->produk_model->insert_produk($data);

        // Redirect ke halaman produk setelah berhasil tambah data
        redirect('produk');
    }
    // Edit Data 
    function edit($id_produk)
    {
        $data['produk'] = $this->produk_model->get_produk_by_id($id_produk);
        $data['daftar_kategori'] = $this->produk_model->get_daftar_kategori();
        $data['daftar_status'] = $this->produk_model->get_daftar_status();
        $this->load->view('edit_produk_view', $data);
    }

    function update($id_produk)
    {
        $this->form_validation->set_rules('edit_nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('edit_harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('edit_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('edit_status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id_produk); // Jika validasi gagal, kembali ke form edit
        } else {
            $data = array(
                'nama_produk' => $this->input->post('edit_nama_produk'),
                'harga' => $this->input->post('edit_harga'),
                'kategori_id' => $this->input->post('edit_kategori'),
                'status_id' => $this->input->post('edit_status'),
            );

            $this->produk_model->update_produk($id_produk, $data);
            redirect('produk'); // Redirect ke halaman produk setelah berhasil update
        }
    }
    // Hapus Data
    function hapus($id_produk)
    {
        $this->produk_model->delete_produk($id_produk);
        redirect('produk'); // Redirect ke halaman produk setelah berhasil menghapus
    }
}
