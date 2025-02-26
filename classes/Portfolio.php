<?php

namespace App;

class Portfolio extends ActiveRecord
{
    protected static $tabla = 'portfolio';
    protected static $columnasDB = ['id', 'brand', 'description', 'country', 'image', 'service'];

    public $id;
    public $brand;
    public $description;
    public $country;
    public $image;
    public $service;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->brand = $args['brand'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->country = $args['country'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->service = $args['service'] ?? '';
    }

    public function validar()
    {
        if (!$this->brand) {
            self::$errores['brand'] = 'This field cannot be empty. Please provide a brand name.';
        }
        if (!$this->description) {
            self::$errores['description'] = 'This field cannot be empty. Please provide a description of the work done.';
        }
        if (!$this->country) {
            self::$errores['country'] = 'This field cannot be empty. Please select a country.';
        }
        if (!$this->image) {
            self::$errores['image'] = 'This field cannot be empty. Please upload an image.';
        }
        if (!$this->service) {
            self::$errores['service'] = 'Please select at least one service.';
        }
        return self::$errores;
    }
}
