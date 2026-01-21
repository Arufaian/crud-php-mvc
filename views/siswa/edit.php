<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="main-content flex-grow-1" role="main">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h3 mb-1">Edit Siswa</h1>
                        <p class="text-muted mb-0">Perbarui informasi siswa.</p>
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
                            <form method="POST" action="index.php?controller=siswa&action=edit&id=<?php echo $siswa['nisn']; ?>">
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" value="<?php echo htmlspecialchars($siswa['nisn']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo htmlspecialchars($siswa['nis']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($siswa['nama']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_kelas" class="form-label">Kelas</label>
                                    <select class="form-select" id="nama_kelas" name="nama_kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?php echo $k['nama_kelas']; ?>" <?php if ($k['nama_kelas'] == $siswa['nama_kelas']) echo 'selected'; ?>>
                                                <?php echo htmlspecialchars($k['nama_kelas'] . ' - ' . $k['kompetensi_keahlian']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label">ID Kelas</label>
                                    <select class="form-select" id="id_kelas" name="id_kelas" required>
                                        <option value="">Pilih ID Kelas</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?php echo $k['id_kelas']; ?>" <?php if ($k['id_kelas'] == $siswa['id_kelas']) echo 'selected'; ?>>
                                                <?php echo htmlspecialchars($k['nama_kelas'] . ' (ID: ' . $k['id_kelas'] . ')'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($siswa['alamat']); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($siswa['no_telp']); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="id_spp" class="form-label">ID SPP</label>
                                    <input type="number" class="form-control" id="id_spp" name="id_spp" value="<?php echo htmlspecialchars($siswa['id_spp']); ?>">
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Perbarui
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
