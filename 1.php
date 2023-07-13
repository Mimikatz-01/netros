<?php

    header('Access-Control-Allow-Origin: https://my.offerrum.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: z-csrf-token');

//$fileValue = file_get_contents('secondFile.txt');
//echo $fileValue;
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$out = $query['period'];

$b = $query['dateFrom'];
$c = $query['dateTo'];
$datetime1 = date_create_from_format('d.m.Y', $b);
$datetime2 = date_create_from_format('d.m.Y', $c);
$aa = date_format($datetime1, 'Y-m-d');
$bb = date_format($datetime2, 'Y-m-d');
$origin = date_create($aa);
$target = date_create($bb);
$interval = date_diff($origin, $target);
$out = $interval->format('%a');

switch ($out) {
    case day:
        $fileValue = file_get_contents('day.txt');
        echo $fileValue;
        break;
    case month:
        $fileValue = file_get_contents('month.txt');
        echo $fileValue;
        break;
    case week:
        $fileValue = file_get_contents('week.txt');
        echo $fileValue;
        break;
    case 1:
        $fileValue = file_get_contents('day_offer.txt');
        echo $fileValue;
        break;
    case 6:
        $fileValue = file_get_contents('week_offer.txt');
        echo $fileValue;
        break;
    case 7:
        $fileValue = file_get_contents('week_offer.txt');
        echo $fileValue;
        break;
    default:
        if ($out > 27){
            $fileValue = file_get_contents('month_offer.txt');
        echo $fileValue;
        
        break;
        }
        
}



?>