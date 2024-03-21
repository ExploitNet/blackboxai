<?php
/* 
@ExploitNeT
@ImSoheilOfficial
Usage : example.com/blackboxai.php?text=Hello&mode=1
*/
$txt = $_GET['text'];
$mode = $_GET['mode'];
if($mode == '1'){
	$webk = true;
} else {
	$webk = false;
}
header('Content-type: application/json; charset=utf-8');

$url = 'https://www.blackbox.ai/api/chat';

$data = [
    'messages' => [
        [
            'id' => '6cdrFCv',
            'content' => $txt,
            'role' => 'user'
        ]
    ],
    'id' => '6clrFCv',
    'previewToken' => null,
    'userId' => '0d264665-73ae-498f-aa3f-4b7b65997963',
    'codeModelMode' => true,
    'agentMode' => [],
    'trendingAgentMode' => [],
    'isMicMode' => false,
    'isChromeExt' => false,
    'githubToken' => null,
	'webSearchMode' => $webk,// mode 
	'maxTokens' => "10240"
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
if ($result === false) {
    echo "Error: " . curl_error($ch);
} else {
	        echo json_encode([
            'status' => true,
			'Creator' => "@ExploitNeT - @ImSoheilOfficial",
            'data' => $result,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
		
}

curl_close($ch);
?>