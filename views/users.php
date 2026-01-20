<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Management">
    <title>User Management - CRUD</title>

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
                <a href="index.php?action=index" class="nav-link d-flex align-items-center gap-2 rounded-0">
                    <i class="bi bi-house-fill"></i>
                    <span>Home</span>
                </a>
                <a href="index.php?action=users" class="nav-link active d-flex align-items-center gap-2 rounded-0">
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
                    <a href="index.php?action=index" class="nav-link d-flex align-items-center gap-2 rounded-0 ps-3">
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                    <a href="index.php?action=users" class="nav-link active d-flex align-items-center gap-2 rounded-0 ps-3">
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
                            <h1 class="h3 mb-1">User Management</h1>
                            <p class="text-muted mb-0">Manage and view all users in the system.</p>
                        </div>
                        <div class="col-auto">
                            <a href="index.php?action=create" class="btn btn-primary btn-sm">
                                <i class="bi bi-person-plus me-2"></i>Add New User
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($users)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <p class="text-muted mb-2">No users found</p>
                                                <a href="index.php?action=create" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-person-plus me-1"></i>Add First User
                                                </a>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><strong><?php echo htmlspecialchars($user['id']); ?></strong></td>
                                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm" title="Edit user">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');" title="Delete user">
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
    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/resize.js"></script>
</body>

</html>
