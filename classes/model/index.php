<?php
#header("location:..".DIRECTORY_SEPARATOR);

use classes\model\Upload;

require "Upload.php";

$u = new Upload();
$u->foto = $_FILES['imagem'];
$u->size = 5000000;
$u->dir = "Teste";

if ($_FILES['imagem']['error'] = 0) {

    print_r($u->sendImage());
} else {
    print_r($_FILES['imagem']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="imagem">
        <button>Upload</button>
    </form>
</body>

</html>