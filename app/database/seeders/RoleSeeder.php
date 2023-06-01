<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private array $roles = [
        [
            'code' => 'client',
            'title' => 'Клиент'
        ],
        [
            'code' => 'manager',
            'title' => 'Менеджер'
        ],
        [
            'code' => 'admin',
            'title' => 'Администратор'
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $role) {
            Role::query()->create($role);
        }
    }
}
