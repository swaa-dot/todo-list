<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'deskripsi',
        'kategori',
        'mulai',
        'berakhir',
        'status',
    ];
    
}
