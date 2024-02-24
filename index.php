<?php
$alert   = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $target_dir = "image_check/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    try {

        if (!isset($_FILES["img"]["tmp_name"]) || !file_exists($_FILES["img"]["tmp_name"])) {
            throw new Exception("Désolé, une erreur s'est produite lors du téléchargement de l'image.");
        } // Vérifie qu'une image a été charger avec le formulaire

        $check = getimagesize($_FILES["img"]["tmp_name"]);

        if ($imageFileType != "jpg") {
            throw new Exception( "Désolé, seuls les fichiers JPG sont autorisés.");
        }// Vérifie qu'une image est une extension JPG

        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir."img.jpg")) {
            throw new Exception( "L'image n'a pas pu être chargé.");
        }// Vérifie si l'image a bien été charger dans le dossier

        $python_virtualenv_interpreter = '.\.venv\Scripts\python.exe';
        $output = shell_exec("$python_virtualenv_interpreter D:\projets\DogsVSCats\script.py");

        preg_match('/\[\[(.*?)\]\]/', $output, $matches); // Récupère le pourcentage;
        $percent = floatval($matches[1]);

        if($percent > 0.5)
        {
            $animal = 'chien';
            $percent = ($percent - 0.5) / (1 - 0.5) * 100;
        } else {
            $animal = 'chat';
            $percent = (1 - $percent / 0.5) * 100;
        }

        $response =  "C'est un $animal à ".number_format($percent, 2)." %";
    } catch (Exception $exception) {
        $alert = $exception->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cats & Dogs</title>
</head>
<body class="p-5">
    <div class="container">
        <h1 class="text-center mb-5">Dogs & Cats</h1>

        <div class="d-flex flex-column align-items-center">
            <?php if(!is_bool($alert)) :?>
                <div class="alert alert-danger w-50" role="alert">
                    <?= $alert ?>
                </div>
            <?php endif;?>
            <form
                    method = "post"
                    enctype="multipart/form-data"
                    class="d-flex gap-3 w-50"
            >

                <input type="file" id="img" name="img" class="form-control form-control-lg" accept="image/jpeg" />

                <button type="submit" class="btn btn-primary btn-lg" value="Upload Image" name="submit">Envoyer</button>
            </form>
        </div>

        <?php if(isset($response)) :?>
            <div class="text-center mt-5">
                <img src="image_check/img.jpg" alt="animal" class="w-25">
                <p class="fs-5 mt-4"><?= $response ?></p>
            </div>
        <?php endif;?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

