<?php

namespace App\Http\Middleware;

use App\LandingPageSection;
use App\Utility;
use Closure;
use Illuminate\Support\Facades\Schema;

class XSS
{
    use \RachidLaasri\LaravelInstaller\Helpers\MigrationsHelper;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check())
        {
            \App::setLocale(\Auth::user()->lang);

            if(\Auth::user()->type == 'super admin')
            {
                if(Schema::hasTable('messages'))
                {
                    if(Schema::hasColumn('messages', 'type') == false)
                    {
                        Schema::drop('messages');
                        \DB::table('migrations')->where('migration', 'like', '%messages%')->delete();
                    }
                }

                $migrations = $this->getMigrations();
                $dbMigrations           = $this->getExecutedMigrations();
                $numberOfUpdatesPending = (count($migrations)+6) - count($dbMigrations);

                if($numberOfUpdatesPending > 0)
                {
                    // run code like seeder only when new migration
                    Utility::addNewData();
                    return redirect()->route('LaravelUpdater::welcome');
                }

                $landingData = LandingPageSection::all()->count();
                if($landingData == 0)
                {
                    Utility::add_landing_page_data();
                }
            }
        }

        $input = $request->all();
        array_walk_recursive(
            $input, function (&$input){
            $input = strip_tags($input);
        }
        );
        $request->merge($input);

        return $next($request);
    }
}
