<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI DESA - Digital Governance Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-glow: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #0f172a; 
            color: white;
            overflow-x: hidden; 
        }
        
        .navbar {
            backdrop-filter: blur(15px);
            background: rgba(15, 23, 42, 0.7);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .hero {
            background: radial-gradient(circle at top right, rgba(37, 99, 235, 0.2), transparent),
                        radial-gradient(circle at bottom left, rgba(14, 165, 233, 0.1), transparent),
                        url('https://r.jina.ai/i/9e00661266ec4804bc617e1320349f7e'); 
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.95));
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .btn-primary-glow {
            background: var(--primary-glow);
            border: none;
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.5);
            color: white;
        }

        .stat-badge {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 15px;
            padding: 15px 25px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            margin: 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-800 fs-4" href="#">
                <i class="bi bi-cpu-fill text-info me-2"></i>SI-DESA
            </a>
            <div class="ms-auto d-flex gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-light rounded-pill px-4 fw-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none px-4 fw-600">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary-glow">Daftar Sekarang</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-7 fade-in-up">
                    <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill mb-3 fw-bold">
                        <i class="bi bi-stars me-2"></i>Transformasi Desa Digital 2026
                    </span>
                    <h1 class="display-2 fw-800 mb-4 line-height-1">Sistem Administrasi <span class="text-info">Terpadu</span> Desa.</h1>
                    <p class="lead mb-5 text-secondary fs-4" style="max-width: 600px;">
                        Integrasi data penduduk dan layanan persuratan otomatis untuk pelayanan publik yang lebih cepat, transparan, dan akurat.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <div class="stat-badge">
                            <i class="bi bi-people fs-3 text-info"></i>
                            <div><div class="fw-800">Penduduk</div><small class="text-muted">Real-time Data</small></div>
                        </div>
                        <div class="stat-badge">
                            <i class="bi bi-file-earmark-text fs-3 text-success"></i>
                            <div><div class="fw-800">E-Surat</div><small class="text-muted">Automated PDF</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 fade-in-up" style="animation-delay: 0.2s;">
                    <div class="glass-card text-center">
                        <i class="bi bi-shield-lock-fill display-1 text-info mb-4"></i>
                        <h3 class="fw-bold mb-4">Akses Administrator</h3>
                        <p class="text-secondary small mb-5">Silahkan login untuk mengelola database penduduk dan menerbitkan surat keterangan resmi.</p>
                        <div class="d-grid gap-3">
                            <a href="{{ route('login') }}" class="btn btn-primary-glow py-3">MASUK KE DASHBOARD</a>
                            <a href="#features" class="text-white-50 small text-decoration-none">Pelajari Fitur Sistem <i class="bi bi-arrow-down ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 border-top border-white border-opacity-10 text-center">
        <p class="text-secondary small mb-0">&copy; 2026 <strong>Afif Ananta</strong> - UINSU Medan. Crafted for Digital Governance.</p>
    </footer>

</body>
</html>