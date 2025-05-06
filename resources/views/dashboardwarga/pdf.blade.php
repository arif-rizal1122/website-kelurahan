@extends('layouts.master-without-nav')
@section('title') Cetak Pengajuan #{{ $pengajuan->id }} @endsection
@section('css')
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 1in;
        }
        h2 {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 0.2in;
        }
        h3 {
            text-align: center;
            font-size: 12pt;
            font-style: italic;
            margin-bottom: 0.3in;
        }
        .section {
            margin-bottom: 0.3in;
        }
        .label-word {
            font-weight: bold;
            width: 150px;
            vertical-align: top;
            display: inline-block;
        }
        .colon {
            width: 20px;
            text-align: center;
            vertical-align: top;
            display: inline-block;
        }
        .value {
            display: inline-block;
            vertical-align: top;
        }
        .indented {
            margin-left: 0.5in;
        }
        .signature {
            text-align: right;
            margin-top: 0.5in;
        }
        .underline {
            text-decoration: underline;
        }
        .header-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .header-line {
            border-top: 1px solid black;
            margin-top: 2px;
            margin-bottom: 2px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="header-container">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 80px; height: 80px; margin-bottom: 10px;">
            @endif
            <p style="font-weight: bold; font-size: 14pt; text-transform: uppercase; margin-bottom: 5px;">PEMERINTAH {{ strtoupper($config->nama_kabupaten ?? 'KABUPATEN') }}</p>
            <p style="font-weight: bold; font-size: 14pt; text-transform: uppercase; margin-bottom: 5px;">KECAMATAN {{ strtoupper($config->nama_kecamatan ?? 'KECAMATAN') }}</p>
            <p style="font-weight: bold; font-size: 16pt; text-transform: uppercase; margin-bottom: 5px;">DESA {{ strtoupper($config->nama_kelurahan ?? 'DESA') }}</p>
            <p style="font-size: 11pt; margin-bottom: 10px;">Jl. Raya {{ $config->nama_kelurahan ?? 'Desa' }} Km {{ $config->km_jalan ?? '10' }} {{ $config->nama_dusun ?? 'Kerandangan' }} Kode Pos : {{ $config->kode_pos ?? '83355' }}</p>
            <div class="header-line" style="border-top-width: 3px;"></div>
            <div class="header-line"></div>
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
            <h2><u>{{ strtoupper($pengajuan->jenisSurat->nama ?? 'SURAT KETERANGAN') }}</u></h2>
            @if($pengajuan->id)
                <h3>Nomor: {{ $pengajuan->id }}/{{ now()->format('Y') }}/{{ $pengajuan->jenisSurat->code ?? '...' }}</h3>
            @endif
        </div>

        <div class="section">
            <p>Yang bertanda tangan di bawah ini:</p>
            <p><span class="label-word">Nama</span><span class="colon">:</span><span class="value">{{ Auth::user()->name ?? '-' }}</span></p>
            <p><span class="label-word">Jabatan</span><span class="colon">:</span><span class="value">{{ Auth::user()->jabatan ?? 'Petugas Kelurahan' }}</span></p>
            <p><span class="label-word">Alamat</span><span class="colon">:</span><span class="value">{{ $config->alamat_kantor ?? '-' }}</span></p>
        </div>

        <div class="section">
            <p>Menerangkan dengan sesungguhnya bahwa:</p>
            <p><span class="label-word">Nama</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->nama ?? '-' }}</span></p>
            <p><span class="label-word">NIK</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->nik ?? '-' }}</span></p>
            @if($pengajuan->warga->tempat_lahir || $pengajuan->warga->tanggal_lahir)
                <p><span class="label-word">Tempat/Tgl. Lahir</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->tempat_lahir ?? '-' }}, {{ $pengajuan->warga->tanggal_lahir ? \Carbon\Carbon::parse($pengajuan->warga->tanggal_lahir)->format('d F Y') : '-' }}</span></p>
            @endif
            <p><span class="label-word">Jenis Kelamin</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->jenis_kelamin ?? '-' }}</span></p>
            <p><span class="label-word">Agama</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->agama ?? '-' }}</span></p>
            <p><span class="label-word">Alamat</span><span class="colon">:</span><span class="value">{{ $pengajuan->warga->alamat ?? '-' }}</span></p>
            @if ($pengajuan->jenisSurat->has_template && $pengajuan->jenisSurat->template_fields)
                @php
                    $templateFields = json_decode($pengajuan->jenisSurat->template_fields, true);
                @endphp
                @if (is_array($templateFields))
                    @foreach ($templateFields as $field => $label)
                        @if(isset($pengajuan->data[$field]))
                            <p><span class="label-word">{{ $label }}</span><span class="colon">:</span><span class="value">{{ $pengajuan->data[$field] ?? '-' }}</span></p>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>


        <div class="section">
            @if (!empty($pengajuan->jenisSurat->template_surat))
                @php
                    $templateText = nl2br(e($pengajuan->jenisSurat->template_surat));
                    $templateText = str_replace("\n", "</p><p>", $templateText);
                @endphp
                <p>{{ $templateText }}</p>
            @else
                <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk dapat dipergunakan sebagaimana mestinya.</p>
            @endif
        </div>

        <div class="signature">
            <p>{{ $config->nama_kelurahan ?? 'Kelurahan' }}, {{ now()->format('d F Y') }}</p>
            <p>{{ $config->jabatan_penandatangan ?? 'Petugas yang Berwenang' }},</p>
            <br><br><br>
            <p class="underline">{{ $pengajuan->user->name ?? '-' }}</p>
            @if($pengajuan->user->nip)
                <p>NIP. {{ $pengajuan->user->nip }}</p>
            @endif
        </div>

    </div>
@endsection
@section('script')
    {{-- Jika ada script khusus untuk cetak --}}
@endsection