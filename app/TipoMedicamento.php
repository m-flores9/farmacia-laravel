<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_medicamento
 * @property string $nombre_tipo_med
 * @property Producto[] $productos
 */
class TipoMedicamento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_medicamento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_tipo_medicamento';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_med'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_tipo_medicamento', 'id_tipo_medicamento');
    }
    public $timestamps = false;
}
