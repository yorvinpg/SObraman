<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TTrabajo
 * 
 * @property int $idtrabajo
 * @property string $nom_trab
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class TTrabajo extends Model
{
	protected $table = 't_trabajo';
	protected $primaryKey = 'idtrabajo';
	public $timestamps = false;

	protected $fillable = [
		'nom_trab'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idTipo');
	}
}
