<?php

$jsonString = file_get_contents('dataset/users.json');
if($jsonString){

    $dataDecode = json_decode($jsonString, true);
    // Table column names
    echo "
        <div class='columns'>
            <div class='name'>Name</div>
            <div class='username'>Username</div>
            <div class='email'>Email</div>
            <div class='address'>Address</div>
            <div class='phone'>Phone</div>
            <div class='company'>Company</div>
            <button class='addUserButton' id='addUserButton'>Add User</button>
        </div>
        ";
    // Table rows
    for ($i = 0; $i < count($dataDecode); $i++) {
        echo "
            <div class='userInfo'>
                <div class='name'>" . $dataDecode[$i]['name'] . "</div>
                <div class='username'>" . $dataDecode[$i]['username'] . "</div>
                <div class='email'>" . $dataDecode[$i]['email'] . "</div>
                <div class='address'>" . $dataDecode[$i]['address']['street'] . ", "
                . $dataDecode[$i]['address']['zipcode'] . " "
                . $dataDecode[$i]['address']['city'] . "</div>
                <div class='phone'>" . $dataDecode[$i]['phone'] . "</div>
                <div class='company'>" . $dataDecode[$i]['company']['name'] . "</div>
                <button class='removeUserButton' id='remove_" . $dataDecode[$i]['id'] . "'  onclick='removeUser(this)'>Remove</button>
            </div>
        ";
    }
}else{
    echo 'JSON not found';
}

?>