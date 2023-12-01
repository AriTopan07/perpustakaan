<table>
    <tr>
        <td><b>Data Nilai Siswa Periode {{ $periode->tahun_ajaran }}</b></td>
    </tr>
</table>
<table border="2">
    <thead>
        <tr>
            <th style="text-align: center; background-color: #40c668;"><b>Nama Siswa</b></th>
            @foreach ($kriteria as $kriteriaItem)
            <th style="text-align: center; background-color: #40c668;"><b>{{ $kriteriaItem->name }}</b></th>
            @endforeach
            <th rowspan="2" style="text-align: center; vertical-align: middle;  background-color: #40c668;"><b>Total Nilai</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #40c668;"><b>Ranking</b></th>
        </tr>
        <tr>
            <th style="text-align: center; background-color: #40c668;"><b>Bobot</b></th>
            @foreach ($kriteria as $kriteriaItem)
                <th style="text-align: center; background-color: #40c668;"><b>{{ $kriteriaItem->bobot }}</b></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($siswa->where('periode_id', $periode->id)->sortByDesc(function($siswa) use ($ranking) { return $ranking[$siswa->name] ?? 0; }) as $item)
            <tr>
                <td>{{ $item->name }}</td>
                @if (isset($ranking[$item->name]))
                    @foreach ($ranking[$item->name] as $value)
                        <td>
                            <span class="fw-bold">{{ number_format($value, 2) }}</span>
                        </td>
                    @endforeach
                @endif
                <td class="text-center align-middle">
                    <span class="fw-bold rank">{{ $no++ }}</span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100%">Tidak ada data siswa yang tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>