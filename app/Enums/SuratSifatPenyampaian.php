<?php

namespace App\Enums;

enum SuratSifatPenyampaian: string
{
    case UMUM = 'Umum';
    case KILAT = 'Kilat';
    case TERCATAT = 'Tercatat';
}