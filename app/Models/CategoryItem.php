<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryItem extends Model
{
    use HasFactory;

    protected $table = 'category_items';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name'
    ];

    public function Item():HasMany {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
