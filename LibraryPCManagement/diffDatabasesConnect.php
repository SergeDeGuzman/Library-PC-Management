<?php

$servername = 'localhost';
$username = 'LibraryPCSLOT';
$password = 'library_PCSLOT';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}
