<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{

                                //https://fakerphp.org/formatters/
    /**
     * Run the database seeds.g
     */
    public function run(): void
    {
        Employee::factory(100)->create();
    }
}
