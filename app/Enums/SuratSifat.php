<?php

namespace App\Enums;

enum SuratSifat: string
{
    case BIASA = 'Biasa';
    case SEGERA = 'Segera';
    case RAHASIA = 'Rahasia';
    case PENTING = 'Penting';
}