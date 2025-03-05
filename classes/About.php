<?php

namespace App;

class About extends ActiveRecord
{
    protected static $tabla = 'about_aetos';
    protected static $columnasDB = ['id', 'section', 'title', 'content', 'file'];

    public $id;
    public $section;
    public $title;
    public $content;
    public $file;
    public $created;
    public $updated;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->section = $args['section'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->file = $args['file'] ?? '';
    }

    public function validar()
    {
        if (!$this->section) {
            self::$errores['section'] = 'The title cannot be empty. Please provide a title for this section.';
        }
        if (!$this->title) {
            self::$errores['title'] = 'The title cannot be empty. Please provide a title.';
        }

        if (!$this->content || strlen($this->content) > 1000) {
            self::$errores['content'] = 'Content cannot be empty and must not exceed 1000 characters. Please ensure the text is within the limit.';
        }

        return self::$errores;
    }

    public function setFile($pdf)
    {
        if (!is_null($this->id)) {
            $this->borrarPDF();
        }
        if ($pdf) {
            $this->file = $pdf;
        }
    }

    public function borrarPDF()
    {
        $existePDF = file_exists(PORTFOLIO_URL . $this->file);

        if ($existePDF) {
            unlink(PORTFOLIO_URL . $this->file);
        }
    }
}
