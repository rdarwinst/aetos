<?php

namespace App;

class Slider extends ActiveRecord
{
    protected static $tabla = 'slider';
    protected static $columnasDB = ['id', 'title', 'represents', 'image'];

    public $id;
    public $title;
    public $represents;
    public $image;
    public $created;
    public $updated;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->represents = $args['represents'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->created = $args['created'] ?? '';
        $this->updated = $args['updated'] ?? '';
    }

    public function validar()
    {
        if (!$this->title) {
            self::$errores['title'] = 'Title is required for the slide.';
        }
        if (!$this->represents) {
            self::$errores['represents'] = 'Please describe the meaning of the image for the slide.';
        }
        if (!$this->image) {
            self::$errores['image'] = 'Image is required. Please upload an image for the slide.';
        }

        return self::$errores;
    }
}
