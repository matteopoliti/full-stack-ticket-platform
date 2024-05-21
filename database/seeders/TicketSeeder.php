<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $operators = Operator::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $operator = $faker->unique()->randomElement($operators);
            $newTicket = new Ticket();

            $newTicket->operator_id = $operator;
            $newTicket->stato = $faker->randomElement(["ASSEGNATO", "IN LAVORAZIONE", "CHIUSO"]);
            $newTicket->titolo = $faker->sentence(3);
            $newTicket->slug = Str::slug($newTicket->titolo, '-');
            $newTicket->descrizione = $faker->text(100);
            $newTicket->categoria = $faker->word();
            $newTicket->save();
        }
    }
}
