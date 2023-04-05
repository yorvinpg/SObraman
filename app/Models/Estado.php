<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $idestado
 * @property string $nombrE
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Estado extends Model
{
	protected $table = 'estado';
	protected $primaryKey = 'idestado';
	public $timestamps = false;

	protected $fillable = [
		'nombrE'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idEstado');
	}
}
