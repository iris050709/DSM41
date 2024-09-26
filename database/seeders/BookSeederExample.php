<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeederExample extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'Cien años de soledad', // Título del libro
            'author' => 'Gabriel García Márquez', // Autor del libro
            'year' => 1967, // Año de publicación
            'genre' => 'Ficción', // Género del libro
            'description' => 'Una novela que narra la historia de la familia Buendía en el pueblo ficticio de Macondo.', // Descripción del libro
            'created_at' => now(), // Fecha de creación
            'updated_at' => now(), // Fecha de actualización
        ]);
    }
}
