<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Attendance;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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


        \Log::info("Cron is working fine!");
           $users = User::where('role_id',1)->get();
           foreach ($users as $key => $user) {
                $exist = Attendance::where('user_id',$user->id)->where('created_at',date('Y-m-d'))->first();
                if(empty($exist)){
        $data = new Attendance([
            'user_id' => $user->id,
            'time_in' => date('Y-m-d'),
            'time_out' => date('Y-m-d'),
            'state_id'=>2,
            'created_at'=> date('Y-m-d'),
        ]);
        $data->save();
                }
       
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
}
