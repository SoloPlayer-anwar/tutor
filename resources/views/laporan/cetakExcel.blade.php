<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pendidikan</th>
            <th>Umur</th>
            <th>Pekerjaan</th>
            <th>Phone</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cetak_excel as $row )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->alamat}}</td>
            <td>{{$row->pendidikan}}</td>
            <td>{{$row->umur}}</td>
            <td>{{$row->pekerjaan}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->tanggal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>








