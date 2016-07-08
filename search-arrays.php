<?php

$names = ["Tina", "Dana", "Mike", "Amy", "Adam"];

$compare = ["Tina", "Dean", "Mel", "Amy", "Michael"];

$search = "Tina";

var_dump(array_search($search, $names, true));
