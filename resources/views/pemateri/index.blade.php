@extends('template')

@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pemateri</h4>
            <!-- Tombol untuk memunculkan modal tambah -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPemateriModal">
                Create Pemateri Baru
            </button>

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemateris as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->gender }}</td>
                            <td>{{ $dt->pendidikan }}</td>
                            <td>{{ $dt->pekerjaan }}</td>
                            <td>
                                <!-- Tombol Edit dengan data-bs-target ke modal edit -->
                                <button 
                                    type="button" 
                                    class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editPemateriModal{{ $dt->id }}">
                                    Edit
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('pemateri.destroy', $dt->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Pemateri untuk setiap data -->
                        <div class="modal fade" id="editPemateriModal{{ $dt->id }}" tabindex="-1" aria-labelledby="editPemateriModalLabel{{ $dt->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPemateriModalLabel{{ $dt->id }}">Edit Pemateri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pemateri.update', $dt->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Input Nama -->
                                            <div class="form-group mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input 
                                                    type="text" 
                                                    name="nama" 
                                                    class="form-control" 
                                                    value="{{ $dt->nama }}" 
                                                    required>
                                            </div>

                                            <!-- Dropdown Gender -->
                                            <div class="form-group mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select name="gender" class="form-select" required>
                                                    <option value="Laki_laki" {{ $dt->gender == 'Laki_laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ $dt->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>

                                            <!-- Input Pendidikan -->
                                            <div class="form-group mb-3">
                                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                                <input 
                                                    type="text" 
                                                    name="pendidikan" 
                                                    class="form-control" 
                                                    value="{{ $dt->pendidikan }}" 
                                                    required>
                                            </div>

                                            <!-- Input Pekerjaan -->
                                            <div class="form-group mb-3">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <input 
                                                    type="text" 
                                                    name="pekerjaan" 
                                                    class="form-control" 
                                                    value="{{ $dt->pekerjaan }}" 
                                                    required>
                                            </div>
                                        </div>

                                        <!-- Tombol Aksi -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pemateri -->
<div class="modal fade" id="addPemateriModal" tabindex="-1" aria-labelledby="addPemateriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPemateriModalLabel">Tambah Pemateri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pemateri.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Input Nama -->
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input 
                            type="text" 
                            name="nama" 
                            class="form-control" 
                            placeholder="Masukkan nama lengkap" 
                            required>
                    </div>

                    <!-- Dropdown Gender -->
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled selected>Pilih gender</option>
                            <option value="Laki_laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Input Pendidikan -->
                    <div class="form-group mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input 
                            type="text" 
                            name="pendidikan" 
                            class="form-control" 
                            placeholder="Masukkan tingkat pendidikan" 
                            required>
                    </div>

                    <!-- Input Pekerjaan -->
                    <div class="form-group mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input 
                            type="text" 
                            name="pekerjaan" 
                            class="form-control" 
                            placeholder="Masukkan pekerjaan" 
                            required>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
