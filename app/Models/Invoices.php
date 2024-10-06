<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function section()
    {
        return $this->belongsTo(Sections::class);
    }

    protected $guarded = [];


}
