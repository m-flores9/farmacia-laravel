<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_factura
 * @property int $id_cliente
 * @property string $no_factura
 * @property string $fecha_factura
 * @property float $total_factura
 * @property Cliente $cliente
 * @property DetalleFactura[] $detalleFacturas
 */
class Factura extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'factura';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_factura';

    /**
     * @var array
     */
    protected $fillable = ['id_cliente', 'no_factura', 'fecha_factura', 'total_factura'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturas()
    {
        return $this->hasMany('App\DetalleFactura', 'id_factura', 'id_factura');
    }
    public $timestamps = false;
}
