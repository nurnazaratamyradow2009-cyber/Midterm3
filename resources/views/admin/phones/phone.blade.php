@extends('admin.layouts.head')

@section('main-content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="h1 text-center">Phones:</div>
            <a class="btn btn-success px-3 text-light" href="{{ route('admin.phone.create') }}">Add Phone</a>
        </div>
        <div class="my-5">
            <div class="row">
                @foreach ($phones as $phone)

                    <div class="col-lg-auto col-md-auto col-sm-auto col-auto m-2 border rounded bg-light">
                        <a href="{{ route('admin.phone.show', $phone->id)}}" class="text-decoration-none text-dark me-1">
                            <div class="p-2">
                                <img src="{{ asset('img/s26-ultra.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="d-flex fw-semibold justify-content-center">
                                <div class="me-1">{{ $phone->brand }}</div>
                                <div>{{ $phone->model }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>{{ $phone->storage }}GB/{{ $phone->ram }}GB</div>
                                <div>{{ $phone->battery_capacity }} MaH</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection