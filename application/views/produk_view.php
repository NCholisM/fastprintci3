<!DOCTYPE html>
<html lang="en">

<head>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASTPRINT</title>
</head>

<body>
    <div class="container mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
            Tambah Data
        </button>
        <div class="card mt-4">
            <div class="card-header text-center bg-dark text-white">
                <h2>TES PROGRAMMER FASTPRINT</h2>
            </div>
            <div class="card-body">

                <table id="tabel-data" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" width="400px" data-orderable="false">Nama Produk</th>
                            <th scope="col" data-orderable="false">Harga</th>
                            <th scope="col" data-orderable="false">Kategori</th>
                            <th scope="col" data-orderable="false">Status</th>
                            <th scope="col" data-orderable="false">Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 0;
                    foreach ($produk as $row) :
                        $no++;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $row->nama_produk; ?></td>
                            <td><?php echo $row->harga; ?></td>
                            <td><?php echo $row->nama_kategori; ?></td>
                            <td><?php echo $row->nama_status; ?></td>
                            <td>

                                <!-- Tombol Edit -->
                                <a href="" class='btn btn-warning' data-toggle="modal" data-target="#editDataModal<?php echo $row->id_produk; ?>">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <a href='<?php echo base_url("produk/hapus/" . $row->id_produk); ?>' class='btn btn-danger' onclick="return confirm('Apakah Anda Yakin Menghapus Data?')">
                                    Hapus
                                </a>

                            </td>
                        </tr>
                        <!-- Load Modal Tambah Data dari File Terpisah -->
                        <?php include('modal_tambah_data.php'); ?>
                        <!-- Load Modal Edit Data dari File Terpisah -->
                        <?php include('modal_edit_data.php'); ?>
                    <?php endforeach; ?>

                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#tabel-data').DataTable({
                        "paging": true,
                        "pageLength": 10,
                        "searching": true,
                        "initComplete": function() {
                            this.api().columns().every(function() {
                                var column = this;
                                if (column.header().textContent === 'Status') { // Sesuaikan dengan nama kolom filter
                                    var select = $('<select><option value="">Status</option></select>')
                                        .appendTo($(column.header()).empty())
                                        .on('change', function() {
                                            var val = $.fn.dataTable.util.escapeRegex(
                                                $(this).val()
                                            );
                                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                                        });

                                    column.data().unique().sort().each(function(d, j) {
                                        select.append('<option value="' + d + '">' + d + '</option>');
                                    });
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>


</html>