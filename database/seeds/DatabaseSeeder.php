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
        DB::table('funcionarios')->insert([
            [
                'name' => 'Victor Mussel Candido',
                'email' => 'victor.mussel@mesquita.rj.gov.br',
                'nivel' => 'Super-Admin',
                'password' => bcrypt(env('DEFAULT_PASSWORD', '')),
            ],
            [
                'name' => 'Felipe Vidal',
                'email' => 'felipe.vidal@mesquita.rj.gov.br',
                'nivel' => 'Super-Admin',
                'password' => bcrypt(env('DEFAULT_PASSWORD', '')),
            ]
        ]);
    }
}
