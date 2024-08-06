<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Db;
class CloseDbConnection
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Database\Events\QueryExecuted  $event
     * @return void
     */
    public function handle(QueryExecuted $event)
    {
        Log::info('Database connection closed after query execution');
    
        $connections = app('db')->getConnections();
    
        foreach ($connections as $name => $connection) {
            $connection->disconnect();
            Log::info('Connection '.$name.' closed after query execution');
        }
}
}