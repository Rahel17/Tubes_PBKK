@extends('template')

@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title">Daftar Webinar</h4>
                <!-- Tombol Create -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createWebinarModal">
                    Tambah Webinar
                </button>
            </div>
            
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemateri</th>
                            <th>Judul Webinar</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($webinars as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->pemateri->nama }}</td>
                            <td>{{ $dt->judul }}</td>
                            <td>{{ $dt->deskripsi }}</td>
                            <td>{{ $dt->lokasi }}</td>
                            <td>{{ $dt->tanggal }}</td>
                            <td>Rp {{ number_format($dt->biaya, 0, ',', '.') }}</td>
                            <td>{{ $dt->status }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button 
                                    type="button" 
                                    class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editWebinarModal{{ $dt->id }}">
                                    Edit
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('webinar.destroy', $dt->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Webinar -->
                        <div class="modal fade" id="editWebinarModal{{ $dt->id }}" tabindex="-1" aria-labelledby="editWebinarModalLabel{{ $dt->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('webinar.update', $dt->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editWebinarModalLabel{{ $dt->id }}">Edit Webinar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="pemateri_id">Pemateri</label>
                                                <select name="pemateri_id" class="form-control" required>
                                                    @foreach ($pemateris as $pemateri)
                                                    <option value="{{ $pemateri->id }}" {{ $pemateri->id == $dt->pemateri_id ? 'selected' : '' }}>{{ $pemateri->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Judul Webinar</label>
                                                <input type="text" name="judul" class="form-control" value="{{ $dt->judul }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $dt->deskripsi }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" value="{{ $dt->lokasi }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" value="{{ $dt->tanggal }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="biaya">Biaya</label>
                                                <input type="number" name="biaya" class="form-control" value="{{ $dt->biaya }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="akan_datang" {{ $dt->status == 'akan_datang' ? 'selected' : '' }}>Akan datang</option>
                                                    <option value="selesai" {{ $dt->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </div>
                                        </div>
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

<!-- Modal Tambah Webinar -->
<div class="modal fade" id="createWebinarModal" tabindex="-1" aria-labelledby="createWebinarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('webinar.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createWebinarModalLabel">Tambah Webinar Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pemateri_id">Pemateri</label>
                        <select name="pemateri_id" id="pemateri_id" class="form-control" required>
                            <option value="" disabled selected>Pilih Pemateri</option>
                            @foreach ($pemateris as $pemateri)
                            <option value="{{ $pemateri->id }}">{{ $pemateri->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Webinar</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="number" name="biaya" id="biaya" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="akan_datang">Akan datang</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
