<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Manajemen Petugas</h1>
                        <p class="text-muted mb-0">Kelola dan lihat semua petugas dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?action=create" class="btn btn-primary btn-sm">
                            <i class="bi bi-person-plus me-2"></i>Tambah Petugas Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Petugas Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama Petugas</th>
                                    <th>Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($petugas)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <p class="text-muted mb-2">Tidak ada petugas ditemukan</p>
                                            <a href="index.php?action=create" class="btn btn-sm btn-primary">
                                                <i class="bi bi-person-plus me-1"></i>Tambah Petugas Pertama
                                            </a>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($petugas as $p): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($p['id_petugas']); ?></strong></td>
                                            <td><?php echo htmlspecialchars($p['username']); ?></td>
                                            <td><?php echo htmlspecialchars($p['nama_petugas']); ?></td>
                                            <td>
                                                <span class="badge <?php echo $p['level'] === 'admin' ? 'bg-danger' : 'bg-primary'; ?>">
                                                    <?php echo htmlspecialchars(ucfirst($p['level'])); ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="index.php?action=edit&id=<?php echo $p['id_petugas']; ?>" class="btn btn-warning btn-sm" title="Edit petugas">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="index.php?action=delete&id=<?php echo $p['id_petugas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus petugas ini?');" title="Hapus petugas">
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
