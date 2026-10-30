<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

// Get the user's topic from the frontend
$rawInput = file_get_contents('php://input');
$data = json_decode($rawInput, true);

// If the request is not JSON, try parsing as URL-encoded form data
if (!is_array($data)) {
    parse_str($rawInput, $parsed);
    $data = $parsed;
}

$topic = isset($data['topic']) ? trim((string)$data['topic']) : 'General Trivia';


// 1. Paste your Free Groq API Key here
$apiKey = "API_KEY";

// 2. Groq Settings (Using the stable Llama 3 model)
$url = "https://api.groq.com/openai/v1/chat/completions";
$model = "llama-3.1-8b-instant";

// 3. Prompt instructing the AI to output perfect JSON
$prompt = "Create a quiz about $topic containing exactly 5 multiple-choice questions. 
Return your response ONLY as a raw JSON object matching this structure:
{
  \"questions\": [
    {
      \"question\": \"The text of the question?\",
      \"options\": [\"Option A\", \"Option B\", \"Option C\", \"Option D\"],
      \"correct\": 0
    }
  ]
}
Do not wrap your answer in markdown code blocks like ```json. Return ONLY the raw JSON string starting with { and ending with }.";

//  print_r($);

// 4. Construct the Payload
$payload = [
    "model" => "llama-3.1-8b-instant",
    "messages" => [
        [
            "role" => "user",
            "content" => $prompt
        ]
    ],
    "temperature" => 0.7
];

// 5. Run the cURL request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $apiKey
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 6. Return response back to app.js
if ($httpCode === 200) {
    $responseData = json_decode($response, true);
    $aiTextResponse = $responseData['choices'][0]['message']['content'];

    // Clean up any stray spaces/newlines and output
    echo trim($aiTextResponse);
} else {
    echo json_encode([
        "error" => "Groq API request failed",
        "http_code" => $httpCode,
        "raw_response" => json_decode($response, true)
    ]);
}
