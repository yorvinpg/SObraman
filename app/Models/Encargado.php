<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Encargado
 * 
 * @property int $idencargado
 * @property string $nom_E
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Encargado extends Model
{
	protected $table = 'encargado';
	protected $primaryKey = 'idencargado';
	public $timestamps = false;

	protected $fillable = [
		'nom_E'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idEncarg');
	}
}
