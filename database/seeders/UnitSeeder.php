<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            'Piece' => 'pc',
            'Kilogram' => 'kg',
            'Gram' => 'g',
            'Liter' => 'L',
            'Milliliter' => 'ml',
            'Dozen' => 'doz',
            'Packet' => 'pkt',
            'Box' => 'box',
            'Bottle' => 'btl',
            'Can' => 'can',
            'Jar' => 'jar',
            'Bag' => 'bag',
            'Cup' => 'cup',
            'Glass' => 'gls',
            'Plate' => 'plt',
            'Bowl' => 'bwl',
            'Serving' => 'srv',
        ];

        foreach ($units as $name => $shortName) {
            Unit::updateOrCreate(['name' => $name], ['short_name' => $shortName]);
        }
    }
}
