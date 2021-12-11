<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline small text-capitalize">
                            Administrator
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/startbootstrap/img/avatar/user.png') ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a href="/logout" class="dropdown-item"  data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                          </a>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- /.content-header -->
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Peminjaman</h1>
                
                <a href="/peminjaman/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
                <!-- DataTales Example -->
                <div class="card mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th scope="col">NO</th>
                                        <th scope="col">Id Peminjaman</th>
                                        <th scope="col">Peminjam</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pinjam as $i => $pj) :
                                            
                                        $tgl_kembali = new DateTime($pj->tgl_kembali);
                                        $tgl_sekarang = new DateTime();
                                        $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                                        $selisahKembali = $tgl_kembali->diff($tgl_sekarang)->format("%a") - 6;
                                        
                                    ?> 
                                    <tr>
                                        <th scope="row"><?= $i + 1;?></th>
                                        <td><?= $pj->id_peminjaman; ?></td>
                                        <td><?= $pj->nama; ?></td>
                                        <td><?= $pj->judul_buku; ?></td>
                                        <td><?= $pj->tgl_pinjam; ?></td>
                                        <td><?= $pj->tgl_kembali; ?></td>
                                        <td>
                                                <?php 
                                                if($tgl_kembali >= $tgl_sekarang OR $selisih == 0){
                                                    echo "<span class='badge bg-warning'>Belom di Kembalikan </span>";
                                                }else{
                                                    echo "Telat <b style = 'color:red;'>".$selisih."</b> Hari <br> <span class='badge bg-danger'> Denda Perhari = 1.000";
                                                }
                                            
                                            ?>
                                        </td>
                                        <td align="center">
                                           
                                                <a href="<?= base_url('peminjaman/kembalikan')?>/<?= $pj->id_p;?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin Buku ini mau di Kembalikan ? <?php echo '\n Anda harus bayar ='. $selisahKembali*1000; ?>');"> Kembalikan</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?= $this->endSection(); ?>