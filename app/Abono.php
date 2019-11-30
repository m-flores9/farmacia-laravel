<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_obono
 * @property int $id_compra
 * @property string $fecha_abono
 * @property float $monto_abono
 * @property OrdenCompra $ordenCompra
 */
class Abono extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abono';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_obono';

    /**
     * @var array
     */
    protected $fillable = ['id_compra', 'fecha_abono', 'monto_abono'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenCompra()
    {
        return $this->belongsTo('App\OrdenCompra', 'id_compra', 'id_compra');
    }
    public $timestamps = false;
}
