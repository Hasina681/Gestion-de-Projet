<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $service_choises = [];
        $role_choises = [];
        $services = Service::select('nom')->get();
        $roles = Role::select('name')->get();
        foreach( $services as $service ){
            $service_choises[] = $service->nom;
        }
        foreach( $roles as $role ){
            $role_choises[] = $role->name;
        }
        $name = $this->ask('Nom :');
        $email = $this->ask('Email :');
        $password = $this->secret('Mot de passe :');
        $service_name = $this->choice('Service :', $service_choises);
        $role_name = $this->choice('Role :', $role_choises);

        $service = Service::where(['nom' => $service_name])->first();
        $role = Role::findByName($role_name);
        if( $service && $name && $email && $password && $role ){
            $user = new User([
                'name' => $name,
                'email' => $email,
                'service_id' => $service->id,
                'password' => Hash::make($password)
            ]);
            $service->users()->save($user);
            $user->assignRole($role_name);
            $this->info('User ('.$name.') created !');
        }else{
            $this->error('Cannot create user');
        }

    }
}
