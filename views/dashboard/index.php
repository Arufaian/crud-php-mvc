<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

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

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
