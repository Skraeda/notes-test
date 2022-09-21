<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notes;
use App\Models\NotesHistory;

class Patient extends Model
{
    use HasFactory;

    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Notes::class, 'patient_id');
    }


    public function notes_history(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NotesHistory::class, 'patient_id');
    }

}
