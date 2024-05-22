<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'author',
        'photo_link',
        'rating',
        'category_id'
    ];

    public function categoryItem(): BelongsTo {
        return $this->belongsTo(CategoryItem::class, 'category_id', 'id');
    }

    public function characterItem(): HasMany {
        return $this->hasMany(CharacterItem::class, 'item_id', 'id');
    }

}
