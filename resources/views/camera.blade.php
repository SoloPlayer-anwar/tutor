<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aktifkan Kamera</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Menetapkan ukuran video */
    video {
      width: 100%;
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
<body class="bg-light">
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- JavaScript untuk mengaktifkan kamera -->
  <script>
    $(document).ready(function() {
      var videoElement = document.getElementById('videoElement');
      var videoContainer = document.getElementById('videoContainer');

      var activeButton = document.getElementById('activeButton');
      var captureButton = document.getElementById('captureButton');

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

      captureButton.addEventListener('click', function() {
        var canvas = document.createElement('canvas');
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);

        // Mengonversi gambar menjadi blob
        canvas.toBlob(function(blob) {
          // Membuat nama file dengan tanggal saat ini
          var today = new Date();
          var fileName = today.toISOString().slice(0,10) + '.png';

          // Membuat URL objek untuk blob
          var url = URL.createObjectURL(blob);

          // Membuat elemen <a> untuk men-download gambar
          var link = document.createElement('a');
          link.href = url;
          link.download = fileName;
          document.body.appendChild(link);
          link.click();

          // Membersihkan URL objek setelah selesai
          URL.revokeObjectURL(url);
        }, 'image/png');
      });
    });
  </script>
</body>
</html>
