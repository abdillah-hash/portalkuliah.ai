<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];

    public function groups()
    {
        return $this->hasMany(Groups::class);
    }

    public function modules()
    {
        return $this->hasMany(Modules::class);
    }

    public function students()
    {
        return $this->hasMany(Students::class);
    }
}
