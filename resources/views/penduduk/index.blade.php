<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Database Kependudukan</h4>
                <p class="text-muted small mb-0">Kelola informasi warga Desa secara real-time dan akurat.</p>
            </div>
            <a href="{{ route('penduduk.create') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow-sm d-flex align-items-center">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah Warga
            </a>
        </div>

        <div class="card card-elegant border-0 shadow-sm overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: rgba(56, 189, 248, 0.05);">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Identitas Warga</th>
                            <th class="py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Status</th>
                            <th class="py-3 text-end pe-4 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Manajemen Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $p)
                        <tr style="transition: 0.3s;">
                            <td class="ps-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; border: 1px solid #e2e8f0;">
                                        <i class="bi bi-person-vcard text-primary fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark">{{ $p->nama }}</h6>
                                        <small class="text-muted fw-500">NIK: {{ $p->nik }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold" style="font-size: 0.7rem;">
                                    Terverifikasi
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('penduduk.edit', $p->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('penduduk.destroy', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                            <i class="bi bi-trash3-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($data->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-database-exclamation fs-1 text-muted opacity-25"></i>
                <p class="mt-3 text-muted fw-500">Belum ada data warga terdaftar di sistem.</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>