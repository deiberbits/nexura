<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->areas();
        $this->roles();
    }

    /**
     * Create a private function for Areas from json file
     */
    private function areas()
    {
        $areas = json_decode(file_get_contents('database/seeds/areas.json'), true);
        foreach ($areas['areas'] as $area) {
            DB::table('areas')->insert([
                'nombre' => $area['nombre']
            ]);
        }
    }

    /**
     * Create a private function for Roles from json file
     */
    private function roles()
    {
        $roles = json_decode(file_get_contents('database/seeds/roles.json'), true);
        foreach ($roles['roles'] as $role) {
            DB::table('roles')->insert([
                'nombre' => $role['nombre']
            ]);
        }
    }
}
