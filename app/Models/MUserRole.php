<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUserRole extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_role';
    protected $primaryKey = 'id_user_role';

    public function role()
    {
        return $this->belongsTo(MRole::class, 'id_role');
    }

    public function user()
    {
        return $this->belongsTo(MUser::class, 'id_user');
    }
}
