<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $text
 * @property string $email_to
 * @property string $subject
 * @property User $user
 * @property Answer $answer
 */
class Appeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'text',
        'email_to'
    ];

    protected $appends = [
        'is_answered'
    ];

    /* Relations */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class);
    }

    /* Accessors */

    protected function isAnswered(): Attribute
    {
        return Attribute::make(
            fn() => !is_null($this->answer)
        );
    }
}
