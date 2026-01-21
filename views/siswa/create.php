<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Tambah Siswa Baru</h1>
                        <p class="text-muted mb-0">Buat siswa baru dalam sistem.</p>
                    </div>
                    <div class="col-auto">
                        <a href="index.php?controller=siswa&action=index" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Siswa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="index.php?controller=siswa&action=create">
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Contoh: 1234567890" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Contoh: 2021.001" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: John Doe" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_kelas" class="form-label">Kelas</label>
                                    <select class="form-select" id="nama_kelas" name="nama_kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?php echo $k['nama_kelas']; ?>">
                                                <?php echo htmlspecialchars($k['nama_kelas'] . ' - ' . $k['komp_keahlian']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label">ID Kelas</label>
                                    <select class="form-select" id="id_kelas" name="id_kelas" required>
                                        <option value="">Pilih ID Kelas</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?php echo $k['id_kelas']; ?>">
                                                <?php echo htmlspecialchars($k['nama_kelas'] . ' (ID: ' . $k['id_kelas'] . ')'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Jl. Jalan No. 1"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Contoh: 081234567890">
                                </div>

                                <div class="mb-3">
                                    <label for="id_spp" class="form-label">ID SPP</label>
                                    <input type="number" class="form-control" id="id_spp" name="id_spp" value="0">
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Simpan
                                    </button>
                                    <a href="index.php?controller=siswa&action=index" class="btn btn-outline-secondary">
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
