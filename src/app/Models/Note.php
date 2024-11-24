<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    // свойство модели, которое используется для защиты определенных полей от изменения
    protected $guarded = false;
}
