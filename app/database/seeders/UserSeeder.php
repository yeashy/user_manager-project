<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    private array $baseUsers = [
        [
            'name' => 'Админ Админович',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'roles' => ['admin']
        ],
        [
            'name' => 'Менеджер Менеджерович',
            'email' => 'manager@gmail.com',
            'password' => 'manager123',
            'roles' => ['manager']
        ],
        [
            'name' => 'Клиент Клиентович',
            // TODO: email to gmail
            'email' => 'client@email.com',
            'password' => 'client123',
            'roles' => ['client']
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->baseUsers as $user) {
            /** @var User $newUser */
            $newUser = User::query()->forceCreateQuietly(Arr::except($user, 'roles'));

            foreach ($user['roles'] as $code) {
                /** @var Role $role */
                $role = Role::query()->where('code', $code)->first();

                $role->users()->attach($newUser->id);
            }
        }

        User::factory()
            ->count(10)
            ->create();
    }
}
