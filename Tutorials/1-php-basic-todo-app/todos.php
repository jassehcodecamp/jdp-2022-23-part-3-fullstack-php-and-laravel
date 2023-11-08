<?php

$todoDB = "./todos.json";

$todos = file_get_contents($todoDB);

$todos = json_decode($todos, true);
