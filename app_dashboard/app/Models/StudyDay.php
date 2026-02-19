<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyDay extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function (StudyDay $studyDay) {
            $studyDay->study_days_id = 'SD-' . str_pad($studyDay->id, 5, '0', STR_PAD_LEFT);
            $studyDay->save();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
