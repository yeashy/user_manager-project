<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PermissionSeeder extends Seeder
{
    private array $permissions = [
        [
            'code' => 'access_to_admin_page',
            'title' => 'Доступ к админ-панели',
            'roles' => ['admin']
        ],
        [
            'code' => 'answer_to_appeals',
            'title' => 'Отвечать на обращения',
            'roles' => ['admin', 'manager']
        ],
        [
            'code' => 'write_an_appeals',
            'title' => 'Писать обращения',
            'roles' => ['admin', 'client']
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            /** @var Permission $newPermission */
            $newPermission = Permission::query()->create(Arr::except($permission, 'roles'));

            foreach ($permission['roles'] as $code) {
                /** @var Role $role */
                $role = Role::query()->where('code', $code)->first();

                $role->permissions()->attach($newPermission->id);
            }
        }
    }
}
