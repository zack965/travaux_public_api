<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = "project_id";
    protected $fillable = ["project_name", "project_address", "project_client_name", "devise"];
}
