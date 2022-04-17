<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'date',
        'client_id',
        'description',
        'images',
        'video',
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCate::class, 'category_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
