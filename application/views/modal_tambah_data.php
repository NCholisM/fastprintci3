<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Data -->
                <form action="<?php echo base_url('produk/tambah'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required oninvalid="this.setCustomValidity('Nama Produk Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required oninvalid="this.setCustomValidity('Harga Tidak Boleh Kosong atau Harus Berupa Angka')" oninput="setCustomValidity('')" pattern="\d+(\.\d{2})?">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <!-- Formulir Select untuk Kategori -->
                        <select class="form-control" id="kategori" name="kategori" required>
                            <?php foreach ($daftar_kategori as $kategori) : ?>
                                <option value="<?php echo $kategori->id_kategori; ?>"><?php echo $kategori->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <!-- Formulir Select untuk Status -->
                        <select class="form-control" id="status" name="status" required>
                            <?php foreach ($daftar_status as $status) : ?>
                                <option value="<?php echo $status->id_status; ?>"><?php echo $status->nama_status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>