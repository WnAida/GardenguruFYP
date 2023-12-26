<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Bank::create(['name' => 'Maybank2U']); //1
        Bank::create(['name' => 'CIMB Bank']); //2
        Bank::create(['name' => 'Bank Islam']); //3
        Bank::create(['name' => 'Public Bank']); //4
        Bank::create(['name' => 'Hong Leong Bank']); //5
        Bank::create(['name' => 'RHB Bank']); //6
        Bank::create(['name' => 'Ambank Berhad']); //7
        Bank::create(['name' => 'Bank Rakyat']); //8
        Bank::create(['name' => 'Alliance Bank']); //9
        Bank::create(['name' => 'Affin Bank']); //10

        Bank::create(['name' => 'Bank Muamalat Malaysia Berhad']); //11
        Bank::create(['name' => 'Bank Simpanan Nasional']); //12
        Bank::create(['name' => 'Standard Chartered']); //13
        Bank::create(['name' => 'OCBC Bank']); //14
        Bank::create(['name' => 'Agro Bank']); //15
        Bank::create(['name' => 'UOB Bank']); //16
        Bank::create(['name' => 'HSBC']); //17
        Bank::create(['name' => 'Kuwait Finance House']); //18
        Bank::create(['name' => 'CIMB Islamic Bank']); //19
        Bank::create(['name' => 'Maybank2E']); //20

        Bank::create(['name' => 'Al Rajhi Bank']); //21
        Bank::create(['name' => 'Citibank Berhad']); //22
        Bank::create(['name' => 'Maybank']); //23
        Bank::create(['name' => 'MBSB Bank']); //24
        Bank::create(['name' => 'United Overseas Bank Berhad']); //25
    }
}
