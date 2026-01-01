<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SI DESA DIGITAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-glow: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)), 
                        url('https://r.jina.ai/i/9e00661266ec4804bc617e1320349f7e');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .glass-login {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white !important;
            border-radius: 12px;
            padding: 12px 15px;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }
        .form-control::placeholder { color: rgba(255,255,255,0.4); }
        
        .btn-primary-glow {
            background: var(--primary-glow);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .btn-primary-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.4);
            color: white;
        }
        .input-group-text {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0 12px 12px 0;
        }
        /* Style Tambahan untuk Info Box */
        .info-box-dosen {
            background: rgba(14, 165, 233, 0.1);
            border: 1px solid rgba(14, 165, 233, 0.2);
            border-radius: 15px;
            padding: 15px;
            margin-top: 25px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card glass-login">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="mb-3">
                            <i class="bi bi-cpu-fill text-info fs-1"></i>
                        </div>
                        <h3 class="fw-800 text-white">SI-DESA</h3>
                        <p class="text-white-50 small">Akses Pusat Kendali Digital</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label small fw-600 text-white-50">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="admin@desa.com" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-600 text-white-50">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" style="border-right: none;" placeholder="••••••••" required>
                                <span class="input-group-text" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small text-white-50" for="remember">Ingat Saya</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-glow py-3 text-uppercase">Masuk Sekarang</button>
                        </div>
                    </form>

                    <div class="info-box-dosen text-center">
                        <p class="small text-info mb-1 fw-bold">
                            <i class="bi bi-info-circle-fill me-1"></i> Akun Pengujian UAS
                        </p>
                        <div class="text-white-50" style="font-size: 0.75rem;">
                            <span class="d-block">Email: <strong>admin@desa.com</strong></span>
                            <span class="d-block">Password: <strong>admindesa</strong></span>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('register') }}" class="text-decoration-none small text-white-50">Belum punya akses? <b class="text-info">Daftar Admin</b></a>
                    </div>
                </div>
            </div>
            <p class="text-center text-white-50 mt-4 small">&copy; 2026 UINSU Medan - <strong>Afif Ananta</strong></p>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const icon = togglePassword.querySelector('i');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });
</script>

</body>
</html>