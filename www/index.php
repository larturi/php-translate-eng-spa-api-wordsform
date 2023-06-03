<?php

require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

// Allow requests from specific origins
// header('Access-Control-Allow-Origin: https://next-words-form.vercel.app');
header('Access-Control-Allow-Origin: http://localhost:32000');

// Allow specific HTTP methods
header('Access-Control-Allow-Methods: GET');

// Allow specific headers
header('Access-Control-Allow-Headers: Content-Type');


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
        'error' => 'No se proporcionó la palabra en inglés. Ej: http://localhost:81/?word=love'
    );

    header('Content-Type: application/json');

    echo json_encode($response);
}
?>
