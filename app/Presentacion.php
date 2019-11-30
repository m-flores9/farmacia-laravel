<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_presentacion
 * @property string $nombre_presentacion
 * @property Producto[] $productos
 */
class presentacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'presentacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_presentacion';

    /**
     * @var array
     */
    protected $fillable = ['nombre_presentacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_presentacion', 'id_presentacion');
    }
    public $timestamps = false;
}
