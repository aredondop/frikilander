<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        echo "Seeding UserSeeder...\n";
        $this->call('UserSeeder');

        echo "Seeding EntidadSeeder...\n";
        $this->call('EntidadSeeder');

        echo "Seeding EntidadUsuarioSeeder...\n";
        $this->call('EntidadUsuarioSeeder');

        echo "Seeding AmbientacionSeeder...\n";
        $this->call('AmbientacionSeeder');

        echo "Seeding PaginaTiendaSeeder...\n";
        $this->call('PaginasPorDefectoSeeder');

        echo "Seeding ProductoSeeder...\n";
        $this->call('ProductoSeeder');

        echo "✅ Seeders básicos completados.\n";

    }
}
