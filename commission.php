<?php
require_once __DIR__ . '/vendor/autoload.php';

use Chasj\CommissionTask\Service\CommissionProcess;

if (count($argv) != 2) {
    return print("Usage: php commission.php CSV_FILE\n");
}
list($_, $file) = $argv;
if (!file_exists($file)) {
    return print("File does not exists");
}
$fileInfo = pathinfo($file);
if ($fileInfo['extension'] !== 'csv') {
    return print("Input file should only be CSV file");
}

$process = new CommissionProcess($file);
$process->run();
