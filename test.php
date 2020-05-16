<?php
//Write string preparation function, which fill template in with data from
// specified object

function getApiPath(object $user, string $template): string
{
    $result = $template;
    foreach ($user as $key => $value) {
        $pattern = '/%' . $key . '%/';
        $result = preg_replace($pattern, $value, $result);
        $result = str_replace(' ', '%', $result);
    }
    return $result;
}

//task №1
//Expected result: /api/items/20/test
$user = (object)[
    'id' => 20,
    'type_id' => 'test'
];

$template = "/api/items/%id%/%type_id%";
echo getApiPath($user, $template), PHP_EOL;

//task №2
//expected:
//["/api/items/20/John%20Dow","/api/items/20/QA","/api/items/20/100"]
$user = (object)[
    'id' => 20,
    'name' => "John Dow",
    'role' => "QA",
    'salary' => 100
];

$apiTemplatesSet1 = [
    "/api/items/%id%/%name%",
    "/api/items/%id%/%role%",
    "/api/items/%id%/%salary%"
];
$apiPathes = $apiTemplatesSet1;
foreach ($apiPathes as $key => $value) {
    $apiPathes[$key] = getApiPath($user, $value);
}

$result = json_encode($apiPathes, JSON_UNESCAPED_SLASHES);
echo $result;
