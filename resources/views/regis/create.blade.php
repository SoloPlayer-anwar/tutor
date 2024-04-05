<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    video {
      width: 50%;
      height: auto;
      border-radius: 8px;
      max-width: auto; /* Lebar maksimum video */
      max-height: auto; /* Tinggi maksimum video */
      /* Margin atas 10px */
    }

    /* Menetapkan posisi kamera secara responsif */
    .video-container {
      display: flex;
      justify-content: center;
      align-items: center;
      /* Untuk membuat kamera menempati tinggi layar sepenuhnya */
    }

    /* Mengatur margin bawah untuk tombol capture */
    #captureButton {
      /* Margin bawah 10px */
      margin-top: 10px;
      width: 80%;
    }
  </style>
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

    <div class="card">
        <div class="card-header">
          Aktifkan Kamera
        </div>
        <div class="card-body text-center">
          <button id="activeButton" class="btn btn-primary">Aktifkan Kamera</button>
          <!-- Video ditempatkan di bawah tombol capture -->
          <div id="videoContainer" class="video-container d-none">
            <video id="videoElement"></video>
          </div>
          <button id="captureButton" class="btn btn-success d-none">Capture</button>
          <br>
          <br>
          <img id="capturedImage" src="" alt="Captured Image" class="d-none" width="200px;" height="200px;">
        </div>
      </div>

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



    <!-- JavaScript untuk mengaktifkan kamera -->

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      var videoElement = document.getElementById('videoElement');
      var videoContainer = document.getElementById('videoContainer');
      var activeButton = document.getElementById('activeButton');
      var captureButton = document.getElementById('captureButton');
      var capturedImage = document.getElementById('capturedImage');

      activeButton.addEventListener('click', function() {
        navigator.mediaDevices.getUserMedia({ video: true })
          .then(function(stream) {
            videoElement.srcObject = stream;
            videoElement.play(); // Memulai video
            videoContainer.classList.remove('d-none');
            activeButton.classList.add('d-none');
            captureButton.classList.remove('d-none');
          })
          .catch(function(error) {
            console.log("Error accessing camera: ", error);
            alert("Error accessing camera. Please make sure your camera is connected and try again.");
          });
      });

      function dataURItoBlob(dataURI) {
        const binaryString = window.atob(dataURI.split(',')[1]);
        const array = [];
        for (let i = 0; i < binaryString.length; i++) {
          array.push(binaryString.charCodeAt(i));
        }
        return new Blob([new Uint8Array(array)], { type: 'image/png' });
      }

      captureButton.addEventListener('click', function() {
        var canvas = document.createElement('canvas');
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);

        // Mengonversi gambar menjadi base64 data URI
        const dataURI = canvas.toDataURL('image/png');

        // Mengonversi data URI menjadi file binary
        const blob = dataURItoBlob(dataURI);

        // Membuat objek File dari blob
        const file = new File([blob], 'capture.png', { type: 'image/png' });

        // Menetapkan file ke input file
        const photoInput = document.getElementById('photo');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        photoInput.files = dataTransfer.files;

        // Menampilkan gambar yang diambil pada halaman
        capturedImage.src = dataURI;
        capturedImage.classList.remove('d-none');
      });

      const photoInput = document.getElementById('photo');
      photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        // Lakukan tindakan yang diperlukan dengan file yang diunggah
        console.log('File yang diunggah:', file);
      });
    });
  </script>

</body>
</html>
