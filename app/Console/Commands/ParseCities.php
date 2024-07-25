<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ParseCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse cities from API and save to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.hh.ru/areas');
        $data = $response->json();

        // Поиск страны по названию
        $russia = collect($data)->firstWhere('name', 'Россия');

        if (!$russia) {
            $this->error('Country "Россия" not found in the API data.');
            return;
        }

        foreach ($russia['areas'] as $region) {
            foreach ($region['areas'] as $city) {
                City::updateOrCreate(
                    ['slug' => Str::slug($city['name'])],
                    ['name' => $city['name']]
                );
            }
        }

        $this->info('Cities parsed and saved successfully.');
    }
}
