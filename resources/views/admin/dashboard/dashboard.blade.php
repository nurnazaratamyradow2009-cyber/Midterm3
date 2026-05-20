@extends('admin.layouts.head')

@section('main-content')
    <style>
        .dashboard-container {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .welcome-section {
            margin-bottom: 30px;
        }

        .welcome-title {
            font-size: 26px;
            font-weight: 700;
            color: #2b2d42;
        }

        .welcome-subtitle {
            color: #6c757d;
            font-size: 14px;
        }

        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .bg-purple-light {
            background-color: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .bg-blue-light {
            background-color: rgba(54, 162, 235, 0.1);
            color: #36a2eb;
        }

        .bg-orange-light {
            background-color: rgba(255, 159, 64, 0.1);
            color: #ff9f40;
        }

        .bg-green-light {
            background-color: rgba(75, 192, 192, 0.1);
            color: #4bc0c0;
        }

        .panel-card {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 24px;
            height: 100%;
        }

        .panel-title {
            font-size: 16px;
            font-weight: 700;
            color: #2b2d42;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background: #fdfdfd;
            border: 2px solid #f1f3f5;
            border-radius: 10px;
            color: #495057;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .quick-action-btn:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.02);
            color: #667eea;
            transform: translateX(3px);
        }
    </style>

    <div class="dashboard-container">
        <div class="container-fluid">

            <!-- Header Section -->
            <div class="welcome-section d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="welcome-title">Welcome Back, Admin</h1>
                    <p class="welcome-subtitle">Here is what is happening with your mobile database store ecosystem today.
                    </p>
                </div>
                <div>
                    <span class="badge bg-white text-dark border p-2.5 px-3 rounded-pill shadow-sm fs-7">
                        <i class="bi bi-clock me-1 text-primary"></i>
                        {{ now()->format('D, M d, Y') }}
                    </span>
                </div>
            </div>

            <!-- Global Analytics/Metrics Counter Cards Row -->
            <div class="row mb-4 g-3">
                <!-- Total Phones Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1 text-uppercase fw-bold tracking-wider">Total Phones</p>
                                <h3 class="mb-0 fw-bold">{{ $totalPhones ?? '0' }}</h3>
                            </div>
                            <div class="icon-box bg-purple-light">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Brands Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1 text-uppercase fw-bold tracking-wider">Active Brands</p>
                                <h3 class="mb-0 fw-bold">{{ $totalBrands ?? '0' }}</h3>
                            </div>
                            <div class="icon-box bg-blue-light">
                                <i class="bi bi-tags"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Categories Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1 text-uppercase fw-bold tracking-wider">Categories</p>
                                <h3 class="mb-0 fw-bold">{{ $totalCategories ?? '0' }}</h3>
                            </div>
                            <div class="icon-box bg-orange-light">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database Status Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card stat-card p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted small mb-1 text-uppercase fw-bold tracking-wider">System Status</p>
                                <h3 class="mb-0 text-success fw-bold fs-5">
                                    <i class="bi bi-check-circle-fill me-1"></i> Operational
                                </h3>
                            </div>
                            <div class="icon-box bg-green-light">
                                <i class="bi bi-cpu"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Split Row Panels -->
            <div class="row g-4">
                <!-- Left Panel: Quick Actions Context Links -->
                <div class="col-12 col-md-4">
                    <div class="panel-card">
                        <h4 class="panel-title text-primary">
                            <i class="bi bi-lightning-charge"></i> Quick Actions
                        </h4>
                        <div class="d-flex flex-column gap-3">
                            <a href="{{ route('admin.phone.create') }}" class="quick-action-btn">
                                <i class="bi bi-plus-circle text-primary fs-5"></i>
                                <span>Add New Phone Model</span>
                            </a>
                            <a href="{{ route('admin.phone') }}" class="quick-action-btn">
                                <i class="bi bi-phone-flip text-success fs-5"></i>
                                <span>Manage All Phones</span>
                            </a>
                            <a href="{{ route('admin.category') }}" class="quick-action-btn">
                                <i class="bi bi-folder-plus text-warning fs-5"></i>
                                <span>Manage Categories</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Panel: Data Summary/Recent Activity Tables placeholder -->
                <div class="col-12 col-md-8">
                    <div class="panel-card">
                        <h4 class="panel-title text-secondary">
                            <i class="bi bi-activity"></i> System Overview
                        </h4>

                        <div class="p-5 text-center text-muted border border-dashed rounded-3 bg-light">
                            <i class="bi bi-database-fill-gear fs-1 mb-3 text-secondary d-block"></i>
                            <h5 class="fw-bold text-dark mb-1">Catalog Architecture Active</h5>
                            <p class="small mb-0">Use the navigation bar or side navigation menus to modify connected
                                entries inside your systems.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection