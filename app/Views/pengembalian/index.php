<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pengembalian</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengembalian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kembali as $i => $km) :
                                    //dd($km);
                                ?>

                                    <tr>
                                        <th scope="row"><?= $i + 1; ?></th>
                                        <td><?= $km->nama; ?></td>
                                        <td><?= $km->judul_buku; ?></td>
                                        <td><?= $km->tgl_pinjam; ?></td>
                                        <td><?= $km->tgl_kembali; ?></td>
                                        <td><?= $km->tgl_dikembalikan; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <?= $this->endSection(); ?>