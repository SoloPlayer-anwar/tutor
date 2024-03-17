<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col text-left">
        <a href="{{route('/')}}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
    <h2 class="text-center mb-4">FAKTA INTEGRITAS</h2>
    @include('alert.failed')
    <form method="POST" action="{{route('regis.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{old('nama')}}" >
        <span class="error invalid-feedback">{{$errors->first('nama')}}</span>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{old('alamat')}}" >
        <span class="error invalid-feedback">{{$errors->first('alamat')}}</span>
      </div>
      <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan" value="{{old('pendidikan')}}" >
        <span class="error invalid-feedback">{{$errors->first('pendidikan')}}</span>
      </div>
      <div class="form-group">
        <label for="umur">Umur</label>
        <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukkan Umur" value="{{old('umur')}}" >
        <span class="error invalid-feedback">{{$errors->first('umur')}}</span>
      </div>
      <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{old('pekerjaan')}}" >
        <span class="error invalid-feedback">{{$errors->first('pekerjaan')}}</span>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukkan No Handphone" value="{{old('phone')}}" >
        <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" name="tanggal" id="tanggal">
      </div>

      <div class="form-group">
        <label for="photo"><a href="{{route('camera')}}" target="blank" class="btn btn-sm btn-secondary">Klik disini untuk mengambil photo</a></label>
        <input type="file" class="form-control-file {{$errors->first('photo') ? 'is-invalid' : ''}}" required name="photo" id="photo">
        <span class="error invalid-feedback"></span>
      </div>

      <button type="button" onclick="confirmSubmission()"  class="btn btn-primary">Simpan</button>
    </form>
  </div>

  <script>
    // Ambil waktu saat ini
    var date = new Date();

    // Dapatkan nilai tanggal, bulan, dan tahun
    var day = ('0' + date.getDate()).slice(-2); // Tambahkan leading zero jika diperlukan
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Tambahkan leading zero jika diperlukan
    var year = date.getFullYear();

    // Gabungkan nilai tanggal, bulan, dan tahun dengan tanda "/"
    var formattedDate = year + '-' + month + '-' + day;

    // Set nilai input dengan waktu yang diformat
    document.getElementById('tanggal').value = formattedDate;


    // Tampilkan konfirmasi
    function confirmSubmission() {
        var isConfirmed = confirm(formattedDate + " Saya Berjanji tidak akan memberi sesuatu apapun baik berupa barang uang atau pun dalam bentuk lain nya.");

        if (isConfirmed) {
            // Jika dikonfirmasi, kirim form
            document.querySelector('form').submit();
        } else {
            // Jika tidak dikonfirmasi, batalkan aksi
            return false;
        }
    }

    </script>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
