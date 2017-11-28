<?php
require 'vendor/autoload.php';

if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    exit('upload error');
}

$optimizer = (new \ImageOptimizer\OptimizerFactory())->get();
$optimizer->optimize($_FILES['file']['tmp_name']);

$fp = fopen($_FILES['file']['tmp_name'], 'rb');
header("Content-Type: image/png");
header("Content-Length: " . filesize($_FILES['file']['tmp_name']));
fpassthru($fp);
