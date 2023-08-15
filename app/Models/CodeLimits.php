<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeLimits extends Model
{
    use HasFactory;

    protected $table = 'code_limits';
    protected $guarded;

    public function iterator($user_id, $actual_count)
    {
        $actual_count += 1;
        $limit = self::query()->updateOrCreate(['date_today' => date("Y-m-d"), 'user_id' => $user_id],
            [
                'date_today' => date("Y-m-d"),
                'user_id' => $user_id,
                'counter_of_limit' => $actual_count,
            ]);
        return $limit;
    }
}
