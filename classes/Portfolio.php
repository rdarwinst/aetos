<?php

namespace App;

class Portfolio extends ActiveRecord
{
    protected static $tabla = 'portfolio';
    protected static $columnasDB = ['id', 'title', 'brand', 'description', 'country', 'service', 'image'];

    public $id;
    public $title;
    public $brand;
    public $description;
    public $country;
    public $service;
    public $image;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->brand = $args['brand'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->country = $args['country'] ?? '';
        $this->service = $args['service'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    public function validar()
    {
        if (!$this->title) {
            self::$errores['title'] = 'This field cannot be empty. Please provide a project name.';
        }
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
