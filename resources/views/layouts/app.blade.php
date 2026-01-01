<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SI-DESA | Professional Integrated System</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --accent-glow: #0ea5e9;
            --sidebar-dark: #020617;
            --bg-body: #f8fafc;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --card-border: rgba(0,0,0,0.05);
        }

        [data-bs-theme="dark"] {
            --bg-body: #020617;
            --glass-bg: rgba(15, 23, 42, 0.85);
            --card-border: rgba(255,255,255,0.05);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-body); 
            transition: background-color 0.4s ease;
            overflow-x: hidden;
        }

        /* Sidebar Logic */
        .sidebar { 
            width: var(--sidebar-width); height: 100vh; position: fixed; 
            background: var(--sidebar-dark); z-index: 1051; left: 0;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        header {
            margin-left: var(--sidebar-width); padding: 1.2rem 3rem;
            background: var(--glass-bg); backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--card-border);
            position: sticky; top: 0; z-index: 1000; 
            transition: all 0.4s ease;
        }

        .main-content { 
            margin-left: var(--sidebar-width); padding: 3rem; 
            min-height: calc(100vh - 85px); 
            transition: all 0.4s ease; 
        }

        /* Responsiveness & Toggled State */
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            header, .main-content { margin-left: 0 !important; width: 100% !important; }
            body.sidebar-toggled .sidebar { transform: translateX(0); }
            body.sidebar-toggled .sidebar-overlay { display: block; }
        }

        body.sidebar-toggled .sidebar { transform: translateX(-100%); }
        body.sidebar-toggled header, body.sidebar-toggled .main-content { margin-left: 0; }

        .sidebar-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 1050; backdrop-filter: blur(4px);
        }

        /* Nav & Cards */
        .nav-link { 
            color: #64748b; font-weight: 600; padding: 1rem 1.5rem; margin: 0.3rem 1.2rem;
            border-radius: 14px; transition: 0.3s; display: flex; align-items: center;
        }
        .nav-link:hover { color: var(--accent-glow); background: rgba(56, 189, 248, 0.05); }
        .nav-link.active { 
            background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%); 
            color: white !important; box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.3); 
        }

        .profile-card {
            background: rgba(255,255,255,0.03); border-radius: 20px; padding: 1rem;
            margin: 1rem 1.2rem; display: flex; align-items: center; gap: 12px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .btn-toggle-nav { 
            background: rgba(56, 189, 248, 0.1); border: none; color: var(--accent-glow); 
            width: 42px; height: 42px; border-radius: 10px; transition: 0.3s; 
        }

        .clock-badge { font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; letter-spacing: 1px; }

        .fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body id="body-pd">
    <div class="sidebar-overlay" id="overlay"></div>

    <aside class="sidebar shadow-lg">
        <div class="brand-logo text-center py-5">
            <i class="bi bi-houses-fill text-info" style="font-size: 3rem;"></i>
            <h4 class="fw-800 text-white mt-2 mb-0">SI-DESA</h4>
            <p class="text-secondary small fw-bold opacity-25 mt-1" style="letter-spacing: 3px;">SERVICE PANEL</p>
        </div>

        <nav class="nav flex-column mt-2">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill me-3"></i> Dashboard
            </a>
            <a href="{{ route('penduduk.index') }}" class="nav-link {{ request()->routeIs('penduduk.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge-fill me-3"></i> Data Penduduk
            </a>
            <a href="{{ route('surat.index') }}" class="nav-link {{ request()->routeIs('surat.*') ? 'active' : '' }}">
                <i class="bi bi-envelope-paper-heart-fill me-3"></i> Layanan Surat
            </a>
        </nav>

        <div class="profile-card mt-auto mb-4">
            <div class="bg-primary rounded-3 text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-white mb-0 small fw-bold text-truncate">{{ Auth::user()->name }}</p>
                <small class="text-secondary opacity-50" style="font-size: 0.65rem;">Administrator</small>
            </div>
        </div>

        <div class="p-4 border-top border-white border-opacity-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 rounded-pill py-2 small fw-bold">
                    <i class="bi bi-power me-2"></i> SIGN OUT
                </button>
            </form>
        </div>
    </aside>

    <header class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button class="btn-toggle-nav me-4" id="header-toggle">
                <i class="bi bi-list-nested fs-4"></i>
            </button>
            <div>
                <h5 class="fw-800 mb-0 text-dark">Hello, {{ explode(' ', Auth::user()->name)[0] }}</h5>
                <p class="text-muted small mb-0 d-none d-sm-block">
                    <i class="bi bi-shield-fill-check text-success me-1"></i> Session Verified
                </p>
            </div>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="d-none d-md-flex align-items-center gap-2 px-3 py-2 bg-white rounded-pill border shadow-sm">
                <i class="bi bi-clock-history text-primary"></i>
                <span class="small fw-bold clock-badge text-dark" id="live-clock">00:00:00</span>
            </div>
            
            <button class="btn btn-light rounded-circle shadow-sm p-2 border" id="themeSwitcher">
                <i class="bi bi-sun-fill text-warning" id="themeIcon"></i>
            </button>

            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 42px; height: 42px; border: 2px solid white;">
                <i class="bi bi-person-fill text-white fs-5"></i>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="fade-in">
            {{ $slot }}
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // SMART TOGGLE
        const body = document.body;
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('header-toggle');

        function toggleSidebar() {
            body.classList.toggle('sidebar-toggled');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // CLOCK
        function updateClock() {
            const now = new Date();
            document.getElementById('live-clock').innerText = now.toLocaleTimeString('id-ID');
        }
        setInterval(updateClock, 1000);
        updateClock();

        // THEME
        const themeBtn = document.getElementById('themeSwitcher');
        const themeIcon = document.getElementById('themeIcon');
        
        themeBtn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const targetTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-bs-theme', targetTheme);
            themeIcon.className = targetTheme === 'light' ? 'bi bi-sun-fill text-warning' : 'bi bi-moon-stars-fill text-info';
            localStorage.setItem('theme', targetTheme);
        });

        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
        themeIcon.className = savedTheme === 'light' ? 'bi bi-sun-fill text-warning' : 'bi bi-moon-stars-fill text-info';
    </script>
</body>
</html>