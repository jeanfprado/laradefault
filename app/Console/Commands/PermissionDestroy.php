<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PermissionDestroy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:destroy {permission : id of permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete permission';

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
     * @return mixed
     */
    public function handle()
    {
       $delete = \DB::table('permissions')->where('id', '=', $this->argument('permission'))->delete();
   
       if($delete){
        $this->info("Permission deleted");
       }else{
        $this->info("Permission not deleted");  
       }
    }
}
