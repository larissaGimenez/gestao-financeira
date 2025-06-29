<?php

namespace Database\Seeders;

use App\Models\CharacterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterTypeSeeder extends Seeder
{
    public function run(): void
    {
        CharacterType::firstOrCreate(['name' => 'Princesa']);
        CharacterType::firstOrCreate(['name' => 'Herói']);
        CharacterType::firstOrCreate(['name' => 'Vilão']);
        CharacterType::firstOrCreate(['name' => 'Personagem Clássico']);
    }
}