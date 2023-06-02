<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property Appeal $appeal
 * @property string $text
 * @property boolean $is_sent
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'text'
    ];

    /* Relations */

    public function appeal(): BelongsTo
    {
        return $this->belongsTo(Appeal::class);
    }
}
