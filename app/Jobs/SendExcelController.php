<?php

namespace App\Jobs;

use App\Mail\MailPass;
use App\Mail\Mailus;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendExcelController implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mails = [
            "dimaprogma@gmail.com",
            //"yesokolova@alephtrade.com",
            //"iuiskra@alephtrade.com",
            //"melesin@alephtrade.com",
            //"emishina@alephtrade.com",
            //"arutskoy@alephtrade.com"
        ];
        $query = DB::table('users')->select('*')->get();
        foreach ($query as $user) {
            $createDate = new DateTime($user->created_at);

            $result[$createDate->format('d.m.Y')][] = $user;
        }
        foreach($result as $date => $user){
            $result["data"][$date] = count($result[$date]);
        }
        $result["sum"] = array_sum($result["data"]);

        //Mail::to($data['email'])->send(new MailPass($testMailData));
        foreach($mails as $mail) {
            Mail::to($mail)->send(new Mailus($result));
        }
    }

}
