<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'Snapchat', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c4/Snapchat_logo.svg/640px-Snapchat_logo.svg.png'],
            ['name' => 'Nike', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png'],
            ['name' => 'Adidas', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/1200px-Adidas_Logo.svg.png'],
            ['name' => 'Disney', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Walt_Disney_Pictures_logo.svg/2560px-Walt_Disney_Pictures_logo.svg.png'],
            ['name' => 'Pepsi', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Pepsi_logo_2014.svg/1200px-Pepsi_logo_2014.svg.png'],
            ['name' => 'RedBull', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/Red_Bull_Racing_logo.svg/1200px-Red_Bull_Racing_logo.svg.png'],
            ['name' => 'Coca Cola', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Coca-Cola_logo.svg/1200px-Coca-Cola_logo.svg.png'],
            ['name' => 'Mercedes', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Benz_Logo_2010.svg/1200px-Mercedes-Benz_Logo_2010.svg.png'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
