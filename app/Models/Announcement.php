<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Announcement extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $primaryKey = 'announcement_id';
    protected $fillable = [
            'object_type','announcement_header','announcement_desc','flag','active'
    ];

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'object_id', 'announcement_id');
    }
}
