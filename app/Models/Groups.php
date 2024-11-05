<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tag', 'image', 'description', 'companies_id'];

    public function companies()
    {
        return $this->belongsTo(Companies::class, 'companies_id');
    }

}
