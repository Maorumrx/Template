<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Moralize extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $primaryKey = 'moralize_id';
    protected $fillable = [
        'moralize_name',
        'moralize_desc'
    ];

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'object_id', 'moralize_id');
    }
}
