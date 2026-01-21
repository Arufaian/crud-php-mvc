<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Manajemen Kelas</h1>
                        <p class="text-muted mb-0">Kelola dan lihat semua kelas dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?controller=kelas&action=create" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Kelas Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kelas Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kelas</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($kelas)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <p class="text-muted mb-2">Tidak ada kelas ditemukan</p>
                                            <a href="index.php?controller=kelas&action=create" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle me-1"></i>Tambah Kelas Pertama
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($kelas as $k): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($k['id_kelas']); ?></strong></td>
                                            <td><?php echo htmlspecialchars($k['nama_kelas']); ?></td>
                                            <td><?php echo htmlspecialchars($k['komp_keahlian']); ?></td>
                                            <td class="text-center">
                                                <a href="index.php?controller=kelas&action=edit&id=<?php echo $k['id_kelas']; ?>" class="btn btn-warning btn-sm" title="Edit kelas">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="index.php?controller=kelas&action=delete&id=<?php echo $k['id_kelas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');" title="Hapus kelas">
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
