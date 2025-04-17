<?php

namespace App\Enums;

enum StatusKeadaan: string
{
    case Hidup = 'Hidup';
    case Mati = 'Mati';
    case Sehat = 'Sehat';
    case Sakit = 'Sakit';
}