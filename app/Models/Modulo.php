<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Modulo
 * 
 * @property int $idmodulo
 * @property string $nombre_M
 * @property string $abrev
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Modulo extends Model
{
	protected $table = 'modulos';
	protected $primaryKey = 'idmodulo';
	public $timestamps = false;

	protected $fillable = [
		'nombre_M',
		'abrev'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'idmod');
	}
}
