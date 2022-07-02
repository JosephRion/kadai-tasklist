<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('tasks')->insert([
        //     'status' => 'test status 1',
        //     'content' => 'test content 1'
        // ]);
        
        for($i = 1; $i <= 100; $i++) {
            DB::table('tasks')->insert([
                'status' => 'st' . $i,
                //'status' => 'status1',
                'content' => 'test content ' . $i
            ]);
        }
    }
}
