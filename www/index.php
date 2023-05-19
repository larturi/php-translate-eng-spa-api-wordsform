<?php

require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

if (isset($_GET['word'])) {
    $source = 'en';
    $target = 'es';
    $text = $_GET['word'];

    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    $response = array(
        'word' => $text,
        'translation' => $result
    );

    header('Content-Type: application/json');

    echo json_encode($response);
} else {
    $response = array(
        'error' => 'No se proporcionó la palabra en inglés'
    );

    header('Content-Type: application/json');

    echo json_encode($response);
}
?>
