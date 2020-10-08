<?php
header("Content-Type: text/plain");

$bdd = new Bdd();
$dns = Dns::getDNS($bdd,$url_params['ip']);

echo json_encode($dns);