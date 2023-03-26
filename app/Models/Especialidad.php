<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidad
 * 
 * @property int $idespecialidad
 * @property string $nom_espe
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Especialidad extends Model
{
	protected $table = 'especialidad';
	protected $primaryKey = 'idespecialidad';
	public $timestamps = false;

	protected $fillable = [
		'nom_espe'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idEsp');
	}
}
