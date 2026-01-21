        <?php require_once __DIR__ . '/../../lib/Router.php'; ?>
        <!-- Sidebar (Desktop - Visible on lg+) -->
        <aside id="sidebar" class="sidebar d-none d-lg-flex" role="navigation" aria-label="Sidebar navigation">
            <nav class="nav flex-column w-100">
                <!-- Sidebar Header -->
                <div class="sidebar-header ps-3 py-3 border-bottom">
                    <h5 class="mb-0 text-muted small">MENU</h5>
                </div>

                <!-- Navigation Items -->
                <a href="index.php?action=index" class="nav-link <?php echo Router::isActive('index') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-house-fill"></i>
                    <span>Home</span>
                </a>
                <a href="index.php?action=petugas" class="nav-link <?php echo Router::isActive('petugas') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-people"></i>
                    <span>Petugas</span>
                </a>
                <a href="index.php?action=kelas" class="nav-link <?php echo Router::isActive('kelas') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-mortarboard"></i>
                    <span>Kelas</span>
                </a>
                <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-graph-up"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-file-earmark"></i>
                    <span>Reports</span>
                </a>

                <!-- Submenu Example -->
                <button
                    class="nav-link d-flex align-items-center justify-content-between gap-2 rounded-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#settingsMenu"
                    aria-expanded="false"
                    aria-controls="settingsMenu">
                    <span class="d-flex align-items-center gap-2">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </span>
                    <i class="bi bi-chevron-down ms-auto small"></i>
                </button>
                <div class="collapse" id="settingsMenu">
                    <a href="#" class="nav-link ps-5 rounded-0">General</a>
                    <a href="#" class="nav-link ps-5 rounded-0">Security</a>
                    <a href="#" class="nav-link ps-5 rounded-0">Preferences</a>
                </div>

                <hr class="my-2">

                <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-question-circle"></i>
                    <span>Help & Support</span>
                </a>
            </nav>

            <!-- Resize Handle -->
            <div id="resizeHandle" class="resize-handle" title="Drag to resize sidebar" aria-label="Resize sidebar handle"></div>
        </aside>

        <!-- Offcanvas Sidebar (Mobile/Tablet - Hidden by default on lg-) -->
        <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="sidebarOffcanvas"
            aria-labelledby="sidebarOffcanvasLabel">
            <div class="offcanvas-header bg-primary text-white">
                <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close menu"></button>
            </div>
            <nav class="offcanvas-body p-0">
                <nav class="nav flex-column w-100">
                    <!-- Header -->
                    <div class="sidebar-header ps-3 py-3 border-bottom">
                        <h5 class="mb-0 text-muted small">MENU</h5>
                    </div>

                    <!-- Navigation Items (Mobile) -->
                    <a href="index.php?action=index" class="nav-link <?php echo Router::isActive('index') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                    <a href="index.php?action=petugas" class="nav-link <?php echo Router::isActive('petugas') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-people"></i>
                        <span>Petugas</span>
                    </a>
                    <a href="index.php?action=kelas" class="nav-link <?php echo Router::isActive('kelas') ? 'active' : ''; ?> d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-mortarboard"></i>
                        <span>Kelas</span>
                    </a>
                    <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-graph-up"></i>
                        <span>Analytics</span>
                    </a>
                    <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-file-earmark"></i>
                        <span>Reports</span>
                    </a>

                    <!-- Submenu Example (Mobile) -->
                    <button
                        class="nav-link d-flex align-items-center justify-content-between gap-2 rounded-0 ps-3"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#settingsMenuMobile"
                        aria-expanded="false"
                        aria-controls="settingsMenuMobile">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </span>
                        <i class="bi bi-chevron-down ms-auto small"></i>
                    </button>
                    <div class="collapse" id="settingsMenuMobile">
                        <a href="#" class="nav-link ps-5 rounded-0">General</a>
                        <a href="#" class="nav-link ps-5 rounded-0">Security</a>
                        <a href="#" class="nav-link ps-5 rounded-0">Preferences</a>
                    </div>

                    <hr class="my-2">

                    <a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-question-circle"></i>
                        <span>Help & Support</span>
                    </a>
                </nav>
            </nav>
        </div>
