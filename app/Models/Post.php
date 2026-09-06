<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Override;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    #[Override]
    public function casts()
    {
        return [
            'id' => 'integer',
            'title' => 'string',
            'content' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
