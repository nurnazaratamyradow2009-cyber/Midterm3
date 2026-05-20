@extends('admin.layouts.head')

@section('main-content')
    <style>
        .brand-show-container {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .brand-profile-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 35px;
        }

        .large-brand-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 36px;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.25);
        }

        .device-table-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            background-color: #f1f3f5;
            color: #495057;
            padding: 15px;
            border: none;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            color: #495057;
            font-size: 14px;
        }

        .badge-spec {
            background-color: rgba(102, 126, 234, 0.1);
            color: #667eea;
            font-weight: 600;
            border-radius: 6px;
            padding: 6px 10px;
        }

        .action-circle-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fff;
            border: 1px solid #dee2e6;
            transition: all 0.2s ease;
        }

        .action-circle-btn:hover {
            background: #f8f9fa;
            transform: scale(1.05);
        }
    </style>

    <div class="brand-show-container">
        <div class="container">

            <div class="mb-4">
                <a href="{{ route('admin.brand') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Back to All Brands
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="brand-profile-card">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-4">
                        <div class="large-brand-avatar">
                            {{ strtoupper(substr($brand->name, 0, 1)) }}
                        </div>
                        <div>
                            <h1 class="fw-bold text-dark mb-1">{{ $brand->name }}</h1>
                            <p class="text-muted mb-0">
                                Total Cataloged Lineup:
                                <span class="badge bg-primary rounded-pill px-2.5 ms-1">
                                    {{ $brand->phones()->count() }} Models
                                </span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.brand.edit', $brand->id) }}"
                            class="btn btn-outline-secondary px-3.5 rounded-pill shadow-sm">
                            <i class="bi bi-pencil me-1"></i> Edit Brand Name
                        </a>
                    </div>
                </div>
            </div>

            <h4 class="fw-bold text-dark mb-3"><i class="bi bi-phone me-2 text-primary"></i>Connected Devices Lineup</h4>

            <div class="card device-table-card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Model Name</th>
                                <th>Processor / SoC</th>
                                <th>Display Spec</th>
                                <th>Rear Camera Setup</th>
                                <th class="text-end" style="padding-right: 25px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($brand->phones as $phone)
                                <tr>
                                    <td class="fw-bold text-dark">
                                        <i class="bi bi-phone-vibrate me-2 text-muted"></i>{{ $phone->model }}
                                    </td>

                                    <td>
                                        <span class="text-secondary fw-medium">{{ $phone->processor ?? 'N/A' }}</span>
                                    </td>

                                    <td>
                                        @if($phone->screen_refresh_rate)
                                            <span class="badge badge-spec">{{ $phone->screen_refresh_rate }}Hz</span>
                                        @else
                                            <span class="text-muted small">Standard</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <span class="text-dark fw-semibold">{{ $phone->first_camera_mp ?? '0' }} MP</span>
                                            <span class="text-muted small">({{ $phone->back_camera_count ?? '1' }}
                                                Lenses)</span>
                                        </div>
                                    </td>

                                    <td class="text-end" style="padding-right: 25px;">
                                        <div class="d-inline-flex gap-2 align-items-center">

                                            @if(Route::has('admin.phone.edit'))
                                                <a href="{{ route('admin.phone.edit', $phone->id) }}" class="action-circle-btn"
                                                    title="Edit Specs">
                                                    <i class="bi bi-pencil text-dark"></i>
                                                </a>
                                            @else
                                                <a href="#" class="action-circle-btn" style="opacity: 0.5; cursor: not-allowed;"
                                                    title="Edit route not declared">
                                                    <i class="bi bi-pencil text-muted"></i>
                                                </a>
                                            @endif

                                            @if(Route::has('admin.phone.destroy'))
                                                <form action="{{ route('admin.phone.destroy', $phone->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to permanently delete the {{ $phone->model }} from your catalog?');"
                                                    class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-circle-btn" title="Delete Model">
                                                        <i class="bi bi-trash3 text-danger"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <button class="action-circle-btn" style="opacity: 0.5; cursor: not-allowed;"
                                                    title="Destroy route not declared" disabled>
                                                    <i class="bi bi-trash3 text-muted"></i>
                                                </button>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-phone-mute fs-2 mb-2 d-block text-secondary"></i>
                                        <h5 class="fw-bold text-dark mb-1">No Active Models Assigned</h5>
                                        <p class="small mb-0">There are no devices registered under the {{ $brand->name }}
                                            product tree yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection