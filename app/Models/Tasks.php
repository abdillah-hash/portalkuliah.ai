<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'modules_id', 'students_id', 'level'];

    public function module()
    {
        return $this->belongsTo(Modules::class, 'modules_id');
    }

    public function student()
    {
        return $this->belongsTo(Students::class, 'students_id');
    }
}
