<?php

namespace App\Models;

use App\Enums\Surat;
use App\Models\Surat as ModelsSurat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;
    public $table = "attachments";

    protected $fillable = [
        'path',
        'filename',
        'extension',
        'surat_id',
    ];

    protected $appends = [
        'path_url',
    ];

    /**
     * @return string
     */
    public function getPathUrlAttribute(): string {
        if (!empty($this->path)) {
            return asset('storage/' . $this->path);
        }
        return asset('storage/attachments/' . $this->filename);
    }

    public function scopeType($query, Surat $type)
    {
        return $query->whereHas('surat', function ($query) use ($type) {
            $query->where('tipe_surat', $type->value);
        });
    }
    

    public function scopeMasuk($query)
    {
        return $this->scopeType($query, Surat::MASUK);
    }

    public function scopeKeluar($query)
    {
        return $this->scopeType($query, Surat::KELUAR);
    }


    /**
     * @return BelongsTo
     */
    public function surat(): BelongsTo
    {
        return $this->belongsTo(Surat::class);
    }

}