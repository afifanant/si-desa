<x-app-layout>
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <h4 class="fw-800 text-dark mb-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">Registry Persuratan Digital</h4>
                <p class="text-muted small mb-0">Manajemen arsip terintegrasi: Penduduk, Master Dokumen, dan Administrator.</p>
            </div>
            <a href="{{ route('surat.create') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow-sm d-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i> Terbitkan Surat
            </a>
        </div>

        <div class="card card-elegant border-0 shadow-sm overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: rgba(15, 23, 42, 0.02);">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">No. Registrasi</th>
                            <th class="py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Identitas Pemohon</th>
                            <th class="py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Klasifikasi Surat</th>
                            <th class="py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Petugas Admin</th>
                            <th class="py-3 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Timestamp</th>
                            <th class="py-3 text-end pe-4 text-uppercase small fw-800 text-secondary" style="letter-spacing: 1px;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surats as $s)
                        <tr style="transition: 0.3s;">
                            <td class="ps-4 py-4">
                                <span class="fw-bold text-primary" style="font-family: 'Inter', sans-serif;">
                                    {{ $s->nomor_surat ?? 'REG-'.str_pad($s->id, 5, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-blue-soft rounded-3 p-2 me-3" style="background: rgba(56, 189, 248, 0.1);">
                                        <i class="bi bi-person-badge text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark">{{ $s->penduduk->nama ?? 'Data Terhapus' }}</h6>
                                        <small class="text-muted small">{{ $s->penduduk->nik ?? 'N/A' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-white text-dark border rounded-pill px-3 py-2 fw-600 shadow-sm" style="font-size: 0.75rem;">
                                    <i class="bi bi-file-earmark-text text-primary me-1"></i> 
                                    {{ $s->jenisSurat->nama_jenis ?? 'Kategori Umum' }} 
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-1 me-2 border">
                                        <i class="bi bi-shield-check text-success small"></i>
                                    </div>
                                    <span class="small fw-600 text-secondary">{{ $s->user->name ?? 'System' }}</span>
                                </div>
                            </td>
                            <td class="text-muted small fw-500">
                                {{ $s->created_at->translatedFormat('d F Y') }}<br>
                                <span class="opacity-50" style="font-size: 0.7rem;">{{ $s->created_at->format('H:i') }} WIB</span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('surat.cetak', $s->id) }}" class="btn btn-sm btn-light border rounded-circle p-2" title="Cetak Surat Resmi">
                                        <i class="bi bi-printer text-primary"></i>
                                    </a>

                                    <a href="{{ route('surat.edit', $s->id) }}" class="btn btn-sm btn-light border rounded-circle p-2" title="Edit Data">
                                        <i class="bi bi-pencil-square text-warning"></i>
                                    </a>
                                    <form action="{{ route('surat.destroy', $s->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border rounded-circle p-2" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?')" title="Hapus Arsip">
                                            <i class="bi bi-trash3 text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-folder2-open display-4 text-muted opacity-25"></i>
                                <p class="mt-3 text-muted fw-500">Belum ada arsip surat yang diterbitkan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>