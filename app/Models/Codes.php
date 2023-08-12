<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codes extends Model
{
    use HasFactory;

    protected $table = 'codes';
    protected $guarded;

    public function avaibler($code)
    {
        $search = self::query()
            ->where('code', $code)
            ->where('active', 1)
            ->first();
        return $search;
    }

    public function deactivator($id)
    {
        $active_mod = self::where('id', $id)
            ->update([
                'active' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return $active_mod;
    }
}
