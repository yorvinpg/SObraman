<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $idarea
 * @property string $nombreA
 * 
 * @property Collection|Solicitudot[] $solicitudots
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'area';
	protected $primaryKey = 'idarea';
	public $timestamps = false;

	protected $fillable = [
		'nombreA'
	];

	public function solicitudots()
	{
		return $this->hasMany(Solicitudot::class, 'idArea');
	}
}
