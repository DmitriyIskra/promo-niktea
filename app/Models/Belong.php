<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belong extends Model
{
    use HasFactory;

    protected $table = 'belongs';
    protected $guarded;

    public function saver($ticket_id, $code_id, $user_id)
    {
        $limit = self::query()->create(
            [
                'ticket_id' => $ticket_id,
                'code_id' => $code_id,
                'user_id' => $user_id,
            ]);
    }

    public function active_records($user_id)
    {
        $limit = self::query()
            ->where('user_id', $user_id)
            ->get();
    }
}
