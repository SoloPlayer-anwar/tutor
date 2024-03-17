<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf Cetak Peringkat Siswa</title>
    <style>
        .table-spacing td,
        .table-spacing th {
            padding: 4px; /* Ubah angka 10px sesuai dengan kebutuhan Anda */
        }
    </style>
    <style>
        .table-bordered td,
            .table-bordered th {
                border: 1px solid black;
            }
        </style>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        @page {
            size: A4;
            margin-left: 1.5cm;
            margin-right: 1.2cm;
        }
    </style>
    <!-- Konten halaman -->
    <div class="container-fluid">
        <div class="row">
            {{-- HEADER --}}
            <div class="col-lg-12">
                <table class="table table-sm table-borderless mx-auto" style="margin-left: 16px; margin-right: 16px;">
                    <tr>
                        <td width="10%">
                            <img src="{{asset('img/illustration/Hero Image.svg')}}" alt="" class="img img-fluid mr-6" width="70px;">
                        </td>
                        <td width="100%" class="text-center font-weight-bolder">
                            KEMENTERIAN AGAMA REPUBLIK INDONESIA
                            <br>
                            KANTOR KEMENTERIAN AGAMA KABUPATEN BANJAR
                            <br>
                           <span style="font-size: 14px">Alamat: Jl. A. Yani Km. 15,200 Kec. GambutKab. Banjar 70652 Telpon 0511-6746594</span>
                            <br>
                            <span style="font-size: 14px">Posel: https://mantiga_banjar@yahoo.com / https://mansmartmartapura@yahoo.co.id</span>
                            <br>
                           <span style="font-size: 14px">Website: http://man3banjar.sch.id</span>
                        </td>
                    </tr>

                </table>
                <div class="d-block" style="border-bottom: solid 3px black; margin-right: 7%"></div>
                <div class="text-center font-weight-bolder text-underline">
                    <u>
                        SURAT KETERANGAN PERINGKAT
                    </u>
                </div>

                <div class="text-center">
                    <span style="font-size: 14px">
                        Nomor: ....................................{{date('d/m/Y')}}
                    </span>
                </div>

            </div>
            <br>

            {{-- BODY --}}
            <div class="col-lg-12">
                <span style="font-size: 15px">Yang bertanda tangan dibawah ini, Kepala MAN 3 Banjar, Menerangkan dengan sesungguhnya bahwa :</span>
                <table class="table table-sm table-borderless mt-3 mb-3 table-spacing">
                    <tbody>
                        <tr class="mb-3">
                            <td>Nama Siswa</td>
                            <td>:</td>

                         </tr>

                         <tr class="mb-3">
                            <td>Kelas</td>
                            <td>:</td>

                         </tr>

                         <tr class="mb-3">
                            <td>Jurusan</td>
                            <td>:</td>

                         </tr>

                         <tr class="mb-3">
                            <td >Tempat Tanggal Lahir</td>
                            <td>:</td>

                         </tr>

                         <tr class="mb-3">
                            <td >Status Siswa</td>
                            <td>:</td>

                         </tr>

                    </tbody>
                </table>
                <hr>
                <span style="font-size: 16px" class="d-block mb-2">Adalah benar-benar siswa(i) MAN 3 Banjar dengan peringkat kelas sebagai berikut :</span>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cetakPdf as $item )
                            <tr>
                                <td>{{$item->nama}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <span class="d-block">Dengan bukti data yang ada pada kami, yaitu nilai raport yang bersangkutan Kelas X , XI , XII terlampir.</span>
                <span>Demikian surat keterangan ini diberikan, agar dapat di pergunakan sebagaimana mestinya</span>
            </div>
            <br>
            <br>
            <br>
            {{-- FOOTER --}}
            <div class="col-lg-12">
                <table class="table table-sm table-borderless">
                    <thead>
                        <tr>
                            <td width="60%">
                            </td>
                            <td width="60%" class="text-center">
                                Gambut, {{date('d-m-Y')}}
                                <br>
                                A.n Kepala,
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                Drs. Syamsudin, M.M
                                <br>
                                NIP. 19641024 199403 1 002
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
