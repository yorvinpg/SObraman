<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitudot
 * 
 * @property int $idsolicitudOT
 * @property Carbon $fecha
 * @property string $solicitante
 * @property string $email
 * @property int $telefono
 * @property int $idTipo
 * @property int $idEsp
 * @property int $idCriti
 * @property int $idUbi
 * @property string $referencia
 * @property string $descripcion
 * @property string $detalle
 * 
 * @property Criticidad $criticidad
 * @property Especialidad $especialidad
 * @property TTrabajo $t_trabajo
 * @property Ubicacion $ubicacion
 *
 * @package App\Models
 */
class Solicitudot extends Model
{
	protected $table = 'solicitudot';
	protected $primaryKey = 'idsolicitudOT';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'date',
		'telefono' => 'int',
		'idTipo' => 'int',
		'idEsp' => 'int',
		'idCriti' => 'int',
		'idUbi' => 'int'
	];

	protected $fillable = [
		'fecha',
		'solicitante',
		'email',
		'telefono',
		'idTipo',
		'idEsp',
		'idCriti',
		'idUbi',
		'referencia',
		'descripcion',
		'detalle'
	];

	public function criticidad()
	{
		return $this->belongsTo(Criticidad::class, 'idCriti');
	}

	public function especialidad()
	{
		return $this->belongsTo(Especialidad::class, 'idEsp');
	}

	public function t_trabajo()
	{
		return $this->belongsTo(TTrabajo::class, 'idTipo');
	}

	public function ubicacion()
	{
		return $this->belongsTo(Ubicacion::class, 'idUbi');
	}
}
