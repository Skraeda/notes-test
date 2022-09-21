<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesHistory extends Model
{
    protected $dates = ['signed_date', 'data_date', 'deleted_at'];
    protected $table = 'notes_history';
    protected $fillable = [
        'id',
        'user_id',
        'unit_id',
        'journal_type_id',
        'signed_by',
        'note',
        'type',
        'private',
        'draft',
        'version,',
        'patient_id',
    ];
    use HasFactory;


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
