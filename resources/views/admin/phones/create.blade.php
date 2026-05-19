@extends('admin.layouts.head')

@section('main-content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .admin-header h1 {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header i {
            font-size: 36px;
        }

        .admin-header .breadcrumb {
            background: transparent;
            padding: 0;
            margin-top: 10px;
        }

        .admin-header .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .admin-header .breadcrumb-item.active {
            color: white;
        }

        .admin-header .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            background: white;
        }

        .form-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px 30px;
            border-bottom: 1px solid #dee2e6;
        }

        .form-header h4 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-header i {
            color: #667eea;
        }

        .card-body {
            padding: 30px;
            background-color: #fff;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin-top: 35px;
            margin-bottom: 25px;
            padding: 15px 20px;
            border-left: 5px solid;
            border-radius: 0 8px 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .section-title i {
            font-size: 24px;
        }

        .section-title.general {
            color: #667eea;
            border-left-color: #667eea;
            background: rgba(102, 126, 234, 0.08);
        }

        .section-title.storage {
            color: #f093fb;
            border-left-color: #f093fb;
            background: rgba(240, 147, 251, 0.08);
        }

        .section-title.camera {
            color: #4facfe;
            border-left-color: #4facfe;
            background: rgba(79, 172, 254, 0.08);
        }

        .section-title.sound {
            color: #fa709a;
            border-left-color: #fa709a;
            background: rgba(250, 112, 154, 0.08);
        }

        .section-title.battery {
            color: #30b0fe;
            border-left-color: #30b0fe;
            background: rgba(48, 176, 254, 0.08);
        }

        .section-title.display {
            color: #a8edea;
            border-left-color: #a8edea;
            background: rgba(168, 237, 234, 0.08);
        }

        .section-title.body {
            color: #fed6e3;
            border-left-color: #fed6e3;
            background: rgba(254, 214, 227, 0.08);
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .form-control,
        .form-select {
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control::placeholder {
            color: #a8afd9;
        }

        .form-check-input {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            border: 2px solid #e0e6ed;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 3px;
        }

        .form-check-input:checked {
            background: var(--primary-gradient);
            border-color: #667eea;
        }

        .form-check-input:checked::after {
            content: '✓';
        }

        .form-check-input.active {
            background: var(--primary-gradient);
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.3);
        }

        .form-check-input.inactive {
            background-color: #f0f0f0;
            border-color: #d0d0d0;
            opacity: 0.6;
        }

        .form-check-label.active {
            color: #667eea;
            font-weight: 700;
        }

        .form-check-label.inactive {
            color: #999;
            text-decoration: line-through;
        }

        .form-check-label {
            color: #2c3e50;
            cursor: pointer;
            padding-left: 8px;
        }

        .invalid-feedback {
            font-size: 13px;
            color: #e74c3c;
            margin-top: 8px;
            display: block;
            font-weight: 500;
        }

        .is-invalid {
            border-color: #e74c3c !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.1) !important;
        }

        .subsection-title {
            font-size: 16px;
            font-weight: 700;
            color: #34495e;
            margin-top: 28px;
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #ecf0f1;
        }

        .subsection-title:first-of-type {
            margin-top: 0;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 30px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn i {
            font-size: 18px;
        }

        .btn-secondary-custom {
            background: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .btn-secondary-custom:hover {
            background: #5a6268;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .form-field-group {
            margin-bottom: 30px;
        }

        .row {
            margin-bottom: 5px;
        }

        .col-md-3,
        .col-md-4,
        .col-md-6 {
            transition: transform 0.3s ease;
        }

        .col-md-3:hover .form-control,
        .col-md-3:hover .form-select,
        .col-md-4:hover .form-control,
        .col-md-4:hover .form-select,
        .col-md-6:hover .form-control,
        .col-md-6:hover .form-select {
            border-color: #667eea;
        }

        .field-required {
            color: #e74c3c;
            font-weight: 700;
            margin-left: 3px;
        }

        .field-optional {
            display: inline-block;
            background: #ecf0f1;
            color: #7f8c8d;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 8px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .form-label {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .dependent-section {
            opacity: 1;
            transition: all 0.3s ease;
            max-height: 10000px;
            overflow: hidden;
        }

        .dependent-section.disabled {
            opacity: 0.5;
            pointer-events: none;
            max-height: 0;
            padding: 0 !important;
            margin: 0 !important;
        }

        .disabled .form-control,
        .disabled .form-select,
        .disabled .form-check-input {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }

        .section-disabled-notice {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #856404;
            font-size: 14px;
            font-weight: 500;
            display: none;
        }

        .section-disabled-notice.show {
            display: block;
        }
    </style>

    <div class="container-fluid mt-4 mb-5">
        <!-- Header -->
        <div class="admin-header">
            <div class="container">
                    <h1><i class="bi bi-phone"></i> {{ __('app.admin.add_phone') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('app.admin.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.phone.create') }}">{{ __('app.admin.all_phones') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('app.admin.create_phone') }}</li>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main-card">
                        <div class="form-header">
                            <h4><i class="bi bi-plus-circle"></i> Phone Information Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.phone.store') }}" method="post" class="needs-validation"
                                novalidate>
                                @csrf

                                <!-- General Information -->
                                <h4 class="section-title general"><i class="bi bi-info-circle"></i> {{ __('app.admin.general_information') }}</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="model" class="form-label fw-bold">{{ __('app.admin.model_label') }} <span
                                                class="field-required">*</span></label>
                                        <input type="text" class="form-control @error('model') is-invalid @enderror"
                                            id="model" name="model" placeholder="e.g., Galaxy S23" required>
                                        @error('model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{ __('app.admin.brand_label') }}</label>
                                        <select name="brand_id" class="form-select">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="announced_year" class="form-label fw-bold">{{ __('app.admin.announced_produced') }} <span
                                                class="field-optional">{{ __('app.buttons.submit') }}</span></label>
                                        <input type="number"
                                            class="form-control @error('announced_year') is-invalid @enderror"
                                            id="announced_year" name="announced_year" placeholder="e.g., 2023">
                                        @error('announced_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="produced_year" class="form-label fw-bold">Produced Year <span
                                                class="field-optional">Optional</span></label>
                                        <input type="number"
                                            class="form-control @error('produced_year') is-invalid @enderror"
                                            id="produced_year" name="produced_year" placeholder="e.g., 2023">
                                        @error('produced_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Storage -->
                                <h4 class="section-title storage mt-4"><i class="bi bi-hdd"></i> Storage</h4>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="storage" class="form-label fw-bold">{{ __('app.admin.storage_label') }} (GB) <span
                                                class="field-optional">Optional</span></label>
                                        <input type="number" class="form-control @error('storage') is-invalid @enderror"
                                            id="storage" name="storage" placeholder="e.g., 128">
                                        @error('storage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="storage_version" class="form-label fw-bold">Storage Version <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text"
                                            class="form-control @error('storage_version') is-invalid @enderror"
                                            id="storage_version" name="storage_version" placeholder="e.g., UFS 3.1">
                                        @error('storage_version')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ram" class="form-label fw-bold">{{ __('app.admin.ram_label') }} (GB) <span
                                                class="field-optional">Optional</span></label>
                                        <input type="number" class="form-control @error('ram') is-invalid @enderror"
                                            id="ram" name="ram" placeholder="e.g., 8">
                                        @error('ram')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ram_version" class="form-label fw-bold">RAM Version <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text" class="form-control @error('ram_version') is-invalid @enderror"
                                            id="ram_version" name="ram_version" placeholder="e.g., LPDDR5">
                                        @error('ram_version')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input @error('is_support_micro_sd') is-invalid @enderror"
                                            type="checkbox" id="is_support_micro_sd" name="is_support_micro_sd" value="1">
                                        <label class="form-check-label fw-bold" for="is_support_micro_sd">
                                            Supports Micro SD
                                        </label>
                                        @error('is_support_micro_sd')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Camera (Back) -->
                                <h4 class="section-title camera mt-4"><i class="bi bi-camera"></i> Camera (Back)</h4>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input @error('has_camera') is-invalid @enderror"
                                            type="checkbox" id="has_camera" name="has_camera" value="1">
                                        <label class="form-check-label fw-bold" for="has_camera">
                                            Has Camera
                                        </label>
                                        @error('has_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- First Camera -->
                                <h5 class="subsection-title">First Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('first_camera') is-invalid @enderror"
                                            id="first_camera" name="first_camera">
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="telephoto-periscope">Telephoto-Periscope</option>
                                            <option value="periscope">Periscope</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('first_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('first_camera_sensor_model') is-invalid @enderror"
                                            id="first_camera_sensor_model" name="first_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('first_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_sensor_size" class="form-label fw-bold">Sensor Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('first_camera_sensor_size') is-invalid @enderror"
                                            id="first_camera_sensor_size" name="first_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('first_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('first_camera_sensor_MP_value') is-invalid @enderror"
                                            id="first_camera_sensor_MP_value" name="first_camera_sensor_MP_value"
                                            placeholder="e.g., 50">
                                        @error('first_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('first_camera_has_eis_or_ois') is-invalid @enderror"
                                            id="first_camera_has_eis_or_ois" name="first_camera_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('first_camera_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('first_camera_video_recording') is-invalid @enderror"
                                            id="first_camera_video_recording" name="first_camera_video_recording"
                                            placeholder="e.g., 8K@30fps">
                                        @error('first_camera_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_optical_zoom" class="form-label fw-bold">Optical
                                            Zoom</label>
                                        <input type="text"
                                            class="form-control @error('first_camera_optical_zoom') is-invalid @enderror"
                                            id="first_camera_optical_zoom" name="first_camera_optical_zoom"
                                            placeholder="e.g., 3x">
                                        @error('first_camera_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('first_camera_special_feature') is-invalid @enderror"
                                            id="first_camera_special_feature" name="first_camera_special_feature"
                                            placeholder="e.g., Night mode">
                                        @error('first_camera_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_camera_special_sign" class="form-label fw-bold">Special
                                            Sign</label>
                                        <input type="text"
                                            class="form-control @error('first_camera_special_sign') is-invalid @enderror"
                                            id="first_camera_special_sign" name="first_camera_special_sign"
                                            placeholder="e.g., Leica">
                                        @error('first_camera_special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Second Camera -->
                                <h5 class="subsection-title">Second Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('second_camera') is-invalid @enderror"
                                            id="second_camera" name="second_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="telephoto-periscope">Telephoto-Periscope</option>
                                            <option value="periscope">Periscope</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('second_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('second_camera_sensor_model') is-invalid @enderror"
                                            id="second_camera_sensor_model" name="second_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('second_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_sensor_size" class="form-label fw-bold">Sensor
                                            Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('second_camera_sensor_size') is-invalid @enderror"
                                            id="second_camera_sensor_size" name="second_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('second_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('second_camera_sensor_MP_value') is-invalid @enderror"
                                            id="second_camera_sensor_MP_value" name="second_camera_sensor_MP_value"
                                            placeholder="e.g., 50">
                                        @error('second_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('second_camera_has_eis_or_ois') is-invalid @enderror"
                                            id="second_camera_has_eis_or_ois" name="second_camera_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('second_camera_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('second_camera_video_recording') is-invalid @enderror"
                                            id="second_camera_video_recording" name="second_camera_video_recording"
                                            placeholder="e.g., 8K@30fps">
                                        @error('second_camera_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_optical_zoom" class="form-label fw-bold">Optical
                                            Zoom</label>
                                        <input type="text"
                                            class="form-control @error('second_camera_optical_zoom') is-invalid @enderror"
                                            id="second_camera_optical_zoom" name="second_camera_optical_zoom"
                                            placeholder="e.g., 3x">
                                        @error('second_camera_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('second_camera_special_feature') is-invalid @enderror"
                                            id="second_camera_special_feature" name="second_camera_special_feature"
                                            placeholder="e.g., Night mode">
                                        @error('second_camera_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_camera_special_sign" class="form-label fw-bold">Special
                                            Sign</label>
                                        <input type="text"
                                            class="form-control @error('second_camera_special_sign') is-invalid @enderror"
                                            id="second_camera_special_sign" name="second_camera_special_sign"
                                            placeholder="e.g., Leica">
                                        @error('second_camera_special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Third Camera -->
                                <h5 class="subsection-title">Third Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('third_camera') is-invalid @enderror"
                                            id="third_camera" name="third_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="telephoto-periscope">Telephoto-Periscope</option>
                                            <option value="periscope">Periscope</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('third_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('third_camera_sensor_model') is-invalid @enderror"
                                            id="third_camera_sensor_model" name="third_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('third_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_sensor_size" class="form-label fw-bold">Sensor Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('third_camera_sensor_size') is-invalid @enderror"
                                            id="third_camera_sensor_size" name="third_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('third_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('third_camera_sensor_MP_value') is-invalid @enderror"
                                            id="third_camera_sensor_MP_value" name="third_camera_sensor_MP_value"
                                            placeholder="e.g., 50">
                                        @error('third_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('third_camera_has_eis_or_ois') is-invalid @enderror"
                                            id="third_camera_has_eis_or_ois" name="third_camera_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('third_camera_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('third_camera_video_recording') is-invalid @enderror"
                                            id="third_camera_video_recording" name="third_camera_video_recording"
                                            placeholder="e.g., 8K@30fps">
                                        @error('third_camera_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_optical_zoom" class="form-label fw-bold">Optical
                                            Zoom</label>
                                        <input type="text"
                                            class="form-control @error('third_camera_optical_zoom') is-invalid @enderror"
                                            id="third_camera_optical_zoom" name="third_camera_optical_zoom"
                                            placeholder="e.g., 3x">
                                        @error('third_camera_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('third_camera_special_feature') is-invalid @enderror"
                                            id="third_camera_special_feature" name="third_camera_special_feature"
                                            placeholder="e.g., Night mode">
                                        @error('third_camera_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="third_camera_special_sign" class="form-label fw-bold">Special
                                            Sign</label>
                                        <input type="text"
                                            class="form-control @error('third_camera_special_sign') is-invalid @enderror"
                                            id="third_camera_special_sign" name="third_camera_special_sign"
                                            placeholder="e.g., Leica">
                                        @error('third_camera_special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Fourth Camera -->
                                <h5 class="subsection-title">Fourth Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('fourth_camera') is-invalid @enderror"
                                            id="fourth_camera" name="fourth_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="telephoto-periscope">Telephoto-Periscope</option>
                                            <option value="periscope">Periscope</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('fourth_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('fourth_camera_sensor_model') is-invalid @enderror"
                                            id="fourth_camera_sensor_model" name="fourth_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('fourth_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_sensor_size" class="form-label fw-bold">Sensor
                                            Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('fourth_camera_sensor_size') is-invalid @enderror"
                                            id="fourth_camera_sensor_size" name="fourth_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('fourth_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('fourth_camera_sensor_MP_value') is-invalid @enderror"
                                            id="fourth_camera_sensor_MP_value" name="fourth_camera_sensor_MP_value"
                                            placeholder="e.g., 50">
                                        @error('fourth_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('fourth_camera_has_eis_or_ois') is-invalid @enderror"
                                            id="fourth_camera_has_eis_or_ois" name="fourth_camera_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('fourth_camera_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('fourth_camera_video_recording') is-invalid @enderror"
                                            id="fourth_camera_video_recording" name="fourth_camera_video_recording"
                                            placeholder="e.g., 8K@30fps">
                                        @error('fourth_camera_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_optical_zoom" class="form-label fw-bold">Optical
                                            Zoom</label>
                                        <input type="text"
                                            class="form-control @error('fourth_camera_optical_zoom') is-invalid @enderror"
                                            id="fourth_camera_optical_zoom" name="fourth_camera_optical_zoom"
                                            placeholder="e.g., 3x">
                                        @error('fourth_camera_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('fourth_camera_special_feature') is-invalid @enderror"
                                            id="fourth_camera_special_feature" name="fourth_camera_special_feature"
                                            placeholder="e.g., Night mode">
                                        @error('fourth_camera_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fourth_camera_special_sign" class="form-label fw-bold">Special
                                            Sign</label>
                                        <input type="text"
                                            class="form-control @error('fourth_camera_special_sign') is-invalid @enderror"
                                            id="fourth_camera_special_sign" name="fourth_camera_special_sign"
                                            placeholder="e.g., Leica">
                                        @error('fourth_camera_special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Fifth Camera -->
                                <h5 class="subsection-title">Fifth Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('fifth_camera') is-invalid @enderror"
                                            id="fifth_camera" name="fifth_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="telephoto-periscope">Telephoto-Periscope</option>
                                            <option value="periscope">Periscope</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('fifth_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('fifth_camera_sensor_model') is-invalid @enderror"
                                            id="fifth_camera_sensor_model" name="fifth_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('fifth_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_sensor_size" class="form-label fw-bold">Sensor Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('fifth_camera_sensor_size') is-invalid @enderror"
                                            id="fifth_camera_sensor_size" name="fifth_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('fifth_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('fifth_camera_sensor_MP_value') is-invalid @enderror"
                                            id="fifth_camera_sensor_MP_value" name="fifth_camera_sensor_MP_value"
                                            placeholder="e.g., 50">
                                        @error('fifth_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('fifth_camera_has_eis_or_ois') is-invalid @enderror"
                                            id="fifth_camera_has_eis_or_ois" name="fifth_camera_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('fifth_camera_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('fifth_camera_video_recording') is-invalid @enderror"
                                            id="fifth_camera_video_recording" name="fifth_camera_video_recording"
                                            placeholder="e.g., 8K@30fps">
                                        @error('fifth_camera_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_optical_zoom" class="form-label fw-bold">Optical
                                            Zoom</label>
                                        <input type="text"
                                            class="form-control @error('fifth_camera_optical_zoom') is-invalid @enderror"
                                            id="fifth_camera_optical_zoom" name="fifth_camera_optical_zoom"
                                            placeholder="e.g., 3x">
                                        @error('fifth_camera_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('fifth_camera_special_feature') is-invalid @enderror"
                                            id="fifth_camera_special_feature" name="fifth_camera_special_feature"
                                            placeholder="e.g., Night mode">
                                        @error('fifth_camera_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fifth_camera_special_sign" class="form-label fw-bold">Special
                                            Sign</label>
                                        <input type="text"
                                            class="form-control @error('fifth_camera_special_sign') is-invalid @enderror"
                                            id="fifth_camera_special_sign" name="fifth_camera_special_sign"
                                            placeholder="e.g., Leica">
                                        @error('fifth_camera_special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Camera (Front) -->
                                <h4 class="section-title camera mt-4"><i class="bi bi-camera-video"></i> Camera (Front)</h4>

                                <!-- First Front Camera -->
                                <h5 class="subsection-title">First Front Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_front_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('first_front_camera') is-invalid @enderror"
                                            id="first_front_camera" name="first_front_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('first_front_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_front_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('first_front_camera_sensor_model') is-invalid @enderror"
                                            id="first_front_camera_sensor_model" name="first_front_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('first_front_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_front_camera_sensor_size" class="form-label fw-bold">Sensor
                                            Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('first_front_camera_sensor_size') is-invalid @enderror"
                                            id="first_front_camera_sensor_size" name="first_front_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('first_front_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_front_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('first_front_camera_sensor_MP_value') is-invalid @enderror"
                                            id="first_front_camera_sensor_MP_value"
                                            name="first_front_camera_sensor_MP_value" placeholder="e.g., 50">
                                        @error('first_front_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_front_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('first_front_has_eis_or_ois') is-invalid @enderror"
                                            id="first_front_has_eis_or_ois" name="first_front_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('first_front_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('first_video_recording') is-invalid @enderror"
                                            id="first_video_recording" name="first_video_recording"
                                            placeholder="e.g., 4K@60fps">
                                        @error('first_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="first_optical_zoom" class="form-label fw-bold">Optical Zoom</label>
                                        <input type="text"
                                            class="form-control @error('first_optical_zoom') is-invalid @enderror"
                                            id="first_optical_zoom" name="first_optical_zoom" placeholder="e.g., 2x">
                                        @error('first_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="first_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('first_special_feature') is-invalid @enderror"
                                            id="first_special_feature" name="first_special_feature" placeholder="e.g., HDR">
                                        @error('first_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Second Front Camera -->
                                <h5 class="subsection-title">Second Front Camera</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_front_camera" class="form-label fw-bold">Type</label>
                                        <select class="form-select @error('second_front_camera') is-invalid @enderror"
                                            id="second_front_camera" name="second_front_camera">
                                            <option value="">None</option>
                                            <option value="main">Main</option>
                                            <option value="macro">Macro</option>
                                            <option value="depth">Depth</option>
                                            <option value="telephoto">Telephoto</option>
                                            <option value="ultra-wide">Ultra-Wide</option>
                                        </select>
                                        @error('second_front_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_front_camera_sensor_model" class="form-label fw-bold">Sensor
                                            Model</label>
                                        <input type="text"
                                            class="form-control @error('second_front_camera_sensor_model') is-invalid @enderror"
                                            id="second_front_camera_sensor_model" name="second_front_camera_sensor_model"
                                            placeholder="e.g., IMX766">
                                        @error('second_front_camera_sensor_model')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_front_camera_sensor_size" class="form-label fw-bold">Sensor
                                            Size</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('second_front_camera_sensor_size') is-invalid @enderror"
                                            id="second_front_camera_sensor_size" name="second_front_camera_sensor_size"
                                            placeholder="e.g., 1.56">
                                        @error('second_front_camera_sensor_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_front_camera_sensor_MP_value" class="form-label fw-bold">MP
                                            Value</label>
                                        <input type="number"
                                            class="form-control @error('second_front_camera_sensor_MP_value') is-invalid @enderror"
                                            id="second_front_camera_sensor_MP_value"
                                            name="second_front_camera_sensor_MP_value" placeholder="e.g., 50">
                                        @error('second_front_camera_sensor_MP_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_front_has_eis_or_ois" class="form-label fw-bold">EIS/OIS</label>
                                        <select
                                            class="form-select @error('second_front_has_eis_or_ois') is-invalid @enderror"
                                            id="second_front_has_eis_or_ois" name="second_front_has_eis_or_ois">
                                            <option value="none">None</option>
                                            <option value="both">Both</option>
                                            <option value="OIS">OIS</option>
                                            <option value="EIS">EIS</option>
                                        </select>
                                        @error('second_front_has_eis_or_ois')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_video_recording" class="form-label fw-bold">Video
                                            Recording</label>
                                        <input type="text"
                                            class="form-control @error('second_video_recording') is-invalid @enderror"
                                            id="second_video_recording" name="second_video_recording"
                                            placeholder="e.g., 4K@60fps">
                                        @error('second_video_recording')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="second_optical_zoom" class="form-label fw-bold">Optical Zoom</label>
                                        <input type="text"
                                            class="form-control @error('second_optical_zoom') is-invalid @enderror"
                                            id="second_optical_zoom" name="second_optical_zoom" placeholder="e.g., 2x">
                                        @error('second_optical_zoom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="second_special_feature" class="form-label fw-bold">Special
                                            Feature</label>
                                        <input type="text"
                                            class="form-control @error('second_special_feature') is-invalid @enderror"
                                            id="second_special_feature" name="second_special_feature"
                                            placeholder="e.g., HDR">
                                        @error('second_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Sound System -->
                                <h4 class="section-title sound mt-4"><i class="bi bi-volume-up"></i> Sound System</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input @error('has_speaker') is-invalid @enderror"
                                                type="checkbox" id="has_speaker" name="has_speaker" value="1">
                                            <label class="form-check-label fw-bold" for="has_speaker">
                                                Has Speaker
                                            </label>
                                            @error('has_speaker')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="speaker_type" class="form-label fw-bold">Speaker Type</label>
                                        <select class="form-select @error('speaker_type') is-invalid @enderror"
                                            id="speaker_type" name="speaker_type">
                                            <option value="mono">Mono</option>
                                            <option value="stereo">Stereo</option>
                                            <option value="unidentified">Unidentified</option>
                                        </select>
                                        @error('speaker_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="special_sign" class="form-label fw-bold">Special Sign</label>
                                        <input type="text" class="form-control @error('special_sign') is-invalid @enderror"
                                            id="special_sign" name="special_sign" placeholder="e.g., Dolby Atmos">
                                        @error('special_sign')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input @error('loudspeaker') is-invalid @enderror"
                                            type="checkbox" id="loudspeaker" name="loudspeaker" value="1">
                                        <label class="form-check-label fw-bold" for="loudspeaker">
                                            Loudspeaker
                                        </label>
                                        @error('loudspeaker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Charging/Battery -->
                                <h4 class="section-title battery mt-4"><i class="bi bi-battery-charging"></i>
                                    Charging/Battery</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="charging_socket_type" class="form-label fw-bold">Charging Socket
                                            Type</label>
                                        <select class="form-select @error('charging_socket_type') is-invalid @enderror"
                                            id="charging_socket_type" name="charging_socket_type">
                                            <option value="type-c">Type-C</option>
                                            <option value="micro">Micro</option>
                                            <option value="lightning">Lightning</option>
                                        </select>
                                        @error('charging_socket_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="charging_speed" class="form-label fw-bold">Charging Speed (W)</label>
                                        <input type="number"
                                            class="form-control @error('charging_speed') is-invalid @enderror"
                                            id="charging_speed" name="charging_speed" placeholder="e.g., 65">
                                        @error('charging_speed')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input @error('has_wireless') is-invalid @enderror"
                                                type="checkbox" id="has_wireless" name="has_wireless" value="1">
                                            <label class="form-check-label fw-bold" for="has_wireless">
                                                Has Wireless Charging
                                            </label>
                                            @error('has_wireless')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="wireless_charging_speed" class="form-label fw-bold">Wireless Charging
                                            Speed (W)</label>
                                        <input type="number"
                                            class="form-control @error('wireless_charging_speed') is-invalid @enderror"
                                            id="wireless_charging_speed" name="wireless_charging_speed"
                                            placeholder="e.g., 15">
                                        @error('wireless_charging_speed')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input @error('has_reverse_wired') is-invalid @enderror"
                                                type="checkbox" id="has_reverse_wired" name="has_reverse_wired" value="1">
                                            <label class="form-check-label fw-bold" for="has_reverse_wired">
                                                Has Reverse Wired Charging
                                            </label>
                                            @error('has_reverse_wired')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="reverse_charging_speed" class="form-label fw-bold">Reverse Charging
                                            Speed (W)</label>
                                        <input type="number"
                                            class="form-control @error('reverse_charging_speed') is-invalid @enderror"
                                            id="reverse_charging_speed" name="reverse_charging_speed"
                                            placeholder="e.g., 10">
                                        @error('reverse_charging_speed')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('has_reverse_wireless') is-invalid @enderror"
                                                type="checkbox" id="has_reverse_wireless" name="has_reverse_wireless"
                                                value="1">
                                            <label class="form-check-label fw-bold" for="has_reverse_wireless">
                                                Has Reverse Wireless Charging
                                            </label>
                                            @error('has_reverse_wireless')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="reverse_wireless_charging_speed" class="form-label fw-bold">Reverse
                                            Wireless Charging Speed (W)</label>
                                        <input type="number"
                                            class="form-control @error('reverse_wireless_charging_speed') is-invalid @enderror"
                                            id="reverse_wireless_charging_speed" name="reverse_wireless_charging_speed"
                                            placeholder="e.g., 5">
                                        @error('reverse_wireless_charging_speed')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="charging_time_full" class="form-label fw-bold">Charging Time
                                            Full</label>
                                        <input type="text"
                                            class="form-control @error('charging_time_full') is-invalid @enderror"
                                            id="charging_time_full" name="charging_time_full" placeholder="e.g., 1h 30m">
                                        @error('charging_time_full')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="usb_charging_version" class="form-label fw-bold">USB Charging
                                            Version</label>
                                        <input type="text"
                                            class="form-control @error('usb_charging_version') is-invalid @enderror"
                                            id="usb_charging_version" name="usb_charging_version"
                                            placeholder="e.g., USB 3.1">
                                        @error('usb_charging_version')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="battery_capacity" class="form-label fw-bold">Battery Capacity
                                            (mAh)</label>
                                        <input type="number"
                                            class="form-control @error('battery_capacity') is-invalid @enderror"
                                            id="battery_capacity" name="battery_capacity" placeholder="e.g., 5000">
                                        @error('battery_capacity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Display -->
                                <h4 class="section-title display mt-4"><i class="bi bi-display"></i> Main Display</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_type" class="form-label fw-bold">Screen Type <span
                                                class="field-optional">Optional</span></label>
                                        <select class="form-select @error('screen_type') is-invalid @enderror"
                                            id="screen_type" name="screen_type">
                                            <option value="amoled">AMOLED</option>
                                            <option value="ips-lcd">IPS-LCD</option>
                                            <option value="oled">OLED</option>
                                            <option value="super-amoled">Super AMOLED</option>
                                            <option value="dynamic-amoled">Dynamic AMOLED</option>
                                        </select>
                                        @error('screen_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_resolution" class="form-label fw-bold">Screen Resolution <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text"
                                            class="form-control @error('screen_resolution') is-invalid @enderror"
                                            id="screen_resolution" name="screen_resolution" placeholder="e.g., 1080 x 2400">
                                        @error('screen_resolution')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_FPS" class="form-label fw-bold">Screen FPS <span
                                                class="field-optional">Optional</span></label>
                                        <input type="number" class="form-control @error('screen_FPS') is-invalid @enderror"
                                            id="screen_FPS" name="screen_FPS" placeholder="e.g., 120">
                                        @error('screen_FPS')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="has_special_feature" class="form-label fw-bold">Special Feature <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text"
                                            class="form-control @error('has_special_feature') is-invalid @enderror"
                                            id="has_special_feature" name="has_special_feature"
                                            placeholder="e.g., Always-on Display">
                                        @error('has_special_feature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="max_brightness" class="form-label fw-bold">Max Brightness (nits) <span
                                                class="field-optional">Optional</span></label>
                                        <input type="number"
                                            class="form-control @error('max_brightness') is-invalid @enderror"
                                            id="max_brightness" name="max_brightness" placeholder="e.g., 1200">
                                        @error('max_brightness')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_to_body_ratio" class="form-label fw-bold">Screen to Body Ratio
                                            <span class="field-optional">Optional</span></label>
                                        <input type="text"
                                            class="form-control @error('screen_to_body_ratio') is-invalid @enderror"
                                            id="screen_to_body_ratio" name="screen_to_body_ratio" placeholder="e.g., 90%">
                                        @error('screen_to_body_ratio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_size" class="form-label fw-bold">Screen Size (inches) <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text" class="form-control @error('screen_size') is-invalid @enderror"
                                            id="screen_size" name="screen_size" placeholder="e.g., 6.1">
                                        @error('screen_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="screen_protection" class="form-label fw-bold">Screen Protection <span
                                                class="field-optional">Optional</span></label>
                                        <input type="text"
                                            class="form-control @error('screen_protection') is-invalid @enderror"
                                            id="screen_protection" name="screen_protection"
                                            placeholder="e.g., Gorilla Glass Victus">
                                        @error('screen_protection')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Body -->
                                <h4 class="section-title body mt-4"><i class="bi bi-phone-fill"></i> Body</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="dimensions" class="form-label fw-bold">Dimensions</label>
                                        <input type="text" class="form-control @error('dimensions') is-invalid @enderror"
                                            id="dimensions" name="dimensions" placeholder="e.g., 161.4 x 73.3 x 7.9 mm">
                                        @error('dimensions')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="weight" class="form-label fw-bold">Weight</label>
                                        <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                            id="weight" name="weight" placeholder="e.g., 178 g">
                                        @error('weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="thickness" class="form-label fw-bold">Thickness (mm)</label>
                                        <input type="number" step="0.1"
                                            class="form-control @error('thickness') is-invalid @enderror" id="thickness"
                                            name="thickness" placeholder="e.g., 7.9">
                                        @error('thickness')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="build_material" class="form-label fw-bold">Build Material</label>
                                        <input type="text"
                                            class="form-control @error('build_material') is-invalid @enderror"
                                            id="build_material" name="build_material"
                                            placeholder="e.g., Glass front, aluminum frame">
                                        @error('build_material')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="sim_type" class="form-label fw-bold">SIM Type</label>
                                        <input type="text" class="form-control @error('sim_type') is-invalid @enderror"
                                            id="sim_type" name="sim_type" placeholder="e.g., Dual SIM (Nano-SIM)">
                                        @error('sim_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="protection_rating" class="form-label fw-bold">Protection Rating</label>
                                        <input type="text"
                                            class="form-control @error('protection_rating') is-invalid @enderror"
                                            id="protection_rating" name="protection_rating" placeholder="e.g., IP68">
                                        @error('protection_rating')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Secondary Display -->
                                <h4 class="section-title display mt-4"><i class="bi bi-display-fill"></i> Secondary Display
                                    <span class="field-optional">Optional</span></h4>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input @error('has_secondary_display') is-invalid @enderror"
                                            type="checkbox" id="has_secondary_display" name="has_secondary_display"
                                            value="1">
                                        <label class="form-check-label fw-bold" for="has_secondary_display">
                                            Has Secondary Display
                                        </label>
                                        @error('has_secondary_display')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="secondary-display-section" class="dependent-section">
                                    <div class="section-disabled-notice" id="secondary-display-notice">⚠️ Enable "Has
                                        Secondary Display" to edit details</div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="second_screen_type" class="form-label fw-bold">Secondary Screen Type
                                                <span class="field-optional">Optional</span></label>
                                            <select class="form-select @error('second_screen_type') is-invalid @enderror"
                                                id="second_screen_type" name="second_screen_type">
                                                <option value="">None</option>
                                                <option value="amoled">AMOLED</option>
                                                <option value="ips-lcd">IPS-LCD</option>
                                                <option value="oled">OLED</option>
                                                <option value="super-amoled">Super AMOLED</option>
                                                <option value="dynamic-amoled">Dynamic AMOLED</option>
                                                <option value="e-ink">E-Ink</option>
                                            </select>
                                            @error('second_screen_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="second_screen_resolution" class="form-label fw-bold">Secondary
                                                Screen Resolution <span class="field-optional">Optional</span></label>
                                            <input type="text"
                                                class="form-control @error('second_screen_resolution') is-invalid @enderror"
                                                id="second_screen_resolution" name="second_screen_resolution"
                                                placeholder="e.g., 1080 x 2400">
                                            @error('second_screen_resolution')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="second_screen_FPS" class="form-label fw-bold">Secondary Screen FPS
                                                <span class="field-optional">Optional</span></label>
                                            <input type="number"
                                                class="form-control @error('second_screen_FPS') is-invalid @enderror"
                                                id="second_screen_FPS" name="second_screen_FPS" placeholder="e.g., 120">
                                            @error('second_screen_FPS')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="second_screen_size" class="form-label fw-bold">Secondary Screen Size
                                                <span class="field-optional">Optional</span></label>
                                            <input type="text"
                                                class="form-control @error('second_screen_size') is-invalid @enderror"
                                                id="second_screen_size" name="second_screen_size"
                                                placeholder="e.g., 6.2 inches">
                                            @error('second_screen_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="second_max_brightness" class="form-label fw-bold">Secondary Max
                                                Brightness (nits) <span class="field-optional">Optional</span></label>
                                            <input type="number"
                                                class="form-control @error('second_max_brightness') is-invalid @enderror"
                                                id="second_max_brightness" name="second_max_brightness"
                                                placeholder="e.g., 1200">
                                            @error('second_max_brightness')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="second_screen_location" class="form-label fw-bold">Secondary Screen
                                                Location <span class="field-optional">Optional</span></label>
                                            <select
                                                class="form-select @error('second_screen_location') is-invalid @enderror"
                                                id="second_screen_location" name="second_screen_location">
                                                <option value="">None</option>
                                                <option value="front">Front</option>
                                                <option value="back">Back</option>
                                                <option value="inside">Inside</option>
                                            </select>
                                            @error('second_screen_location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.phone') }}" class="btn-secondary-custom">
                                        <i class="bi bi-arrow-left"></i> Back to Phones
                                    </a>
                                    <button type="submit" class="submit-btn">
                                        <i class="bi bi-check-circle"></i> Create Phone
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Dependency mapping: checkbox ID -> section ID
                const dependencies = {
                    'has_camera': 'camera-section',
                    'has_speaker': 'speaker-section',
                    'has_wireless': 'wireless-section',
                    'has_reverse_wired': 'reverse-wired-section',
                    'has_reverse_wireless': 'reverse-wireless-section',
                    'has_secondary_display': 'secondary-display-section'
                };

                // Initialize all dependent sections
                Object.entries(dependencies).forEach(([checkboxId, sectionId]) => {
                    const checkbox = document.getElementById(checkboxId);
                    const section = document.getElementById(sectionId);
                    const label = checkbox ? checkbox.nextElementSibling : null;
                    const noticeId = `${sectionId.replace('-section', '')}-notice`;
                    const notice = document.getElementById(noticeId);

                    if (checkbox && section) {
                        function toggleSection() {
                            const isChecked = checkbox.checked;

                            // Toggle checkbox styling
                            if (isChecked) {
                                checkbox.classList.add('active');
                                checkbox.classList.remove('inactive');
                                if (label) {
                                    label.classList.add('active');
                                    label.classList.remove('inactive');
                                }
                            } else {
                                checkbox.classList.add('inactive');
                                checkbox.classList.remove('active');
                                if (label) {
                                    label.classList.add('inactive');
                                    label.classList.remove('active');
                                }
                            }

                            // Toggle section visibility and fields
                            const fields = section.querySelectorAll('input, select, textarea');
                            if (isChecked) {
                                section.classList.remove('disabled');
                                fields.forEach(field => field.disabled = false);
                                if (notice) notice.classList.remove('show');
                            } else {
                                section.classList.add('disabled');
                                fields.forEach(field => field.disabled = true);
                                if (notice) notice.classList.add('show');
                            }
                        }

                        checkbox.addEventListener('change', toggleSection);
                        toggleSection(); // Initialize state
                    }
                });

                // Handle all other checkboxes (non-dependent ones)
                const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
                allCheckboxes.forEach(checkbox => {
                    if (!dependencies.hasOwnProperty(checkbox.id)) {
                        const label = checkbox.nextElementSibling;

                        function updateCheckboxStyle() {
                            if (checkbox.checked) {
                                checkbox.classList.add('active');
                                checkbox.classList.remove('inactive');
                                if (label) {
                                    label.classList.add('active');
                                    label.classList.remove('inactive');
                                }
                            } else {
                                checkbox.classList.add('inactive');
                                checkbox.classList.remove('active');
                                if (label) {
                                    label.classList.add('inactive');
                                    label.classList.remove('active');
                                }
                            }
                        }

                        checkbox.addEventListener('change', updateCheckboxStyle);
                        updateCheckboxStyle(); // Initialize
                    }
                });
            });
        </script>
@endsection