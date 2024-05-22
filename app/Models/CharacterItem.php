<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterItem extends Model
{
    use HasFactory;

    protected $table = 'character_items';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['name', 'item_id'];

    public function Item():BelongsTo {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
