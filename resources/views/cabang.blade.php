<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manajemen Cabang</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container py-5">
        <div class="mb-4">
            <a href="/admin/dashboard"
            class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 
                    px-4 py-2 rounded-lg border border-gray-200 
                    hover:bg-gray-100 hover:text-gray-800 
                    transition-all duration-200">
                Kembali
            </a>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-0"><i class="bi bi-building"></i> Manajemen Cabang</h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCabang" onclick="openCreateModal()">
                    <i class="bi bi-plus-circle"></i> Tambah Cabang
                </button>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(isset($success) && $success && isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(isset($success) && !$success && isset($message))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">Nama Cabang</th>
                                <th width="45%">Alamat</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data ?? [] as $index => $cabang)
                            <tr>
                                <td>{{ $cabang->id }}</td>
                                <td><strong>{{ $cabang->cabang }}</strong></td>
                                <td>{{ $cabang->alamat }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning" onclick="openEditModal({{ $cabang->id }}, '{{ addslashes($cabang->cabang) }}', '{{ addslashes($cabang->alamat) }}')" data-bs-toggle="modal" data-bs-target="#modalCabang">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $cabang->id }}, '{{ addslashes($cabang->cabang) }}')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    Belum ada data cabang
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create/Update -->
    <div class="modal fade" id="modalCabang" tabindex="-1" aria-labelledby="modalCabangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formCabang" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="methodField" value="POST">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCabangLabel">Tambah Cabang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="cabang" class="form-label">Nama Cabang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('cabang') is-invalid @enderror" 
                                   id="cabang" name="cabang" required maxlength="255" 
                                   placeholder="Contoh: Cabang Surabaya">
                            @error('cabang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" name="alamat" rows="3" required maxlength="255"
                                      placeholder="Masukkan alamat lengkap cabang"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Delete (Hidden) -->
    <form id="formDelete" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openCreateModal() {
            document.getElementById('modalCabangLabel').textContent = 'Tambah Cabang';
            document.getElementById('formCabang').action = '/cabang';
            document.getElementById('methodField').value = 'POST';
            document.getElementById('cabang').value = '';
            document.getElementById('alamat').value = '';
            
            // Remove validation classes
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        function openEditModal(id, namaCabang, alamat) {
            document.getElementById('modalCabangLabel').textContent = 'Edit Cabang';
            document.getElementById('formCabang').action = '/cabang/' + id;
            document.getElementById('methodField').value = 'PUT';
            document.getElementById('cabang').value = namaCabang;
            document.getElementById('alamat').value = alamat;
            
            // Remove validation classes
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        function confirmDelete(id, namaCabang) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Cabang <strong>${namaCabang}</strong> akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="bi bi-trash"></i> Ya, Hapus',
                cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('formDelete');
                    form.action = `/cabang/${id}`;
                    form.submit();
                }
            });
        }

        // Auto dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>