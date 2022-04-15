<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientcate_id',
        'name',
        'logo',
    ];
    public function clientcate()
    {
        return $this->belongsTo(ClientCate::class);
    }
}
