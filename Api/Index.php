<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
    echo "Welcome to REST API";
});

//Get bmi
//https://bmirest-eltoncustodio.c9users.io/Api/Index.php/bmi/100/1.90
$app->get('/bmi/:weight/:height', function($weight,$height) use ( $app ) {
        $bmi = $weight /($height * $height);
        $description = 0;
        if($bmi < 17)
                        $description = 'Muito Abaixo do Peso Ideal!';            
            else if($bmi > 17 && $bmi < 18.49)
                        $description = 'Abaixo do Peso Ideal!';
            else if($bmi > 18.50 && $bmi < 24.99)
                        $description = 'Peso na Faixa Ideal!';
            else if($bmi > 25 && $bmi < 29.99)
                        $description = 'Acima do Peso Ideal!';
            else if($bmi > 30 && $bmi < 34.99)
                        $description = 'Obesidade I!';
            else if($bmi > 35 && $bmi < 39.99)
                        $description = 'Obesidade II(Severa)!';
            else if($bmi > 40)
                      $description = 'Obesidade III(Morbida)!';
            else        
		$description = "";
		
		$result = array ("BMI= $bmi","Descrição= $description");
        $app->response()->header('Content-Type','application/json');
        echo json_encode($result);
});

getDescription: function ($bmi) {
	     	 if($bmi < 17)
                        return 'Muito Abaixo do Peso Ideal!';            
            else if($bmi > 17 && $bmi < 18.49)
                        return 'Abaixo do Peso Ideal!';
            else if($bmi > 18.50 && $bmi < 24.99)
                        return 'Peso na Faixa Ideal!';
            else if($bmi > 25 && $bmi < 29.99)
                        return 'Acima do Peso Ideal!';
            else if($bmi > 30 && $bmi < 34.99)
                        return 'Obesidade I!';
            else if($bmi > 35 && $bmi < 39.99)
                        return 'Obesidade II(Severa)!';
            else if($bmi > 40)
                      return 'Obesidade III(Morbida)!';
            else        
		return "";
	};

$app->run();
?>