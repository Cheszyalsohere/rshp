<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>No Wa</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemilik as $index => $isi_data)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $isi_data->user->nama }}</td>
            <td>{{ $isi_data->no_wa }}</td>
            <td>{{ $isi_data->alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>