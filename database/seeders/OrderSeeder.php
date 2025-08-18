<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            // Handle case where no users exist, perhaps create a dummy user or skip seeding orders
            echo "No users found. Please seed users first.\n";
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'user_id' => $faker->randomElement($userIds),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'total_price' => $faker->randomFloat(2, 10, 1000),
                'currency' => $faker->randomElement(['USD', 'EUR', 'GBP']),
                'status' => $faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
                'payment_method' => $faker->randomElement(['credit card', 'paypal', 'cash on delivery']),
                'shipping_address' => $faker->address,
                'billing_address' => $faker->address,
                'shipping_cost' => $faker->randomFloat(2, 0, 20),
                'tax_amount' => $faker->randomFloat(2, 0, 50),
                'discount_amount' => $faker->randomFloat(2, 0, 100),
                'notes' => $faker->sentence,
                'shipped_at' => $faker->optional()->dateTimeThisYear(),
                'delivered_at' => $faker->optional()->dateTimeThisYear(),
            ]);
        }
    }
}
