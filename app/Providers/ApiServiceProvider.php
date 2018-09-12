<?php

namespace App\Providers;

use DB;
use Log;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
// use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Repositories\MeetupRepositoryInterface;
use App\Repositories\MeetupRepository;


class ApiServiceProvider extends ServiceProvider {

    public function boot()
    {
        JsonResource::withoutWrapping();
        // ResourceCollection::withoutWrapping();

        //Logging Eloquent queries to test eager loading

        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });
    }
    public function register()
    {
        $this->app->bind(MeetupRepositoryInterface::class, MeetupRepository::class);
    }
}
