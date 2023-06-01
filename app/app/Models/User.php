<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Collection<Role> $roles
 * @property Collection<Appeal> $appeals
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* Methods */

    public function hasPermission(Permission|string $permission): bool
    {
        if (gettype($permission) === 'string') {
            return $this->hasStringPermission($permission);
        } else {
            return $this->hasObjectPermission($permission);
        }
    }

    private function hasStringPermission(string $permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('code', $permission)->first()) {
                return true;
            }
        }

        return false;
    }

    private function hasObjectPermission(Permission $permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains($permission)) {
                return true;
            }
        }

        return false;
    }

    /* Relations */

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function appeals(): HasMany
    {
        return $this->hasMany(Appeal::class);
    }

    /* Mutators */

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
