<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Revisi Arsip Persuratan Terpadu</h4>
                <p class="text-muted small mb-0">Lakukan koreksi pada relasi data: Warga, Kategori, dan Administrator.</p>
            </div>
            <a href="{{ route('surat.index') }}" class="btn btn-link text-decoration-none text-secondary fw-600">
                <i class="bi bi-x-circle me-2"></i> Batalkan Revisi
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-elegant border-0 shadow-lg p-2" style="background: rgba(255, 255, 255, 0.9); border-radius: 28px;">
                    <div class="card-body p-5">
                        <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-12 mb-3">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-2" style="letter-spacing: 1.5px;">Reference Number (Locked)</label>
                                    <div class="p-3 rounded-4 bg-light border d-flex align-items-center">
                                        <i class="bi bi-hash text-primary me-2 fs-5"></i>
                                        <span class="fw-bold text-dark">{{ $surat->nomor_surat ?? 'REG-AUTO-GEN' }}</span>
                                    </div>
                                    <small class="text-muted mt-2 d-block">Nomor surat permanen untuk integritas audit database.</small>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Identitas Pemohon</label>
                                    <div class="input-group border-bottom pb-2">
                                        <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                            <i class="bi bi-person-check-fill fs-5"></i>
                                        </span>
                                        <select name="penduduk_id" class="form-select bg-transparent border-0 fw-600 fs-5" required>
                                            @foreach($penduduks as $p)
                                                <option value="{{ $p->id }}" {{ $surat->penduduk_id == $p->id ? 'selected' : '' }}>
                                                    {{ $p->nama }} — {{ $p->nik }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-800 text-secondary text-uppercase mb-3" style="letter-spacing: 1.5px;">Klasifikasi Surat (Master)</label>
                                    <div class="input-group border-bottom pb-2">
                                        <span class="input-group-text bg-transparent border-0 ps-0 text-primary">
                                            <i class="bi bi-tags-fill fs-5"></i>
                                        </span>
                                        <select name="jenis_surat_id" class="form-select bg-transparent border-0 fw-600 fs-5" required>
                                            @foreach($jenisSurats as $js)
                                                <option value="{{ $js->id }}" {{ $surat->jenis_surat_id == $js->id ? 'selected' : '' }}>
                                                    {{ $js->nama_jenis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 pt-4">
                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-lg flex-grow-1" 
                                                style="background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%); border: none;">
                                            <i class="bi bi-check2-all me-2"></i> Sinkronisasi & Perbarui Arsip
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary px-4 py-3 rounded-pill">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-muted small">
                        Diterbitkan oleh Admin: <span class="fw-bold text-dark">{{ $surat->user->name ?? Auth::user()->name }}</span> | 
                        Relasi ID: <span class="badge bg-secondary rounded-pill">{{ $surat->user_id ?? 'System' }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>