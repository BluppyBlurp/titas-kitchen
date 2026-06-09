<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name'            => 'Pancit Bihon',
                'description'     => 'Classic Filipino rice noodles with vegetables and choice of meat',
                'category'        => 'Pansit',
                'is_available'    => true,
                'has_spice_level' => false,
                'sort_order'      => 1,
                'sizes' => [
                    ['label' => 'Bilao (8-10 pax)', 'price' => 450],
                    ['label' => 'Half Bilao (4-5 pax)', 'price' => 250],
                    ['label' => 'Container (2-3 pax)', 'price' => 150],
                ],
                'addons' => [
                    ['label' => 'Extra Sauce', 'price' => 20],
                    ['label' => 'Chicharon Topping', 'price' => 30],
                ],
            ],
            [
                'name'            => 'Kare-Kare',
                'description'     => 'Rich oxtail stew in peanut sauce with bagoong on the side',
                'category'        => 'Ulam',
                'is_available'    => true,
                'has_spice_level' => false,
                'sort_order'      => 2,
                'sizes' => [
                    ['label' => 'Small (2-3 pax)', 'price' => 350],
                    ['label' => 'Medium (4-6 pax)', 'price' => 600],
                    ['label' => 'Large (8-10 pax)', 'price' => 1100],
                ],
                'addons' => [
                    ['label' => 'Extra Bagoong', 'price' => 25],
                ],
            ],
            [
                'name'            => 'Bicol Express',
                'description'     => 'Spicy pork with coconut milk and shrimp paste',
                'category'        => 'Ulam',
                'is_available'    => true,
                'has_spice_level' => true,
                'sort_order'      => 3,
                'sizes' => [
                    ['label' => 'Small (2-3 pax)', 'price' => 280],
                    ['label' => 'Medium (4-6 pax)', 'price' => 480],
                ],
                'addons' => null,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::create($item);
        }
    }
}