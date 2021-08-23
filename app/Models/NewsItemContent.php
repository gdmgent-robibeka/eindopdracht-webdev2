<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItemContent extends Model
{
    use HasFactory;

    protected $table = 'news_items_content';

    public function newsItem() {
        return $this->belongsTo(NewsItem::class);
    }
}
