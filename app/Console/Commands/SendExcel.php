<?php

namespace App\Console\Commands;

use App\Mail\MailPass;
use Illuminate\Console\Command;
use App\Jobs\SendExcelController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class SendExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendExcel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SendExcelController::dispatch();

    }
}
