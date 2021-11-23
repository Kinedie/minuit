<?php

require './config.php';

class Contact
{
    /** @var int */
    public $id;

    /** @var int */
    public $phone;

    /** @var string */
    public $address;

    /** @var string */
    public $opening;
}

$dsn = 'mysql:dbname=' . APP_DB_NAME . ';host=' . APP_DB_HOST . ':' . APP_DB_PORT;
$user = APP_DB_USER;
$password = APP_DB_PWD;

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connected, babey';
} catch (PDOException $e) {
    echo 'Failed connection : ' . $e->getMessage();
}

$statement = $db->query('SELECT * FROM contact_information');
$data = $statement->fetchObject(Contact::class, []);

echo "<p>" . $data->phone . "</p>";
