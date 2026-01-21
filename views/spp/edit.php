<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Edit SPP</h1>
                        <p class="text-muted mb-0">Perbarui informasi SPP.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?controller=spp&action=index" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke SPP
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="index.php?controller=spp&action=edit&id=<?php echo $spp['id_spp']; ?>">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" value="<?php echo htmlspecialchars($spp['tahun']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" value="<?php echo htmlspecialchars($spp['nominal']); ?>" required>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Perbarui
                                    </button>
                                    <a href="index.php?controller=spp&action=index" class="btn btn-outline-secondary">
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
