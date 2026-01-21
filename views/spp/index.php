<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Manajemen SPP</h1>
                        <p class="text-muted mb-0">Kelola dan lihat semua data SPP dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?controller=spp&action=create" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-2"></i>Tambah SPP Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- SPP Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID SPP</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($spp)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <p class="text-muted mb-2">Tidak ada data SPP ditemukan</p>
                                            <a href="index.php?controller=spp&action=create" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle me-1"></i>Tambah SPP Pertama
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($spp as $s): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($s['id_spp']); ?></strong></td>
                                            <td><?php echo htmlspecialchars($s['tahun']); ?></td>
                                            <td><?php echo 'Rp ' . number_format(htmlspecialchars($s['nominal']), 0, ',', '.'); ?></td>
                                            <td class="text-center">
                                                <a href="index.php?controller=spp&action=edit&id=<?php echo $s['id_spp']; ?>" class="btn btn-warning btn-sm" title="Edit SPP">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="index.php?controller=spp&action=delete&id=<?php echo $s['id_spp']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data SPP ini?');" title="Hapus SPP">
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
