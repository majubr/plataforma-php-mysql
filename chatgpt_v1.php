<?php
require_once 'composer/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;
$api = "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";
$open_ai = new OpenAi($api);
$complete = $open_ai->complete([
    'engine' => 'davinci',
    'prompt' => 'Descreva Puma concolor',
    'temperature' => 0.7,
    'max_tokens' => 200,
    'coherence' => 0.7,
    'frequency_penalty' => 0,
    'presence_penalty' => 0
]);
$obj = json_decode($complete);
print_r($obj->choices[0]->text);
?>