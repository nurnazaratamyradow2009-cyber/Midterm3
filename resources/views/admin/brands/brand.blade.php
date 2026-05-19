@extends('admin.layouts.head')

@section('main-content')
    <div class="container py-5">
        <ul>
            @foreach ($brands as $brand)
                <li><a class="text-decoration-none" href="#">{{ $brand->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection