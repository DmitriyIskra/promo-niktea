<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $guarded;

    public function saver($filename, $user_id)
    {
        $ticket_path = "https://storage.yandexcloud.net/nektia/$filename";
        $limit = self::query()->create(
            [
                'ticket_path' => $ticket_path,
                'user_id' => $user_id
            ]);
        return $limit;
    }
}
