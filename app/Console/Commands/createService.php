<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Service;
use App\Models\Direction;

class createService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:service:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $choises = [];
        $directions = Direction::select('nom')->get();
        foreach( $directions as $direction ){
            $choises[] = $direction->nom;
        }
        $service_name = $this->ask('Nom du service :');
        $direction_name = $this->choice('Direction',$choises);

        $direction = Direction::where(['nom' => $direction_name])->first();
        if( $direction && $service_name ){
            Service::query()->create([
                'nom' => $service_name,
                'direction_id' => $direction->id
            ]);
            $this->info('Service ('.$service_name.') created !');
        }else{
            $this->error('Cannot create service');
        }
    }
}
