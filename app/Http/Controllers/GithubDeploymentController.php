<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class GithubDeploymentController extends Controller
{
    public function deploy()
    {
        $commands = array(
            'echo $PWD',
            'whoami',
            'git reset --hard HEAD',
            'git pull',
            'git status',
            'git submodule sync',
            'git submodule update',
            'git submodule status',
        );
        // Run the commands for output
        $output = '';
        foreach($commands AS $command){
            // Run it
            $tmp = exec($command);
            // Output
            $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
            $output .= htmlentities(trim($tmp)) . "\n";
        }

        Artisan::call('config:cache');
        dump(Artisan::output());
        Artisan::call('route:clear');
        dump(Artisan::output());
        Artisan::call('cache:clear');
        dump(Artisan::output());
        Artisan::call('view:clear');
        dump(Artisan::output());

        return $output;
    }
}
