<?php


namespace App;

class ActiveRecord
{

    /* Database */
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    /* Errores */
    protected static $errores;

    public static function getErrores()
    {
        return static::$errores;
    }

    public static function setError($campo, $mensaje)
    {
        static::$errores[$campo] = $mensaje;
    }

    /* Validación */
    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    /* Base de datos */
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    /* Mostrar */
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id} LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla;
        $query .= " WHERE {$columna}  = '{$valor}'";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {

        $resultado = self::$db->query($query);
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    public static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    /* Crear */

    public function crear()
    {
        $atributos = $this->sanitizar();

        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "');";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?result=1');
        }
    }

    public function atributos()
    {
        $atributos = [];

        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizar()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    /* Actualizar */
    public function actualizar()
    {
        $atributos = $this->sanitizar();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = " . static::$db->escape_string($this->id);
        $query .= " LIMIT 1; ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?result=2');
        }
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    /* Eliminar */
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id);
        $query .= " LIMIT 1;";

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?result=3');
        }
    }

    /* Imagenes */
    public function setImagen($image)
    {
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        if ($image) {
            $this->image = $image;
        }
    }

    public function borrarImagen()
    {
        $existeImagen = file_exists(IMAGES_URL . $this->image);

        if ($existeImagen) {
            unlink(IMAGES_URL . $this->image);
        }
    }
}
