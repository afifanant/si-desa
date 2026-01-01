<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Pendaftaran Warga Baru</h4>
                <p class="text-muted small mb-0">Pastikan NIK yang diinput sesuai dengan KTP asli.</p>
            </div>
            <a href="{{ route('penduduk.index') }}" class="btn btn-light border shadow-sm rounded-pill px-4 fw-600">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm p-2" style="border-radius: 24px; background: rgba(255, 255, 255, 0.9);">
            <div class="card-body p-4">
                <form action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase text-secondary" style="letter-spacing: 1px;">NIK (Nomor Induk Kependudukan)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-4"><i class="bi bi-card-heading text-primary"></i></span>
                                <input type="text" name="nik" class="form-control border-start-0 rounded-end-4 py-3 @error('nik') is-invalid @enderror" 
                                       placeholder="Contoh: 127101XXXXXXXXXX" value="{{ old('nik') }}" required>
                            </div>
                            @error('nik') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase text-secondary" style="letter-spacing: 1px;">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-4"><i class="bi bi-person-fill text-primary"></i></span>
                                <input type="text" name="nama" class="form-control border-start-0 rounded-end-4 py-3" 
                                       placeholder="Masukkan nama sesuai identitas" value="{{ old('nama') }}" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase text-secondary" style="letter-spacing: 1px;">Alamat Domisili</label>
                            <textarea name="alamat" class="form-control rounded-4 py-3" rows="3" 
                                      placeholder="Nama jalan, nomor rumah, RT/RW...">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="col-12 pt-3">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm">
                                    <i class="bi bi-check-circle-fill me-2"></i> Daftarkan Warga
                                </button>
                                <button type="reset" class="btn btn-outline-secondary px-4 py-3 rounded-pill">
                                    Reset Form
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>