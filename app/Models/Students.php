<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'phone', 'born_year', 'job_type', 'companies_id'];

    public function companies()
    {
        return $this->belongsTo(Companies::class, 'companies_id');
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
