<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentModel extends Model
{
    use HasFactory;

    protected $table ='attachment';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = AttachmentModel::select('attachment.*','users.name as created_by_name')
                  ->join('users','users.id');

        return $return;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
