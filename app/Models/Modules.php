<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'total_level', 'video', 'companies_id'];

    public function companies()
    {
        return $this->belongsTo(Companies::class, 'companies_id');
    }

    public function tasks()
    {   
        return $this->hasMany(Tasks::class);
    }
}
