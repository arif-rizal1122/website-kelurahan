<?php

namespace App\Enums;

enum SuratMediaPengiriman: string
{
    case FISIK_KURIR = 'Fisik (Kurir)';
    case EMAIL = 'Email';
    case FAX = 'Fax';
    case LANGSUNG = 'Langsung';
}