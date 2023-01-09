<?php

session_start();

$message = '';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Prenesite') {

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        // uploaded file details

        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];

        $fileName = $_FILES['uploadedFile']['name'];

        $fileSize = $_FILES['uploadedFile']['size'];

        $fileType = $_FILES['uploadedFile']['type'];

        $fileNameCmps = explode(".", $fileName);

        $fileExtension = strtolower(end($fileNameCmps));

        //Country selection

        $selectedCountry = $_POST['country'];

        // removing extra spaces

        $newFileName = $selectedCountry . '.' . $fileExtension;

        // file extensions allowed

        $allowedfileExtensions = array('xls', 'xlsx');

        if (in_array($fileExtension, $allowedfileExtensions)) {

            // directory where file will be moved

            $uploadFileDirDev = '../tablice/';
            $uploadFileDirProd = '(__DIR__."/tablice/")';

            $dest_path = $uploadFileDirDev . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                $message = 'Uspješno ste učitali tablicu.';
                $color = 'w3-green';
            } else {

                $message = 'Dogodila se greška prilikom učitavanja tablice. Ensure that the web server has access to write in the path directory. ' . $uploadFileDirDev;
                $color = 'w3-red';
            }
        } else {

            $message = 'Niste odabrali ispravan tip datoteke. <br>Dozvoljeni tipovi datoteka su: ' . implode(',', $allowedfileExtensions);
            $color = 'w3-red';
        }
    } else {

        $message = 'Dogodila se greška prilikom učitavanja tablice.<br>';

        $message .= 'Greška:' . $_FILES['uploadedFile']['error'];

        $color = 'w3-red';
    }
}

$_SESSION['message'] = $message;
$_SESSION['color'] = $color;

header("Location: ../index.php");
