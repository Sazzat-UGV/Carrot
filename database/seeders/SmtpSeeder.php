<?php

namespace Database\Seeders;

use App\Models\Smtp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Smtp::create();
    }
}
