<?php

include_once("..\models\chat.php");

$model = new chat();

$data = $model->getAuthorNames();

// remove the duplicates
$data = array_unique($data);

// echo the data seperated by a comma
echo implode(", ", $data);
