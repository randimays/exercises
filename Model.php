<?php

// Create a Model class with a private attributes array. Use setters/getters to create/retrieve key/value pairs from the array.

class Model {
	private $attributes = [];
	protected static $table;

	public function __set($key, $value) {
		$this->attributes[$key] = $value;
	}

	public function __get($key) {
		if (array_key_exists($key, $this->attributes)) {
			return $this->attributes[$key];
		}
		return null;
	}

	public static function getTableName() {
		return static::$table;
	}
}

$model = new Model();

$model->name = "Peter Parker";
$model->alias = "Spider-Man";
$model->groceryList = ["web", "spandex", "lens cleaner"];
$model->age = 21;

echo $model->name;