<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal<?php echo $row->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form action="<?php echo base_url('produk/update/' . $row->id_produk); ?>" method="post">
                    <div class="form-group">
                        <label for="edit_nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="edit_nama_produk" name="edit_nama_produk" value="<?php echo $row->nama_produk; ?>" required oninvalid="this.setCustomValidity('Nama Produk Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="edit_harga">Harga</label>
                        <input type="text" class="form-control" id="edit_harga" name="edit_harga" value="<?php echo $row->harga; ?>" required oninvalid="this.setCustomValidity('Harga Tidak Boleh Kosong atau Harus Berupa Angka')" oninput="setCustomValidity('')" pattern="\d+(\.\d{2})?">
                    </div>
                    <div class="form-group">
                        <label for="edit_kategori">Kategori</label>
                        <select class="form-control" id="edit_kategori" name="edit_kategori" required>
                            <?php foreach ($daftar_kategori as $kategori) : ?>
                                <option value="<?php echo $kategori->id_kategori; ?>" <?php echo ($kategori->id_kategori == $row->kategori_id) ? 'selected' : ''; ?>><?php echo $kategori->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="edit_status" required>
                            <?php foreach ($daftar_status as $status) : ?>
                                <option value="<?php echo $status->id_status; ?>" <?php echo ($status->id_status == $row->status_id) ? 'selected' : ''; ?>><?php echo $status->nama_status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>