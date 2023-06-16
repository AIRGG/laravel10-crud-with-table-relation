<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';

    public function role()
    {
        return $this->belongsTo(MRole::class, 'id_role');
    }
}
