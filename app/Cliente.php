<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_cliente
 * @property string $nit_cliente
 * @property string $nombre_cliente
 * @property string $direccion_cliente
 * @property Factura[] $facturas
 */
class Cliente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_cliente';

    /**
     * @var array
     */
    protected $fillable = ['nit_cliente', 'nombre_cliente', 'direccion_cliente'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Factura', 'id_cliente', 'id_cliente');
    }
}
