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
 * @property int $idEstado
 * @property int $idArea
 * @property int $idEncarg
 * @property int|null $idTec
 * @property string|null $detallSP
 * @property string|null $detallAnu
 * @property Carbon|null $fechaAnu
 * @property Carbon|null $fechaCierre
 * @property string $modu
 * 
 * @property Area $area
 * @property Criticidad $criticidad
 * @property Encargado $encargado
 * @property Especialidad $especialidad
 * @property Estado $estado
 * @property Tecnico|null $tecnico
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
		'fecha' => 'datetime:Y-m-d',
		'telefono' => 'int',
		'idTipo' => 'int',
		'idEsp' => 'int',
		'idCriti' => 'int',
		'idUbi' => 'int',
		'idEstado' => 'int',
		'idArea' => 'int',
		'idEncarg' => 'int',
		'idTec' => 'int',
		'fechaAnu' => 'datetime:Y-m-d',
		'fechaCierre' => 'datetime:Y-m-d'
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
		'detalle',
		'idEstado',
		'idArea',
		'idEncarg',
		'idTec',
		'detallSP',
		'detallAnu',
		'fechaAnu',
		'fechaCierre',
		'modu'
	];

	public function area()
	{
		return $this->belongsTo(Area::class, 'idArea');
	}

	public function criticidad()
	{
		return $this->belongsTo(Criticidad::class, 'idCriti');
	}

	public function encargado()
	{
		return $this->belongsTo(Encargado::class, 'idEncarg');
	}

	public function especialidad()
	{
		return $this->belongsTo(Especialidad::class, 'idEsp');
	}

	public function estado()
	{
		return $this->belongsTo(Estado::class, 'idEstado');
	}

	public function tecnico()
	{
		return $this->belongsTo(Tecnico::class, 'idTec');
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
