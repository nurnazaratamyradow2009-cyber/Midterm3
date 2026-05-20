@extends('admin.layouts.head')

@section('main-content')
    <style>
        .brand-create-container {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .form-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
            padding: 35px;
        }

        .form-control-lg {
            border-radius: 10px;
            font-size: 16px;
            padding: 12px 20px;
            border: 2px solid #e9ecef;
            transition: all 0.2s ease;
        }

        .form-control-lg:focus {
            border-color: #667eea;
            box-shadow: rgba(102, 126, 234, 0.1) 0px 0px 0px 4px;
        }
    </style>

    <div class="brand-create-container">
        <div class="container" style="max-width: 650px;">

            <div class="mb-4">
                <a href="{{ route('admin.brand') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Cancel & Go Back
                </a>
            </div>

            <div class="mb-4">
                <h1 class="fw-bold text-dark mb-1"><i class="bi bi-folder-plus me-2 text-success"></i>Add New Brand</h1>
                <p class="text-muted small">Register a brand manufacturer into your mobile store ecosystem.</p>
            </div>

            <div class="card form-card">
                <form action="{{ route('admin.brand.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-dark mb-2">Manufacturer Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="e.g., Apple, Google, ASUS" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <div class="invalid-feedback mt-2 fw-semibold">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text text-muted mt-2 small">
                            Ensure the name matches the company standard formatting. It must be unique.
                        </div>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="{{ route('admin.brand') }}"
                            class="btn btn-light border px-4 rounded-pill fw-medium text-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success px-4 rounded-pill text-white fw-bold shadow-sm">
                            <i class="bi bi-check-lg me-1"></i> Save Brand Entry
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection