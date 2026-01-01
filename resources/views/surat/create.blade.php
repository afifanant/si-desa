<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Penerbitan Dokumen Terpadu</h4>
                <p class="text-muted small mb-0">Sinkronisasi 4 Tabel: Admin, Warga, Kategori, dan Arsip Surat.</p>
            </div>
            <a href="{{ route('surat.index') }}" class="btn btn-link text-decoration-none text-secondary fw-600">
                <i class="bi bi-x-lg me-2"></i> Batalkan Sesi
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-elegant border-0 shadow-lg p-2" style="background: rgba(255, 255, 255, 0.9); border-radius: 28px;">
                    <div class="card-body p-5">
                        <form action="{{ route('surat.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-5">
                                <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Identitas Pemohon (Warga)</label>
                                <div class="input-group border-bottom pb-2">
                                    <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                        <i class="bi bi-person-check fs-4"></i>
                                    </span>
                                    <select name="penduduk_id" class="form-select bg-transparent border-0 fw-600 fs-5 custom-select" required>
                                        <option value="" disabled selected>Pilih Warga Terdaftar</option>
                                        @foreach($penduduks as $p)
                                            <option value="{{ $p->id }}">{{ $p->nik }} — {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-text mt-2" style="font-size: 0.75rem;">Data primer dari Tabel Penduduks.</div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Klasifikasi Surat (Master)</label>
                                <div class="input-group border-bottom pb-2">
                                    <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                        <i class="bi bi-tags fs-4"></i>
                                    </span>
                                    <select name="jenis_surat_id" class="form-select bg-transparent border-0 fw-600 fs-5 custom-select" required>
                                        <option value="" disabled selected>Pilih Kategori Surat</option>
                                        @foreach($jenisSurats as $js)
                                            <option value="{{ $js->id }}">{{ $js->nama_jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-text mt-2" style="font-size: 0.75rem;">Data referensi dari Tabel Jenis_Surats.</div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-lg" 
                                        style="background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%); border: none;">
                                    <i class="bi bi-printer-fill me-2"></i> Proses & Terbitkan Sekarang
                                </button>
                                <p class="text-center text-muted small mt-3 mb-0">
                                    Petugas: <strong>{{ Auth::user()->name }}</strong> (Relasi User ID: {{ Auth::id() }})
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>