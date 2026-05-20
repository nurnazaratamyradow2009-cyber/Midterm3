@extends('admin.layouts.head')

@section('main-content')
    <style>
        .brand-container {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .brand-card {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .brand-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .brand-logo-placeholder {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 24px;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.2);
        }
    </style>

    <div class="brand-container">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between mb-5 flex-wrap gap-3">
                <div>
                    <h1 class="fw-bold text-dark mb-1"><i class="bi bi-tags me-2 text-primary"></i>Brands</h1>
                    <p class="text-muted small mb-0">Manage manufacturer companies and connected mobile inventories.</p>
                </div>
                <a class="btn btn-success px-4 text-light rounded-pill shadow-sm" href="{{ route('admin.brand.create') }}">
                    <i class="bi bi-plus-lg me-1"></i> Add Brand
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">
                @forelse ($brands as $brand)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card brand-card p-3">
                            <div class="d-flex align-items-center gap-3">

                                <div class="brand-logo-placeholder">
                                    {{ strtoupper(substr($brand->name, 0, 1)) }}
                                </div>

                                <div class="flex-grow-1 min-w-0">
                                    <h5 class="fw-bold text-dark mb-1 text-truncate">
                                        {{ $brand->name }}
                                    </h5>

                                    <span class="badge bg-light text-secondary border">
                                        {{ $brand->phones()->count() }} Devices active
                                    </span>
                                </div>

                            </div>

                            <div class="mt-4 pt-2 border-top d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.brand.show', $brand->id)}}"
                                    class="btn btn-sm btn-outline-primary px-2.5 rounded-pill" title="View catalog products">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                    class="btn btn-sm btn-outline-secondary px-2.5 rounded-pill" title="Edit Brand Name">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-white rounded shadow-sm">
                            <i class="bi bi-tag-fill text-muted fs-1 mb-3 d-block"></i>
                            <h4 class="fw-bold text-dark">No Manufacturers Documented</h4>
                            <p class="text-muted small">Get started by creating your first brand entry item into the panel.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection