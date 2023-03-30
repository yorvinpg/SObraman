<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $idestado
 * @property string $nombrE
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
}
