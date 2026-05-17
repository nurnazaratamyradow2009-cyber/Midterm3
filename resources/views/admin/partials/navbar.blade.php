<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
  <div class="container-lg">
    <a class="navbar-brand fw-bold text-white" href="#">
      <i class="bi bi-phone-fill me-2"></i>{{ __('app.admin.title') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">{{ __('app.admin.home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.phone') }}">{{ __('app.admin.all_phones') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.brand') }}">{{ __('app.admin.brands') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('admin.category') }}">{{ __('app.admin.category') }}</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link link-light dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            {{ strtoupper(app()->getLocale()) }}
          </a>
          <ul class="dropdown-menu p-1 dropdown-menu-end" data-bs-popper="static">
            <li>
              <a class="dropdown-item rounded {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                href="{{ route('locale', ['locale' => 'en']) }}">English</a>
            </li>
            <li>
              <a class="dropdown-item rounded {{ app()->getLocale() == 'tm' ? 'active' : '' }}"
                href="{{ route('locale', ['locale' => 'tm']) }}">Türkmen</a>
            </li>
            <li>
              <a class="dropdown-item rounded {{ app()->getLocale() == 'ru' ? 'active' : '' }}"
                href="{{ route('locale', ['locale' => 'ru']) }}">Русский</a>
            </li>
          </ul>
        </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger d-flex align-items-center gap-2 rounded-3 px-3 py-2">
          <i class="bi bi-box-arrow-right"></i>
          <span>{{ __('app.buttons.logout') }}</span>
        </button>
      </form>
    </div>
  </div>
</nav>