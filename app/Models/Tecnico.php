<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnico
 * 
 * @property int $idtecnico
 * @property string $nombre_tec
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Tecnico extends Model
{
	protected $table = 'tecnico';
	protected $primaryKey = 'idtecnico';
	public $timestamps = false;

	protected $fillable = [
		'nombre_tec'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idTec');
	}
}
