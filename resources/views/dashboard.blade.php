<x-app-layout>
    <div class="container-fluid px-0">
        <div class="mb-5">
            <h4 class="fw-800 text-dark mb-1">Pusat Kendali Digital</h4>
            <p class="text-muted small">Ringkasan operasional sistem kependudukan terintegrasi.</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card card-elegant border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary text-white rounded-4 p-3 shadow-sm">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-800 mb-0">{{ $total_penduduk }}</h3>
                            <small class="text-muted fw-600">Total Warga</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-elegant border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success text-white rounded-4 p-3 shadow-sm">
                            <i class="bi bi-envelope-paper-heart fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-800 mb-0">{{ $total_surat }}</h3>
                            <small class="text-muted fw-600">Surat Terbit</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-elegant border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-info text-white rounded-4 p-3 shadow-sm">
                            <i class="bi bi-tags-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-800 mb-0">{{ $total_kategori }}</h3>
                            <small class="text-muted fw-600">Kategori Surat</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-elegant border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-dark text-white rounded-4 p-3 shadow-sm">
                            <i class="bi bi-shield-lock-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-800 mb-0">{{ $total_admin }}</h3>
                            <small class="text-muted fw-600">Petugas Aktif</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-elegant border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-white py-3 border-0">
                <h6 class="fw-800 mb-0"><i class="bi bi-clock-history me-2"></i>Aktivitas Terakhir</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 small fw-800">Warga</th>
                            <th class="py-3 small fw-800">Jenis Surat</th>
                            <th class="py-3 small fw-800">Waktu Penerbitan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_surats as $rs)
                        <tr>
                            <td class="ps-4 fw-bold text-dark">{{ $rs->penduduk->nama }}</td>
                            <td><span class="badge bg-light text-primary border rounded-pill">{{ $rs->jenisSurat->nama_jenis }}</span></td>
                            <td class="text-muted small">{{ $rs->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>