<?php
$name = $_POST['name']; 
$username = $_POST['username']; 
$email = $_POST['email']; 
$city = $_POST['city']; 
$street = $_POST['street']; 
$zipCode = $_POST['zipCode']; 
$phone = $_POST['phone']; 
$companyName = $_POST['companyName'];

// Getting JSON string
$jsonString = file_get_contents('../dataset/users.json');
if($jsonString){

    // Decoding JSON string
    $dataDecode = json_decode($jsonString, true);
    $maxId = 1;

    // Getting max ID
    for ($i = 0; $i < count($dataDecode); $i++) {
        if($maxId < $dataDecode[$i]['id']) {
            $maxId = $dataDecode[$i]['id'];
        };
    }

    // Object constructor
    $newMaxId = $maxId + 1;
    $newObject = [
        "id" => $newMaxId,
        "name" => $name,
        "username" => $username,
        "email" => $email,
        "address" => [
            "street" => $street,
            "suite" => "",
            "city" => $city,
            "zipcode" => $zipCode,
            "geo" => [
                "lat" => "",
                "lng" => ""
            ]
        ],
        "phone" => $phone,
        "website" => "",
        "company" => [
            "name" => $companyName,
            "catchPhrase" => "",
            "bs" => ""
        ]
    ];

    // Pushing new object to JSON string
    $dataDecode[] = $newObject;

    // Encoding
    $newJsonString = json_encode($dataDecode, JSON_PRETTY_PRINT);

    // Put new JSON string to users.json
    file_put_contents('../dataset/users.json', $newJsonString);

    echo 'JSON object added';

}else{
    echo 'JSON not found';
}

?>