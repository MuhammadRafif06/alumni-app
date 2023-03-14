<!doctype html>
<html lang="en">
  
@include ('layout.css')
  <body>
    <div class="container-fluid m mt-4">
    <h1>Data Alumni</h1>
    <div class="col-md-12">
        @if (session('berhasil'))
        <div class="alert alert-succes">
            {{ session('berhasil')}}
        </div>
        @endif

        @if (session('gagal'))
        <div class="alert alert-succes">
            {{ session('gagal')}}
        </div>
        @endif
    </div>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
            create
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Data Siswa</h5>
            </div>
            <div class="modal-body">  
                <form method="post" action="{{ route('siswa.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                            <label>Name</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="please insert your name.." required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                 </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                        <label>NIK</label>
                    <input type="number" name="nik" class="form-control  @error('nik') is-invalid @enderror"" placeholder="please insert your nik" required/>
                    @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <div class="col-md-6 mt-2">
                 <div class="form-group">
                        <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control  @error('jurusan') is-invalid @enderror" placeholder="please insert your department" required/>
                    @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <div class="col-md-6 mt-2">
             <div class="form-group">
                    <label class="form-label">Genders</label>
                    <select name="id_jenkel" class="form-select">
                    <option value="selected disabled">-- pilih jenis kelamin--</option>
                        @foreach ($genders as $gender)
                        <option value="{{ $gender ->id}}">{{ $gender->jenkel }}</option>
                        @endforeach
                    </select>
                    @error('id_jenkel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <div class="md-6 mt-2">
                 <div class="form-group">
                        <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control  @error('angkatan') is-invalid @enderror" placeholder="please insert your gen" required/>
                    @error('angkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <div class="md-6 mt-2">
                 <div class="form-group">
                        <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control  @error('tgl_lahir') is-invalid @enderror" placeholder="please insert your gen" required/>
                    @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea rows="5" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" placeholder="please insert your address" required></textarea>
                @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
            </div>
        </div> <!--penutup row-->
        <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
    </div>
    </div>
        </div>
            </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        ?>
                @if (count($siswas) > 0)
                    @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nik }}</td>
                        <td>{{ $siswa->tgl_lahir }}</td>
                        <td>{{ $siswa->jurusan }}</td>
                        <td>{{ $siswa->angkatan }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td class="text-center">
                        <button data-href="{{ route('siswa.delete', $siswa->id) }}" type="submit" class="btn btn-danger btn-small deleteSiswa">hapus</button>
                        </td>
                    </tr>
                    @endforeach
                   
                @else
                    <tr>
                        <td colspan="7" style="text-align:center">tidak ada data</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="text-center">
                    {{ $siswas->links()}}
                    </div>
        </div>
    </div>
    @include ('layout.js')
  </body>
</html>