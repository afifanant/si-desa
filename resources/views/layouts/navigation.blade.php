<nav class="navbar navbar-expand-lg sticky-top" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); border-bottom: 1px solid rgba(226, 232, 240, 0.3);">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center">
            <span class="h5 fw-800 mb-0 text-dark" style="font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.5px;">
                @if(request()->routeIs('dashboard'))
                    Dashboard Overview
                @elseif(request()->routeIs('penduduk.*'))
                    Resident Management
                @elseif(request()->routeIs('surat.*'))
                    Service Center
                @else
                    Administrative Panel
                @endif
            </span>
        </div>

        <div class="d-flex align-items-center gap-4">
            <div class="d-none d-lg-flex align-items-center gap-2 px-3 py-2 bg-white rounded-pill border shadow-sm" style="font-size: 0.85rem;">
                <i class="bi bi-clock-fill text-primary"></i>
                <span class="fw-bold">{{ date('H:i') }}</span>
                <span class="text-muted mx-1">|</span>
                <span class="fw-600 text-secondary">{{ date('D, d M Y') }}</span>
            </div>

            <div class="dropdown">
                <button class="btn btn-white border-0 shadow-sm rounded-pill p-1 d-flex align-items-center gap-2 pe-3" type="button" data-bs-toggle="dropdown" style="background: white; transition: 0.3s;">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; font-weight: 700;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="text-start d-none d-sm-block">
                        <p class="mb-0 fw-bold text-dark small" style="line-height: 1;">{{ Auth::user()->name }}</p>
                        <small class="text-muted" style="font-size: 0.7rem;">Administrator</small>
                    </div>
                    <i class="bi bi-chevron-down small opacity-50 ms-2"></i>
                </button>
                
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 p-2" style="border-radius: 18px; min-width: 240px;">
                    <li class="p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2 text-primary">
                                <i class="bi bi-shield-check fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                                <small class="text-muted">{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider opacity-50"></li>
                    <li>
                        <a class="dropdown-item rounded-3 py-2 px-3 d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person-gear me-3 text-secondary"></i> Account Settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider opacity-50"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item rounded-3 py-2 px-3 text-danger d-flex align-items-center fw-600">
                                <i class="bi bi-box-arrow-right me-3"></i> Sign Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>