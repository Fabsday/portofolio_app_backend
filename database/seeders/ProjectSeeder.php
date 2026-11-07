<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['CASHEL', 'Mobile App', 'Flutter', 'Flutter, PHP', 2025,
                'Aplikasi mobile dengan panel admin dan pelanggan, terhubung ke backend PHP.'],
            ['El-Fath POS', 'Sistem Informasi', 'PHP', 'PHP, MySQL, Flutter', 2024,
                'Sistem POS dan manajemen inventori dengan antarmuka mobile Flutter.'],
            ['Vibely', 'Website', 'Node.js', 'Node.js, Express, PostgreSQL, JWT, Cloudinary', 2025,
                'Backend REST API dengan autentikasi JWT dan penyimpanan media di Cloudinary.'],
            ['Social Media MVP', 'Website', 'React', 'React, Next.js, PostgreSQL', 2026,
                'MVP media sosial yang sudah di-deploy sebagai proyek portofolio.'],
            ['Website UMKM', 'Website', 'PHP', 'PHP, MySQL', 2024,
                'Website profil dan katalog produk untuk pelaku UMKM.'],
        ];

        foreach ($data as [$name, $category, $tech, $stack, $year, $desc]) {
            Project::create([
                'name' => $name, 'category' => $category, 'technology' => $tech,
                'stack' => $stack, 'year' => $year, 'description' => $desc,
            ]);
        }
    }
}