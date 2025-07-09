<?php

namespace Database\Seeders;

use App\Models\Extension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extensions = [
            ['extension' => 'com', 'prix' => 12, 'old_price' => 15, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'fr', 'prix' => 7, 'old_price' => 10, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'us', 'prix' => 5, 'old_price' => 8, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'au', 'prix' => 11, 'old_price' => 14, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'jp', 'prix' => 9, 'old_price' => 12, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'cn', 'prix' => 6, 'old_price' => 9, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'eu', 'prix' => 13, 'old_price' => 16, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'ru', 'prix' => 8, 'old_price' => 11, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'br', 'prix' => 10, 'old_price' => 13, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'in', 'prix' => 7, 'old_price' => 10, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'za', 'prix' => 9, 'old_price' => 12, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'mx', 'prix' => 6, 'old_price' => 9, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'ca', 'prix' => 10, 'old_price' => 13, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'uk', 'prix' => 8, 'old_price' => 11, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'de', 'prix' => 9, 'old_price' => 12, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'it', 'prix' => 6, 'old_price' => 9, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'org', 'prix' => 10, 'old_price' => 13, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'net', 'prix' => 11, 'old_price' => 14, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'info', 'prix' => 9, 'old_price' => 12, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'biz', 'prix' => 8, 'old_price' => 11, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'xyz', 'prix' => 6, 'old_price' => 9, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'online', 'prix' => 4, 'old_price' => 7, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'store', 'prix' => 15, 'old_price' => 18, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'site', 'prix' => 5, 'old_price' => 8, 'currency' => 'USD', 'is_active' => true],
            ['extension' => 'tech', 'prix' => 14, 'old_price' => 17, 'currency' => 'USD', 'is_active' => true]
        ];
        foreach ($extensions as $extension) {
            Extension::create($extension);
        }
    }
}