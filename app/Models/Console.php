<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Console extends Model
{
    use HasFactory;
    protected $primaryKey = 'ConsoleID';
    public function detailData($id) {
        return DB::table('consoles')
            ->where('ConsoleID', $id)
            ->first();
    }
}
