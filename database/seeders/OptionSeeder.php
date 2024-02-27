<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'permission_category' => ['Basic', 'Fields', 'Tabs', 'Other']
        ];

        foreach($data as $category => $value) {

            foreach($value as $name) {
                Option::firstOrCreate([
                    'category' => $category,
                    'name' => $name,
                ]);
            }
        }
    }
}
