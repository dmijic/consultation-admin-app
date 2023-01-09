<?php /** @noinspection ForgottenDebugOutputInspection */

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/SimpleXLSX.php';

if ($xlsx = SimpleXLSX::parse('../tablice/bosna.xlsx')) {
    echo json_encode($xlsx->rows());
} else {
    echo SimpleXLSX::parseError();
}