<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengajuanSelesai extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;


    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Surat Selesai',
        );
    }


    public function content(): Content
{
    return new Content(
        view: 'emails.pengajuan_selesai',
        with: [
            'nama_warga' => $this->mailData['nama_warga'],
            'jenis_surat' => $this->mailData['jenis_surat'],
            'nomor_pengajuan' => $this->mailData['nomor_pengajuan'],
            'tanggal_pengajuan' => $this->mailData['tanggal_pengajuan'], 
        ],
    );
}


    public function attachments(): array
    {
        return [];
    }
}