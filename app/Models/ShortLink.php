<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ShortLink
 * @package App\Models
 *
 * @property-read int $id
 * @property string $actual_url
 * @property string $short_url
 * Relations
 * @property-read User $user
 */
class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'actual_url',
        'short_url',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
