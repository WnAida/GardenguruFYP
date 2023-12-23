<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\RegistrationStatusEnum;
use App\Models\Bank;
use App\Models\Event;
use App\Models\Guidance;
use App\Models\Payment;
use App\Models\Pest;
use App\Models\Seller;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin123@admin.com',
            'password' => 'admin',
            'phone_number' => '111',
            // 'registration_status' => RegistrationStatusEnum::Approved(),
            'email_verified_at' => now(),
        ]);

        $this->call(BankSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VegetableSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(GuidanceSeeder::class);
        $this->call(PestSeeder::class);
        $this->call(SellerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(PaymentSeeder::class);

    }
}
