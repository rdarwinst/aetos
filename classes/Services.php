<?php

namespace App;

class Services extends  ActiveRecord
{
    protected static $tabla = 'services';
    protected static $columnasDB = ['id', 'name', 'description', 'image'];

    public $id;
    public $name;
    public $description;
    public $image;
    public $created;
    public $updated;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    public function validar()
    {
        if (!$this->name) {
            self::$errores['name'] = 'The service name is required. Please enter a name.';
        }
        if (!$this->description) {
            self::$errores['description'] = 'Description or features are required. Please provide details.';
        }
        if (!$this->image) {
            self::$errores['image'] = 'An image is required. Please upload a file.';
        }
        return self::$errores;
    }
}
