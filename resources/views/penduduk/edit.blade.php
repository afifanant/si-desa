<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Pembaruan Profil Warga</h4>
                <p class="text-muted small mb-0">Lakukan perubahan pada identitas warga secara teliti dan legal.</p>
            </div>
            <a href="{{ route('penduduk.index') }}" class="btn btn-link text-decoration-none text-secondary fw-600">
                <i class="bi bi-x-lg me-2"></i> Batalkan Perubahan
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-elegant border-0 shadow-lg p-2">
                    <div class="card-body p-5">
                        <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Nomor Induk (KTP)</label>
                                    <div class="input-group border-bottom pb-2">
                                        <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                            <i class="bi bi-shield-check fs-5"></i>
                                        </span>
                                        <input type="text" name="nik" class="form-control bg-transparent border-0 fw-600 fs-5" 
                                               value="{{ $penduduk->nik }}" required placeholder="Input 16 digit NIK">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Nama Lengkap</label>
                                    <div class="input-group border-bottom pb-2">
                                        <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                            <i class="bi bi-person-bounding-box fs-5"></i>
                                        </span>
                                        <input type="text" name="nama" class="form-control bg-transparent border-0 fw-600 fs-5" 
                                               value="{{ $penduduk->nama }}" required placeholder="Nama sesuai dokumen">
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Alamat Domisili Terkini</label>
                                    <textarea name="alamat" class="form-control border-0 bg-light rounded-4 p-4" rows="3" 
                                              placeholder="Tuliskan alamat lengkap warga...">{{ $penduduk->alamat }}</textarea>
                                </div>

                                <div class="col-12 mt-5 pt-4 d-flex gap-3">
                                    <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill fw-bold shadow-sm flex-grow-1" 
                                            style="background: #0f172a;">
                                        <i class="bi bi-cloud-arrow-up-fill me-2"></i> Simpan Perubahan
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary px-4 py-3 rounded-pill">
                                        Reset Form
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="mt-4 text-center">
                    <small class="text-muted">
                        <i class="bi bi-lock-fill me-1"></i> Data dienkripsi dan diubah secara sah oleh Admin: <strong>{{ Auth::user()->name }}</strong>
                    </small>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>