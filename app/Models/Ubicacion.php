<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ubicacion
 * 
 * @property int $idubicacion
 * @property string $nom_ubi
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Ubicacion extends Model
{
	protected $table = 'ubicacion';
	protected $primaryKey = 'idubicacion';
	public $timestamps = false;

	protected $fillable = [
		'nom_ubi'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idUbi');
	}
}
