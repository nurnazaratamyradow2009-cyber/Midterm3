@extends('admin.layouts.head')

@section('main-content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="h1 text-center">Phones:</div>
            <a class="btn btn-success px-3 text-light" href="{{ route('admin.phone.create') }}">Add Phone</a>
        </div>

        {{-- Success Message Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="my-5">
            <div class="row g-3">
                @foreach ($phones as $phone)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card h-100 border rounded bg-light shadow-sm">
                            <a href="{{ route('admin.phone.show', $phone->id)}}"
                                class="text-decoration-none text-dark h-100 d-flex flex-column justify-content-between">

                                {{-- Phone Image Section --}}
                                <div class="p-3 text-center">
                                    <img src="{{ asset('img/s26-ultra.jpg') }}" class="img-fluid rounded"
                                        style="max-height: 180px; object-fit: contain;" alt="{{ $phone->model }}">
                                </div>

                                {{-- Details Section --}}
                                <div class="card-body p-3 pt-0">
                                    <div class="d-flex fw-bold justify-content-center h5 mb-2 text-center">
                                        <span class="me-1 text-secondary">{{ $phone->brand }}</span>
                                        <span>{{ $phone->model }}</span>
                                    </div>

                                    <div class="small text-muted mb-1">
                                        <strong>CPU:</strong> {{ $phone->processor ?? 'N/A' }}
                                    </div>

                                    <div class="d-flex justify-content-between small text-secondary mt-2 border-top pt-2">
                                        <div><i class="bi bi-speedometer"></i> {{ $phone->screen_refresh_rate ?? '60' }}Hz</div>
                                        <div><i class="bi bi-camera"></i> {{ $phone->first_camera_mp ?? '0' }} MP Main</div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection