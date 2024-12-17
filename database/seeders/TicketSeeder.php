<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::pluck('id')->toArray();

        // Create 10 sample tickets
        foreach (range(1, 10) as $index) {
            Ticket::create([
                'title' => "Ticket Title $index",
                'description' => "This is the description for ticket $index.",
                'status' => ['open', 'closed', 'pending'][array_rand(['open', 'closed', 'pending'])],
                'user_id' => $userIds[array_rand($userIds)], // Random user ID
            ]);
        }
    }
}
