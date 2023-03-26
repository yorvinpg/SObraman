<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criticidad
 * 
 * @property int $idcriticidad
 * @property string $tipoC
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Criticidad extends Model
{
	protected $table = 'criticidad';
	protected $primaryKey = 'idcriticidad';
	public $timestamps = false;

	protected $fillable = [
		'tipoC'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idCriti');
	}
}
