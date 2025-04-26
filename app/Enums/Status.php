<?php

namespace App\Enums;

enum Status: string
{
    case DIAJUKAN = 'diajukan';
    case DIPROSES = 'diproses';
    case SELESAI = 'selesai';
    case DITOLAK = 'ditolak';
}