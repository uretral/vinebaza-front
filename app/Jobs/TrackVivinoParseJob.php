<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrackVivinoParseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $action;
    protected array $arguments;

    /**
     * Create a new job instance.
     */
    public function __construct($action, $arguments)
    {
        $this->action = $action;
        $this->arguments = $arguments;

        \Log::info('action' . $action );
        \Log::info('$arguments' . json_encode($arguments) );
    }

    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        sleep(3);
        try {
            $class = new $this->action(...$this->arguments);
            $class->handle();
        } catch (\Exception $e) {
            \Log::channel('emergency')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);
            dd($e->getMessage());
        }

    }
}
