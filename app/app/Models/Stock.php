<?php

namespace App\Models;

use Database\Factories\StockFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Product $product
 * @property Warehouse $warehouse
 * @property int $stock
 */
class Stock extends Model
{
    use HasFactory;

    /** @use HasFactory<StockFactory> */
    protected $fillable = [
        'product_id',
        'stock',
        'warehouse_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
}
