<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_producto
 * @property int $id_tipo_medicamento
 * @property int $id_casa_medica
 * @property int $id_presentacion
 * @property string $barcode
 * @property string $nombre_producto
 * @property string $composicion
 * @property string $fecha_vencimiento
 * @property int $existencia
 * @property float $precio_venta
 * @property float $precio_costo
 * @property string $descripcion
 * @property string $estado
 * @property TipoMedicamento $tipoMedicamento
 * @property CasaMedica $casaMedica
 * @property Presentacion $presentacion
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleFactura[] $detalleFacturas
 */
class producto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'producto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_producto';

    /**
     * @var array
     */
    protected $fillable = ['id_tipo_medicamento', 'id_casa_medica', 'id_presentacion', 'barcode', 'nombre_producto', 'composicion', 'fecha_vencimiento', 'existencia', 'precio_venta', 'precio_costo', 'descripcion', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoMedicamento()
    {
        return $this->belongsTo('App\TipoMedicamento', 'id_tipo_medicamento', 'id_tipo_medicamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function casaMedica()
    {
        return $this->belongsTo('App\CasaMedica', 'id_casa_medica', 'id_casa_medica');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presentacion()
    {
        return $this->belongsTo('App\Presentacion', 'id_presentacion', 'id_presentacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\DetalleCompra', 'id_producto', 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturas()
    {
        return $this->hasMany('App\DetalleFactura', 'id_producto', 'id_producto');
    }
    public $timestamps = false;
}
