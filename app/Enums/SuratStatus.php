<?php

namespace App\Enums;

enum SuratStatus: string
{
    case DRAFT = 'Draft';
    case TERKIRIM = 'Terkirim';
    case DITERIMA = 'Diterima';
    case DIBACA = 'Dibaca';
    case DIPROSES = 'Diproses';
    case SELESAI = 'Selesai';
    case DITOLAK = 'Ditolak';
}