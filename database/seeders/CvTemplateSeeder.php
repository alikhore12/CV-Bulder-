<?php

namespace Database\Seeders;

use App\Models\CvTemplate;
use Illuminate\Database\Seeder;

class CvTemplateSeeder extends Seeder
{
    public function run(): void
    {
        foreach (CvTemplate::catalog() as $index => $template) {
            CvTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                [
                    'name' => $template['name'],
                    'description' => $template['description'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }
    }
}
