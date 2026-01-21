<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Tambah Petugas Baru</h1>
                        <p class="text-muted mb-0">Buat petugas baru dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?action=petugas" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Petugas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="index.php?action=create">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
                                </div>

                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <select class="form-select" id="level" name="level">
                                        <option value="petugas">Petugas</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Simpan
                                    </button>
                                    <a href="index.php?action=petugas" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-2"></i>Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
