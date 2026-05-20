@extends('admin.layouts.head')

@section('main-content')
    <div class="container py-5">
        <div class="border border-3 rounded p-5 bg-light shadow-sm">
            <div class="row g-4">

                {{-- Product Image Column --}}
                <div class="col-md-5 text-center">
                    <img src="{{ asset('img/s26-ultra.jpg') }}" class="img-fluid rounded w-75 shadow-sm"
                        alt="{{ $phone->model }}">

                    {{-- Admin Management Toolbar --}}
                    <div class="mt-4 pt-3 border-top d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.phone.edit', $phone->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit Specs
                        </a>

                        <form action="{{ route('admin.phone.destroy', $phone->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this phone? This action cannot be undone')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete Phone
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Specifications Details Column --}}
                <div class="col-md-7">
                    <div class="d-flex fw-bold h2 border-bottom pb-2 mb-3">
                        <div class="me-2 text-secondary">{{ $phone->brand }}</div>
                        <div>{{ $phone->model }}</div>
                    </div>

                    <div class="row row-cols-1 g-2 fs-5">
                        {{-- Core Hardware --}}
                        @isset($phone->processor)
                            <div><strong>Processor:</strong> {{ $phone->processor }}</div>
                        @endisset

                        @isset($phone->screen_refresh_rate)
                            <div><strong>Refresh Rate:</strong> {{ $phone->screen_refresh_rate }}Hz</div>
                        @endisset

                        {{-- Rear Camera Breakdown --}}
                        <div class="mt-3 pt-2 border-top">
                            <h5 class="text-primary fw-semibold">Rear Camera Setup (Count: {{ $phone->back_camera_count }})
                            </h5>
                            <ul class="list-unstyled ps-2 fs-6">
                                @if($phone->first_camera_mp)
                                <li>• Primary: {{ $phone->first_camera_mp }} MP</li> @endif
                                @if($phone->second_camera_mp)
                                <li>• Secondary: {{ $phone->second_camera_mp }} MP</li> @endif
                                @if($phone->third_camera_mp)
                                <li>• Third Lens: {{ $phone->third_camera_mp }} MP</li> @endif
                                @if($phone->fourth_camera_mp)
                                <li>• Fourth Lens: {{ $phone->fourth_camera_mp }} MP</li> @endif
                                @if($phone->fifth_camera_mp)
                                <li>• Fifth Lens: {{ $phone->fifth_camera_mp }} MP</li> @endif
                                @if($phone->back_camera_count == 0)
                                <li class="text-muted">No rear cameras specified.</li> @endif
                            </ul>
                        </div>

                        {{-- Front Camera Breakdown --}}
                        <div class="mt-2">
                            <h5 class="text-primary fw-semibold">Front Camera Setup (Count:
                                {{ $phone->front_camera_count }})
                            </h5>
                            <ul class="list-unstyled ps-2 fs-6">
                                @if($phone->first_front_camera_mp)
                                <li>• Primary Front: {{ $phone->first_front_camera_mp }} MP</li> @endif
                                @if($phone->second_front_camera_mp)
                                <li>• Secondary Front: {{ $phone->second_front_camera_mp }} MP</li> @endif
                                @if($phone->front_camera_count == 0)
                                <li class="text-muted">No front cameras specified.</li> @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Navigation Utilities --}}
                    <div class="mt-5 border-top pt-3">
                        <a href="{{ route('admin.phone') }}" class="btn btn-secondary">
                            ← Back to Phones List
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection