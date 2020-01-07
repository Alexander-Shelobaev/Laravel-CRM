<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $start = microtime(true);       

        $this->call(seedService::class);
        $this->call(seedPortfolio::class);
        $this->call(seedNews::class);

        $this->call(seedCurrencies::class);
        $this->call(seedStates::class);
        $this->call(seedCities::class);
        $this->call(seedAirfields::class);
        
        $this->call(seedUsers::class);
        $this->call(seedRoles::class);
        $this->call(seedPermissions::class);
        $this->call(seedPermissionRole::class);
        $this->call(seedRoleUser::class);

        $this->call(seedChat::class);

        $end = microtime(true);
        $finish = ($end - $start);
        echo "Время выполнения посева данных: $finish сек. \n";         
        
    }
}
