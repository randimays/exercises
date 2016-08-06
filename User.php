<?php

// Create a User class that extends Model. Add a protected static property to both classes. This property will let our model know which db table we will be representing. The User class should override the Model's static table with "users".

require "Model.php";

class User extends Model {
	protected static $table = "users";
}

echo User::getTableName() . PHP_EOL;