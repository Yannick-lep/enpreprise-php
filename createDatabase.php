<?php
include 'functions.php';
require 'connexiondb.php';

createDatabase($pdo, 'entreprise.sql');

redirect('/index.php');
?>