<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Edit Kelas</h1>
                        <p class="text-muted mb-0">Perbarui informasi kelas.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?action=kelas" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Kelas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="index.php?action=edit&id=<?php echo $kelas['id_kelas']; ?>">
                                <div class="mb-3">
                                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo htmlspecialchars($kelas['nama_kelas']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="komp_keahlian" class="form-label">Kompetensi Keahlian</label>
                                    <input type="number" class="form-control" id="komp_keahlian" name="komp_keahlian" value="<?php echo htmlspecialchars($kelas['komp_keahlian']); ?>">
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Perbarui
                                    </button>
                                    <a href="index.php?action=kelas" class="btn btn-outline-secondary">
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
