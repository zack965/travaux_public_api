<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = "article_id";
    protected $fillable = ["project_id", "N_prix", "article_name", "quantité", "unité", "prix_unitaire", "prix_total"];
}
