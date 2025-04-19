<?php

namespace App\Enums;

enum Suku: string
{
    // Sumatra
    case ACEH = 'Aceh';
    case GAYO = 'Gayo';
    case ALAS = 'Alas';
    case TAMIANG = 'Tamiang';
    case SINGKIL = 'Singkil';
    case BATAK = 'Batak';
    case BATAK_TOBA = 'Batak Toba';
    case BATAK_KARO = 'Batak Karo';
    case BATAK_MANDAILING = 'Batak Mandailing';
    case BATAK_SIMALUNGUN = 'Batak Simalungun';
    case BATAK_PAKPAK = 'Batak Pakpak';
    case BATAK_ANGKOLA = 'Batak Angkola';
    case MINANGKABAU = 'Minangkabau';
    case MELAYU = 'Melayu';
    case MELAYU_RIAU = 'Melayu Riau';
    case MELAYU_JAMBI = 'Melayu Jambi';
    case MELAYU_SUMSEL = 'Melayu Sumatera Selatan';
    case NIAS = 'Nias';
    case MENTAWAI = 'Mentawai';
    case REJANG = 'Rejang';
    case LAMPUNG = 'Lampung';
    case LAMPUNG_PEMINGGIR = 'Lampung Peminggir';
    case LAMPUNG_PUBIAN = 'Lampung Pubian';
    case KUBU_ANAK_DALAM = 'Kubu/Anak Dalam';
    case ENGGANO = 'Enggano';
    case SIMEULUE = 'Simeulue';

    // Jawa
    case JAWA = 'Jawa';
    case JAWA_OSING = 'Jawa Osing';
    case JAWA_TENGGER = 'Jawa Tengger';
    case SUNDA = 'Sunda';
    case MADURA = 'Madura';
    case BETAWI = 'Betawi';
    case BADUY = 'Baduy';
    case SAMIN = 'Samin';
    case CIREBON = 'Cirebon';

    // Bali dan Nusa Tenggara
    case BALI = 'Bali';
    case SASAK = 'Sasak';
    case BIMA = 'Bima';
    case DOMPU = 'Dompu';
    case MANGGARAI = 'Manggarai';
    case SIKKA = 'Sikka';
    case ENDE = 'Ende';
    case NGADA = 'Ngada';
    case LIO = 'Lio';
    case TIMOR = 'Timor';
    case TIMOR_ATONI = 'Timor Atoni';
    case TIMOR_DAWAN = 'Timor Dawan';
    case TIMOR_HELONG = 'Timor Helong';
    case ROTE = 'Rote';
    case SAVU = 'Savu';
    case ALOR = 'Alor';
    case SUMBA = 'Sumba';
    case SUMBA_KODI = 'Sumba Kodi';
    case SUMBA_TIMUR = 'Sumba Timur';

    // Kalimantan
    case DAYAK = 'Dayak'; // Pengelompokan besar
    case IBAN = 'Iban'; // Contoh sub-suku Dayak
    case KENYAH = 'Kenyah'; // Contoh sub-suku Dayak
    case KAYAN = 'Kayan'; // Contoh sub-suku Dayak
    case MURUT = 'Murut'; // Contoh sub-suku Dayak
    case BANJAR = 'Banjar';
    case MELAYU_KALIMANTAN = 'Melayu Kalimantan';
    case KUTAI = 'Kutai';
    case BERAU = 'Berau';
    case PASIR = 'Pasir';

   // Sulawesi Selatan
   case BUGIS = 'Bugis';
   case MAKASSAR = 'Makassar';
   case TORAJA = 'Toraja';
   case MANDAR = 'Mandar';
   case LUWU = 'Luwu';
   case SEKO = 'Seko';
   case BENTONG = 'Bentong';
   case KONJO = 'Konjo';
   case BONERATE = 'Bonerate';
   case SELAYAR = 'Selayar';

   // Sulawesi Utara
   case MINAHASA = 'Minahasa'; // Pengelompokan besar
   case TONSEA = 'Tonsea';
   case TONTEMBOAN = 'Tontemboan';
   case TOULU = 'Tounlu';
   case TOUSIAN = 'Tonsawang';
   case LOLAK = 'Lolak';
   case BOLAANG_MONGONDOW = 'Bolaang Mongondow';
   case SANGIR = 'Sangir';
   case TALAUD = 'Talaud';
   case BENTENAN = 'Bentenan';

   // Sulawesi Tengah
   case KAILI = 'Kaili'; // Pengelompokan besar
   case PAMONA = 'Pamona';
   case POSO = 'Poso'; // Sering dikaitkan dengan Pamona
   case LORE = 'Lore';
   case BADA = 'Bada';
   case MAMASA = 'Masa'; // Sering dikaitkan dengan Toraja (Sulbar)
   case KULI = 'Kula';
   case BUNTA = 'Bunta';
   case BALAESANG = 'Balaesang';
   case TAJIO = 'Tajio';

   // Sulawesi Tenggara
   case TOLAKI = 'Tolak';
   case WOLIO = 'Wolio'; // Suku Buton
   case CIACIA = 'Cia-Cia';
   case MUNA = 'Muna';
   case KONAWE = 'Konawe';
   case MORONENE = 'Moronene';
   case LASALIMU = 'Lasalimu';

   // Sulawesi Barat
   case MAMUJU = 'Mamuju'; // Pengelompokan beberapa etnis
   case MAMASAA = 'Mamasa';
   case POLEWALI = 'Polewali'; // Pengelompokan beberapa etnis
   case TAPALANG = 'Tapalang';
   case ARALLE_TABULAHAN = 'Aralle-Tabulahan';

   // Gorontalo
   case GORONTALO = 'Gorontalo';
   case AKE_LIMO = 'Ake Limo';
   case SUWAWA = 'Suwawa';
   case LOLOWO = 'Lalowu';
   case KAUDITAN = 'Kauditan';

    // Maluku
    case AMBON = 'Ambon';
    case TERNATE = 'Ternate';
    case TIDORE = 'Tidore';
    case BURU = 'Buru';
    case SERAM = 'Seram'; // Pengelompokan besar
    case ARU = 'Aru';
    case KEI = 'Kei';
    case TANIMBAR = 'Tanimbar';

    // Papua
    case DANI = 'Dani';
    case ASMAT = 'Asmat';
    case YALI = 'Yali';
    case MEE = 'Mee';
    case MONI = 'Moni';
    case BAUZI = 'Bauzi';
    case SENTANI = 'Sentani';
    case ARFAK = 'Arfak';
    case BIAK = 'Biak';
    case WAROPEN = 'Waropen';
    case MARIND = 'Marind';
    case KOROWAI = 'Korowai';
    case HULI = 'Huli';
}