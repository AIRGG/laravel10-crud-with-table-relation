<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPost extends Model
{
    use HasFactory;
    protected $table = 'tbl_post';
    protected $primaryKey = 'id_post';

    public function user()
    {
        return $this->belongsTo(MUser::class, 'id_user');
    }
}
