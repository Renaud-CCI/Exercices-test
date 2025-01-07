<?php

namespace ExercicesPHPUnit\class\App;

class Article {

	public $title;

    public function __construct() {
        $this->title = '';
    }

	public function getSlug() {

		$title = $this->title;

		$title = preg_replace('/\s+/','_',$title);

		$title = preg_replace('/[^\w]+/','',$title);

		return trim($title, "_");
	}

    public function getTitle() {
        return $this->title;
    }
}
