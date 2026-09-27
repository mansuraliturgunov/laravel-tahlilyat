<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actors = [
            ['name' => 'sherbek'],
            ['name' => 'ahat qayum'],
            ['name' => 'toni stark']
        ];
        Actor::insert($actors);
    }
}
