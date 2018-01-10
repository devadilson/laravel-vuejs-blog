<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artigos')->insert([
            'titulo' => 'Laravel 5.5 Vuejs',
            'descricao' => 'descricao',
            'conteudo' => 'conteudo',
            'data' => Carbon::now()->format('Y-m-d'),
            'user_id' => '1',
        ]);
    }
}
