<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_visitador
 * @property int $id_proveedor
 * @property string $nombre_vistador
 * @property string $telefono_visitador
 * @property string $correo_visitador
 * @property Proveedor $proveedor
 */
class VisitadorMedico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'visitador_medico';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_visitador';

    /**
     * @var array
     */
    protected $fillable = ['id_proveedor', 'nombre_vistador', 'telefono_visitador', 'correo_visitador'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'id_proveedor', 'id_proveedor');
    }
    public $timestamps = false;
}
