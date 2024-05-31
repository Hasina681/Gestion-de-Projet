<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Direction;

class createDirection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:direction:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create direction';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $direction_name = $this->argument('name');
        Direction::query()->create([
            'nom' => $direction_name
        ]);
        $this->info('Direction ('.$direction_name.') created !');
    }
}
