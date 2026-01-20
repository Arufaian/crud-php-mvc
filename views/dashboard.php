<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Management Dashboard">
    <title>Dashboard - User Management</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary sticky-top shadow-sm" aria-label="Main navigation">
        <div class="container-fluid">
            <!-- Offcanvas Toggle Button (Visible only on lg and below) -->
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebarOffcanvas"
                aria-controls="sidebarOffcanvas"
                aria-label="Toggle sidebar navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a class="navbar-brand fw-bold ms-2" href="index.php?action=index">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>

            <!-- Navbar Content -->
            <div class="d-flex align-items-center gap-3">
                <div class="d-none d-md-block">
                    <input
                        class="form-control form-control-sm"
                        type="search"
                        placeholder="Search..."
                        aria-label="Search">
                </div>
                <button class="btn btn-outline-light btn-sm" type="button" aria-label="Notifications">
                    <i class="bi bi-bell"></i>
                </button>
                <div class="dropdown">
                    <button
                        class="btn btn-outline-light btn-sm dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-label="User menu">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="layout-container">
        <!-- Sidebar (Desktop - Visible on lg+) -->
        <aside id="sidebar" class="sidebar d-none d-lg-flex" role="navigation" aria-label="Sidebar navigation">
            <nav class="nav flex-column w-100">
                <!-- Sidebar Header -->
                <div class="sidebar-header ps-3 py-3 border-bottom">
                    <h5 class="mb-0 text-muted small">MENU</h5>
                </div>

                <!-- Navigation Items -->
                <a href="index.php?action=index" class="nav-link active d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-house-fill"></i>
                    <span>Home</span>
                </a>
                <a href="index.php?action=users" class="nav-link d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
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
                    <a href="index.php?action=index" class="nav-link active d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                    <a href="index.php?action=users" class="nav-link d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-people"></i>
                        <span>Users</span>
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

        <!-- Main Content Area -->
        <main id="mainContent" class="main-content flex-grow-1" role="main">
            <div class="content-wrapper">
                <!-- Page Header -->
                <div class="page-header mb-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="h3 mb-1">Welcome Back!</h1>
                            <p class="text-muted mb-0">Here's what's happening with your dashboard today.</p>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-sm">
                                <i class="bi bi-download me-2"></i>Export
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-muted small mb-2">Total Users</h6>
                                        <h3 class="mb-0">12,543</h3>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="bi bi-people text-primary fs-5"></i>
                                    </div>
                                </div>
                                <small class="text-success">+5.2% from last month</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-muted small mb-2">Revenue</h6>
                                        <h3 class="mb-0">$45.2K</h3>
                                    </div>
                                    <div class="bg-success bg-opacity-10 p-3 rounded">
                                        <i class="bi bi-cash-coin text-success fs-5"></i>
                                    </div>
                                </div>
                                <small class="text-success">+12.5% from last month</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-muted small mb-2">Orders</h6>
                                        <h3 class="mb-0">1,850</h3>
                                    </div>
                                    <div class="bg-info bg-opacity-10 p-3 rounded">
                                        <i class="bi bi-bag text-info fs-5"></i>
                                    </div>
                                </div>
                                <small class="text-danger">-2.1% from last month</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-muted small mb-2">Conversion</h6>
                                        <h3 class="mb-0">3.24%</h3>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="bi bi-graph-up text-warning fs-5"></i>
                                    </div>
                                </div>
                                <small class="text-success">+0.8% from last month</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Sections -->
                <div class="row g-3">
                    <div class="col-12 col-lg-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom py-3">
                                <h5 class="mb-0">Recent Activity</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>User</th>
                                                <th>Action</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>Created report</td>
                                                <td>2 hours ago</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>Updated profile</td>
                                                <td>4 hours ago</td>
                                                <td><span class="badge bg-primary">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>Mike Johnson</td>
                                                <td>Uploaded files</td>
                                                <td>1 day ago</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>Sarah Williams</td>
                                                <td>Shared document</td>
                                                <td>2 days ago</td>
                                                <td><span class="badge bg-warning">In Progress</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-header bg-white border-bottom py-3">
                                <h5 class="mb-0">Quick Stats</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small">Completion Rate</span>
                                        <span class="small fw-bold">85%</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: 85%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small">Customer Satisfaction</span>
                                        <span class="small fw-bold">92%</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 92%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small">System Uptime</span>
                                        <span class="small fw-bold">99.8%</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info" style="width: 99%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom py-3">
                                <h5 class="mb-0">Quick Links</h5>
                            </div>
                            <div class="card-body p-0">
                                <a href="index.php?action=users" class="d-block p-3 text-decoration-none border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-people text-primary"></i>
                                        <span>Manage Users</span>
                                    </div>
                                </a>
                                <a href="index.php?action=create" class="d-block p-3 text-decoration-none border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-person-plus text-success"></i>
                                        <span>Add New User</span>
                                    </div>
                                </a>
                                <a href="#" class="d-block p-3 text-decoration-none">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-gear text-secondary"></i>
                                        <span>System Settings</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/resize.js"></script>
</body>
</html>
