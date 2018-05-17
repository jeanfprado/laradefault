<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class PermissionCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create 
                            {name : The name Exemple: module_user.show}
                            {title : The title Exemple: "Show User" }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create permission for access system ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Permission $permission)
    {
        parent::__construct();
        $this->permission = $permission;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       
     $permission = $this->permission->create([
         'name' => $this->argument('name'), 
         'title' => $this->argument('title')]);

         if($permission){
            $this->info("Permission `{$permission->name}` created");
           }else{
            $this->info("Permission not created");  
           }   
    
    }
}
