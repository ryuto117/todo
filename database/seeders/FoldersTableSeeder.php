<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['プライベート','仕事','旅行'];

        foreach ($titles as $title){
            DB::table('folders')->insert([
                'title'=>$title,
                //Carbonはライブラリで今の時刻を取ってきている
                'created_at' =>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
