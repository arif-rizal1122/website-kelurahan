<?php

namespace App\Enums;

enum SuratMediaPenerimaan: string
{
    case FISIK_KURIR = 'Fisik (Kurir)';
    case EMAIL = 'Email';
    case FAX = 'Fax';
}