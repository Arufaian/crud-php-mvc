<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Manajemen Siswa</h1>
                        <p class="text-muted mb-0">Kelola dan lihat semua siswa dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?controller=siswa&action=create" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Siswa Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Siswa Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Nama Kelas</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>ID SPP</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($siswa)): ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <p class="text-muted mb-2">Tidak ada siswa ditemukan</p>
                                            <a href="index.php?controller=siswa&action=create" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle me-1"></i>Tambah Siswa Pertama
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($siswa as $s): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($s['nisn']); ?></strong></td>
                                            <td><?php echo htmlspecialchars($s['nis']); ?></td>
                                            <td><?php echo htmlspecialchars($s['nama']); ?></td>
                                            <td><?php echo htmlspecialchars($s['nama_kelas']); ?></td>
                                            <td><?php echo htmlspecialchars($s['alamat']); ?></td>
                                            <td><?php echo htmlspecialchars($s['no_telp']); ?></td>
                                            <td><?php echo htmlspecialchars($s['id_spp']); ?></td>
                                            <td class="text-center">
                                                <a href="index.php?controller=siswa&action=edit&id=<?php echo $s['nisn']; ?>" class="btn btn-warning btn-sm" title="Edit siswa">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="index.php?controller=siswa&action=delete&id=<?php echo $s['nisn']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');" title="Hapus siswa">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
