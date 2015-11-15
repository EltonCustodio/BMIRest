<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
    echo "Welcome to REST API";
});

//Get bmi
$app->get('/tasks/:weight/:height', function($weight,$height) use ( $app ) {
        
        $bmi = $weight/($height * $height);
        echo "weight = $weight";
        echo "height = $height";
        echo "BMI = $bmi";
});


$app->run();
?>