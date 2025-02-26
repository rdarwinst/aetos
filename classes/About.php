<?php

namespace App;

class About extends ActiveRecord
{
    protected static $tabla = 'about_aetos';
    protected static $columnasDB = ['id', 'section', 'title', 'content'];

    public $id;
    public $section;
    public $title;
    public $content;
    public $created;
    public $updated;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->section = $args['section'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->content = $args['content'] ?? '';
    }

    public function validar()
    {
        if (!$this->section) {
            self::$errores['section'] = 'The title cannot be empty. Please provide a title for this section.';
        }
        if (!$this->title) {
            self::$errores['title'] = 'The title cannot be empty. Please provide a title.';
        }

        if (!$this->content || strlen($this->content) > 450) {
            self::$errores['content'] = 'Content cannot be empty and must not exceed 450 characters. Please ensure the text is within the limit.';
        }

        return self::$errores;
    }
}
