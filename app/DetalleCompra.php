<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_detalle_compra
 * @property int $id_producto
 * @property int $id_compra
 * @property int $cantidad
 * @property float $subtotal_compra
 * @property string $estado_compra
 * @property Producto $producto
 * @property OrdenCompra $ordenCompra
 */
class DetalleCompra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_compra';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_detalle_compra';

    /**
     * @var array
     */
    protected $fillable = ['id_producto', 'id_compra', 'cantidad', 'subtotal_compra', 'estado_compra'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto', 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenCompra()
    {
        return $this->belongsTo('App\OrdenCompra', 'id_compra', 'id_compra');
    }
    public $timestamps = false;
}
