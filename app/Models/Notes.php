<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $dates = ['signed_date', 'data_date', 'deleted_at'];
    protected $table = 'notes';
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }



}
