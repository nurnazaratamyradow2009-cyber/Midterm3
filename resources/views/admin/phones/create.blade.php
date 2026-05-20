@extends('admin.layouts.head')

@section('main-content')
    <style>
        .create-container {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .create-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .create-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px 15px 0 0;
        }
        .create-header h2 {
            font-weight: 700;
            margin: 0;
            font-size: 28px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }
        .section-divider {
            margin: 30px 0 25px 0;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
        }
        .section-title {
            font-weight: 700;
            color: #667eea;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }
        .btn-save {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 35px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        .btn-cancel {
            background: #f0f0f0;
            color: #333;
            padding: 12px 35px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-cancel:hover {
            background: #e0e0e0;
        }
    </style>

    <div class="create-container">
        <div class="container">
            <div class="create-card">
                <div class="create-header">
                    <h2><i class="bi bi-phone-flip me-2"></i>Add New Phone Entry</h2>
                </div>

                <div class="p-5">
                    <form action="{{ route('admin.phone.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- General Information Section -->
                        <div class="section-title section-divider">
                            <i class="bi bi-info-circle me-2"></i>Core Hardware Specifications
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Model Name</label>
                                <input type="text" name="model" class="form-control" value="{{ old('model') }}" placeholder="e.g., Note 14 Pro+" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Brand</label>
                                <select name="brand_id" class="form-select" required>
                                    <option value="">-- Select a Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Select a Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Processor / SoC</label>
                                <input type="text" name="processor" class="form-control" value="{{ old('processor') }}" placeholder="e.g., Dimensity 7300-Ultra">
                            </div>
                        </div>

                        <!-- Display Section -->
                        <div class="section-title section-divider">
                            <i class="bi bi-display me-2"></i>Display Performance
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Screen Refresh Rate (Hz)</label>
                                <input type="number" name="screen_refresh_rate" class="form-control" value="{{ old('screen_refresh_rate', 120) }}" placeholder="e.g., 120">
                            </div>
                        </div>

                        <!-- Rear Camera Setup Section -->
                        <div class="section-title section-divider">
                            <i class="bi bi-camera me-2"></i>Rear Camera Array Configuration
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Total Back Cameras</label>
                                <input type="number" name="back_camera_count" class="form-control" value="{{ old('back_camera_count', 3) }}" placeholder="e.g., 3">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Primary Lens (MP)</label>
                                <input type="number" name="first_camera_mp" class="form-control" value="{{ old('first_camera_mp') }}" placeholder="e.g., 50">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Secondary Lens (MP)</label>
                                <input type="number" name="second_camera_mp" class="form-control" value="{{ old('second_camera_mp') }}" placeholder="e.g., 8">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Third Lens (MP)</label>
                                <input type="number" name="third_camera_mp" class="form-control" value="{{ old('third_camera_mp') }}" placeholder="e.g., 2">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Fourth Lens (MP)</label>
                                <input type="number" name="fourth_camera_mp" class="form-control" value="{{ old('fourth_camera_mp') }}" placeholder="e.g., 0">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Fifth Lens (MP)</label>
                                <input type="number" name="fifth_camera_mp" class="form-control" value="{{ old('fifth_camera_mp') }}" placeholder="e.g., 0">
                            </div>
                        </div>

                        <!-- Front Camera Setup Section -->
                        <div class="section-title section-divider">
                            <i class="bi bi-camera-video me-2"></i>Front Selfie Camera Array
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Total Front Cameras</label>
                                <input type="number" name="front_camera_count" class="form-control" value="{{ old('front_camera_count', 1) }}" placeholder="e.g., 1">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Primary Selfie (MP)</label>
                                <input type="number" name="first_front_camera_mp" class="form-control" value="{{ old('first_front_camera_mp') }}" placeholder="e.g., 20">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Secondary Selfie (MP)</label>
                                <input type="number" name="second_front_camera_mp" class="form-control" value="{{ old('second_front_camera_mp') }}" placeholder="e.g., 0">
                            </div>
                        </div>

                        <!-- Historical Production Lifespan -->
                        <div class="section-title section-divider">
                            <i class="bi bi-calendar-event me-2"></i>Market Lifecycle Dates
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Announced Year</label>
                                <input type="text" name="announced_year" class="form-control" value="{{ old('announced_year') }}" placeholder="e.g., 2024">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Produced Year</label>
                                <input type="text" name="produced_year" class="form-control" value="{{ old('produced_year') }}" placeholder="e.g., 2024">
                            </div>
                        </div>

                        <!-- Action Controls -->
                        <div class="button-group">
                            <button type="submit" class="btn-save">
                                <i class="bi bi-cloud-arrow-up me-2"></i>Create Phone Record
                            </button>
                            <a href="{{ route('admin.phone') }}" class="btn-cancel">
                                <i class="bi bi-arrow-left-circle me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection