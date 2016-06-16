<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://bingapis.azure-api.net/api/v5/images/search');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => '27fad80fd63b40fca252fd2efab02582',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'q' => $_GET['q'],
    'count' => '10',
    'offset' => '0',
    'mkt' => 'pt-br',
    'safeSearch' => 'Moderate',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>
