<?php

namespace App\Exceptions;


use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    //  public function render($request, Throwable $exception)
    // {
        
    //     if ($this->isHttpException($exception)) {
    //         return $this->renderHttpException($exception);
    //     }
    //     elseif ($exception instanceof QueryException) {
    //         $this->disconnectAllDatabaseConnections();
    //         return response()->view('errors.generic', [], 500); 
    //     }
    //        elseif (strpos($exception->getMessage(), 'No space left on device') !== false) {
    //         // Handle "No space left on device" error
    //         return response()->make('<html><body><h1>Server Maintenance</h1><p>The server is currently undergoing maintenance. Please try again in a few minutes.</p></body></html>', 503);
    //     }  else {
    //         // Handle other unknown errors
    //         return response()->view('errors.generic', [], 500); // Assuming you have a custom generic error view
    //     }
    
    //     return parent::render($request, $exception);
    // }

    public function render($request, Throwable $exception)
{
    if ($this->isHttpException($exception)) {
        return $this->renderHttpException($exception);
    } elseif ($exception instanceof QueryException) {
        $this->disconnectAllDatabaseConnections();
        return response()->view('errors.generic', ['message' => $exception->getMessage()], 500); 
    } elseif (strpos($exception->getMessage(), 'No space left on device') !== false) {
        // Handle "No space left on device" error
        return response()->make('<html><body><h1>Server Maintenance</h1><p>The server is currently undergoing maintenance. Please try again in a few minutes.</p><p>' . $exception->getMessage() . '</p></body></html>', 503);
    } else {
        // Handle other unknown errors
        return response()->view('errors.generic', ['message' => $exception->getMessage()], 500); // Assuming you have a custom generic error view
    }

    return parent::render($request, $exception);
}


    protected function disconnectAllDatabaseConnections()
    {
        // Get the database connections
        $connections = DB::getConnections();

        foreach ($connections as $name => $connection) {
            try {
                $connection->disconnect();
                \Log::info("Disconnected from database connection: $name");
            } catch (\Exception $e) {
                \Log::error("Failed to disconnect from database connection: $name - " . $e->getMessage());
            }
        }

        \Log::info('All database connections have been disconnected.');
    }
    
}
