<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('master_actions')
            ->insert([
                [
                    'name' => 'view',
                    'description' => 'Hak untuk mengakses halaman',
                ],
                [
                    'name' => 'add',
                    'description' => 'Tombol aksi untuk menambah data',
                ],
                [
                    'name' => 'edit',
                    'description' => 'Tombol aksi untuk mengedit data',
                ],
                [
                    'name' => 'delete',
                    'description' => 'Tombol aksi untuk menghapus data',
                ]
            ]);

        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Data Master',
                'order' => 0,
                'icons' => 'database',
                'status' => 'active',
            ]);

        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Penilaian',
                'order' => 0,
                'icons' => 'sort-numeric-up-alt',
                'status' => 'active',
            ]);

        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Manajemen User',
                'order' => 0,
                'icons' => 'person-gear',
                'status' => 'active',
            ]);
        DB::table('menu_sections')
            ->insert([
                'name_section' => 'Pengaturan',
                'order' => 0,
                'icons' => 'gear',
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'User',
                'url' => '/user',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 3,
                'name_menu' => 'Group',
                'url' => '/group',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 4,
                'name_menu' => 'Pengaturan Aplikasi',
                'url' => '/pengaturan-aplikasi',
                'icons' => '',
                'order' => 1,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 4,
                'name_menu' => 'Menu',
                'url' => '/menu',
                'icons' => '',
                'order' => 2,
                'status' => 'active',
            ]);

        DB::table('menus')
            ->insert([
                'parent_id' => 0,
                'section_id' => 4,
                'name_menu' => 'Aksi',
                'url' => '/aksi',
                'icons' => '',
                'order' => 3,
                'status' => 'active',
            ]);

        DB::table('actions')
            ->insert([
                'menu_id' => 2,
                'master_action_id' => 1,
            ]);

        DB::table('action_groups')
            ->insert([
                'action_id' => 1,
                'group_id' => 1,
            ]);
    }
}
