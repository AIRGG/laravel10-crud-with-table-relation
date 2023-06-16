<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MRole extends Model
{
    use HasFactory;
    protected $table = 'tbl_role';
    protected $primaryKey = 'id_role';
}
