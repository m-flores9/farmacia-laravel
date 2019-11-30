<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_casa_medica
 * @property string $nombre_casa_medica
 * @property Producto[] $productos
 */
class CasaMedica extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'casa_medica';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_casa_medica';

    /**
     * @var array
     */
    protected $fillable = ['nombre_casa_medica'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_casa_medica', 'id_casa_medica');
    }
    public $timestamps = false;
}
