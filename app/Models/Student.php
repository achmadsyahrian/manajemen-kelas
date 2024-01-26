<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            // Melakukan penghapusan kaskade pada entitas User jika student dihapus
            if ($student->user) {
                $student->user->forceDelete();
            }            
        });
    }
}
