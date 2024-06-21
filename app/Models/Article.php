<?php

namespace App\Models;

use App\Base\Interfaces\HasCategory;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model implements HasCategory
{
    use HasFactory;

    public $fillable = ['id', 'category_id', 'title', 'description', 'photo'];
    protected $table = 'articles';
    protected $primaryKey = 'id';

    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
