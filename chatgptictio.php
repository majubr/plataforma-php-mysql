<html>
<?php include "header.php"; ?>
<body>
    <div class="container">
        <br>
        <br>
        <?php
        $sp = $_GET['sp'] ?? ''; // Get the 'sp' parameter from the URL or set it to an empty string if not present
        ?>
        <h1 align="left" class="display-5 mb-4" style="font-size: 50px">ChatGPT - OPEN AI</h1>
        <br>
        <br>
        <?php if (!empty($sp)): ?>
            <h4 align="left" class="display-5 mb-4" style="font-size: 30px">Espécie <i><?= $sp ?></i></h4>
            <br>
            <div align="left" class="display-5 mb-4" style="font-size: 25px">
            <?php
$sp = $_GET['sp'] ?? '';

if (!empty($sp)) {
    $dTemperature = 0.7;
    $iMaxTokens = 276;
    $top_p = 1;
    $frequency_penalty = 0.0;
    $presence_penalty = 0.0;
    $OPENAI_API_KEY = "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";
    $sModel = "text-davinci-003";
    $prompt = 'Descreva ' . $sp;

    $ch = curl_init('https://api.openai.com/v1/completions');
    $headers = [
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: Bearer ' . $OPENAI_API_KEY
    ];

    $postData = [
        'model' => $sModel,
        'prompt' => $prompt,
        'temperature' => $dTemperature,
        'max_tokens' => $iMaxTokens,
        'top_p' => $top_p,
        'frequency_penalty' => $frequency_penalty,
        'presence_penalty' => $presence_penalty,
        'stop' => '["Human:", "AI:"]'
    ];

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $result = curl_exec($ch);

    if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        $decoded_json = json_decode($result, true);
        if (isset($decoded_json['choices'][0]['text'])) {
            echo $decoded_json['choices'][0]['text'];
        } else {
            echo 'No valid response from the AI model.';
        }
    }

    curl_close($ch);
} else {
    echo 'No species information provided.';
}
?>

            </div>
        <?php else: ?>
            <p>No species information provided.</p>
        <?php endif; ?>
    </div><!-- /container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
  <br>
  <div align="center">
                  <a href="dash_avi.php?pagina=especie" role="button" class = "btn btn-light btn-lg"> Voltar </a>
      </div>
<br>
    <?php include 'footer.php'; ?>
</body>
</html>
