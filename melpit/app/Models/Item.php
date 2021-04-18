<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // 出品中
    const STATE_SELLING = 'selling';
    // 購入済み
    const STATE_BOUGHT = 'bought';

    protected $casts = [
        'bought_at' => 'datetime',
    ];

    public function secondaryCategory()
    {
        return $this->belongsTo(SecondaryCategory::class);
        // belongsTo 第一引数にはリレーションの先となるEloquent Modelの完全修飾クラス名を指定します。
        // 第二引数には外部キーのカラム名を指定します。省略した場合は、クラス名から自動的に決定されます。
        // ここでは省略しているためprimary_category_idが外部キーとして使われます。
        // 第三引数にはリレーション先のカラム名を指定します。省略した場合はidが使われます。
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function condition()
    {
        return $this->belongsTo(ItemCondition::class, 'item_condition_id');
    }
    // IsStateSellingだけで参照できるようになる
    public function getIsStateSellingAttribute()
    {
        return $this->state === self::STATE_SELLING;
    }

    public function getIsStateBoughtAttribute()
    {
        return $this->state === self::STATE_BOUGHT;
    }
}
