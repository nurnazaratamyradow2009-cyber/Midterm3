@extends('admin.layouts.head')

@section('main-content')
    <div class="container py-5">
        <div class="border border-3 rounded p-5 bg-light">
            <div class="row">
                <div class="col-5">
                    <img src="{{ asset('img/s26-ultra.jpg') }}" class="w-75" alt="">
                </div>
                <div class="col-lg-auto col-md-auto col-sm-auto col-auto">
                    <div class="d-flex fw-semibold h3 justify-content-between">
                        <div class="me-1">{{ $phone->brand }}</div>
                        <div>{{ $phone->model }}</div>
                    </div>

                    @isset($phone->announced_year)
                        <div>Announced year: {{ $phone->announced_year }}</div>
                    @endisset

                    @isset($phone->produced_year)
                        <div>Produced year: {{ $phone->produced_year }}</div>
                    @endisset

                    @isset($phone->storage)
                        <div>Storage: {{ $phone->storage }}GB</div>
                    @endisset

                    @isset($phone->storage_version)
                        <div>Storage version: {{ $phone->storage_version }}</div>
                    @endisset

                    @isset($phone->ram)
                        <div>RAM: {{ $phone->ram }}GB</div>
                    @endisset

                    @isset($phone->ram_version)
                        <div>RAM version: {{ $phone->ram_version }}</div>
                    @endisset

                    @if ($phone->is_support_micro_sd == true)
                        <div>Supports micro-sd</div>
                    @endif

                    {{-- Camera Specifications --}}
                    @if ($phone->has_camera == true)
                        @isset($phone->main_camera)
                            <div>Main camera: {{ $phone->main_camera }} MP</div>
                        @endisset
                        @isset($phone->front_camera)
                            <div>Front camera: {{ $phone->front_camera }} MP</div>
                        @endisset
                    @endif

                    {{-- Display Specifications --}}
                    @isset($phone->screen_size)
                        <div>Screen size: {{ $phone->screen_size }} inches</div>
                    @endisset
                    @isset($phone->screen_type)
                        <div>Display type: {{ $phone->screen_type }}</div>
                    @endisset
                    @isset($phone->refresh_rate)
                        <div>Refresh rate: {{ $phone->refresh_rate }}Hz</div>
                    @endisset

                    {{-- Battery & Charging Specifications --}}
                    @isset($phone->battery_capacity)
                        <div>Battery capacity: {{ $phone->battery_capacity }} mAh</div>
                    @endisset
                    @isset($phone->charging_speed)
                        <div>Charging speed: {{ $phone->charging_speed }}W</div>
                    @endisset

                    {{-- Hardware & OS Specifications --}}
                    @isset($phone->processor)
                        <div>Processor: {{ $phone->processor }}</div>
                    @endisset
                    @isset($phone->os_version)
                        <div>Operating System: {{ $phone->os_version }}</div>
                    @endisset

                    @if ($phone->has_gyroscope == true)
                        <div>Gyroscope: Hardware Dedicated (Supported)</div>
                    @endif

                    {{-- Dynamic Back Button --}}
                    <div class="mt-4">
                        <a href="{{ route('admin.phone') }}" class="btn btn-secondary">
                            ← Back to Phones List
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <form action="{{ route('admin.phone.destroy', $phone->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this phone? This action cannot be undone')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Phone</button>

                    </form>
                    <a href="{{ route('admin.phones.edit', $phone->id) }}" class="btn btn-warning">
                        Edit Phone Specs
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection