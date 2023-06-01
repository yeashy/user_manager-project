<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property string $code
 * @property string $title
 * @property Collection<Role> $roles
 */
class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    /* Relations */

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}
