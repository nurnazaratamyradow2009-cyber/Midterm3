<div class="col">
    <a href="{{ route('foods.show', $food->id) }}" class="text-decoration-none text-dark">
        <div class="border border-1 p-3 rounded-2 h-100 d-flex flex-column">
            <div class="position-relative">
                <!-- img/image1.png -->
                <img src="{{ asset('img/meal.jpg') }}" class="img-fluid rounded-2" alt="">
                <div class="position-absolute top-0 end-0">
                    <span class="btn btn-sm btn-success">{{ $food->category->name }}</span>
                </div>
            </div>

            <div class="h5 mb-auto mt-2">
                <span class="small text-success fw-semibold me-1">
                    <i class="bi bi-shop"></i> {{ $food->restaurant->name }}
                </span> {{ $food->name }}
            </div>
            @if ($food->is_discount)
                <div class="h3 my-2">
                    <del class="text-secondary h5">{{ $food->price }} TMT</del>
                    <span>
                        {{ $food->price - (($food->price / 100) * $food->discount_percent) }}
                        TMT
                    </span>
                </div>
            @else
                <div class="d-flex justify-content-between">
                    <div class="h3 my-2">
                        {{ $food->price }} TMT
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-sm btn-success w-100">
                    <i class="bi bi-cart-plus"></i>
                </a>
            </div>
        </div>
    </a>
</div>