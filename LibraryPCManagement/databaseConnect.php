<?php

$servername = 'localhost';
$username = 'LibraryPCSLOT';
$password = 'library_PCSLOT';
$dbname = 'librarypc_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}
