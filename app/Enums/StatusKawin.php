<?php

namespace App\Enums;

enum StatusKawin: string
{
    case Belum = 'Belum';
    case Sudah = 'Sudah';
    case Cerai = 'Cerai';
    case CeraiMati = 'Cerai_Mati';
}