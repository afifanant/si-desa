<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | SI DESA DIGITAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-glow: linear-gradient(135deg, #10b981 0%, #059669 100%); /* Tema Hijau Sukses */
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.95)), 
                        url('https://r.jina.ai/i/9e00661266ec4804bc617e1320349f7e');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            padding: 40px 0;
        }
        .glass-register {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(25px);
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white !important;
            border-radius: 12px;
            padding: 12px 15px;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #10b981;
            box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.15);
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        
        .btn-register-glow {
            background: var(--primary-glow);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        .btn-register-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
            color: white;
        }
        .input-group-text {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card glass-register fade-in">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="mb-3">
                            <i class="bi bi-person-plus-fill text-success fs-1"></i>
                        </div>
                        <h3 class="fw-800 text-white">Registrasi Admin</h3>
                        <p class="text-white-50 small">Bergabunglah dalam digitalisasi desa</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label small fw-600 text-white-50">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Afif Ananta" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-600 text-white-50">Email Instansi</label>
                            <input type="email" name="email" class="form-control" placeholder="admin@desa.go.id" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label small fw-600 text-white-50">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" style="border-right: none;" placeholder="••••••••" required>
                                    <span class="input-group-text toggle-password" data-target="password">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label small fw-600 text-white-50">Konfirmasi</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="border-right: none;" placeholder="••••••••" required>
                                    <span class="input-group-text toggle-password" data-target="password_confirmation">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-register-glow py-3">DAFTAR AKUN SEKARANG</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-5">
                        <a href="{{ route('login') }}" class="text-decoration-none small text-white-50">Sudah punya akses? <b class="text-success">Masuk di sini</b></a>
                    </div>
                </div>
            </div>
            <p class="text-center text-white-50 mt-4 small">&copy; 2026 <strong>Afif Ananta</strong> - UINSU Medan</p>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    });
</script>

</body>
</html>