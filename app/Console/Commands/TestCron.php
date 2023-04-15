<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

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

        $data= array('data'=>'Cron Testing');
        Mail::send('mail', $data, function($message){
            $message->to('shashankpatel1994@gmail.com')
            ->subject('Cron testing mail example');
        });
    }
}
