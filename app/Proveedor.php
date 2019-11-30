<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_proveedor
 * @property string $nombre_proveedor
 * @property string $direccion_proveedor
 * @property string $telefono_proveedor
 * @property string $correo_proveedor
 * @property string $cuentas_bancarias
 * @property OrdenCompra[] $ordenCompras
 * @property VisitadorMedico[] $visitadorMedicos
 */
class Proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedor';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_proveedor';

    /**
     * @var array
     */
    protected $fillable = ['nombre_proveedor', 'direccion_proveedor', 'telefono_proveedor', 'correo_proveedor', 'cuentas_bancarias'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenCompras()
    {
        return $this->hasMany('App\OrdenCompra', 'id_proveedor', 'id_proveedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitadorMedicos()
    {
        return $this->hasMany('App\VisitadorMedico', 'id_proveedor', 'id_proveedor');
    }
    public $timestamps = false;
}
