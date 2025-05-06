<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class UserModel
 * Modelo para gestionar usuarios.
 */
class UserModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'users';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = ['username', 'email', 'nombre_completo', 'apellidos', 'password', 'avatar', 'is_admin'];

    /**
     * @var bool Usa timestamps automáticos.
     */
    protected $useTimestamps = true;
}
