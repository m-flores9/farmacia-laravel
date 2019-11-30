<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_compra
 * @property int $id_proveedor
 * @property string $no_factura
 * @property string $fecha_compra
 * @property float $total_compra
 * @property float $pago_efectivo
 * @property float $pago_credito
 * @property string $fecha_pago
 * @property float $saldo_compra
 * @property Proveedor $proveedor
 * @property Abono[] $abonos
 * @property DetalleCompra[] $detalleCompras
 */
class OrdenCompra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orden_compra';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_compra';

    /**
     * @var array
     */
    protected $fillable = ['id_proveedor', 'no_factura', 'fecha_compra', 'total_compra', 'pago_efectivo', 'pago_credito', 'fecha_pago', 'saldo_compra'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'id_proveedor', 'id_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonos()
    {
        return $this->hasMany('App\Abono', 'id_compra', 'id_compra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\DetalleCompra', 'id_compra', 'id_compra');
    }
    public $timestamps = false;
}
