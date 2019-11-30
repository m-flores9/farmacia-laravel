<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_detalle_factura
 * @property int $id_factura
 * @property int $id_producto
 * @property int $cantidad
 * @property float $subtotal
 * @property Factura $factura
 * @property Producto $producto
 */
class DetalleFactura extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_factura';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_detalle_factura';

    /**
     * @var array
     */
    protected $fillable = ['id_factura', 'id_producto', 'cantidad', 'subtotal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factura()
    {
        return $this->belongsTo('App\Factura', 'id_factura', 'id_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto', 'id_producto');
    }
    public $timestamps = false;
}
