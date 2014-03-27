<?php
$countUrls['facebook'] = 'https://api.facebook.com/method/fql.query?format=json&query=';
$countUrls['twitter'] = 'http://urls.api.twitter.com/1/urls/count.json?url=';
$countUrls['google'] = 'https://clients6.google.com/rpc';
$countUrls['pinterest'] = 'http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=';

$type = $_GET['type'];
$url = $_GET['url'];

switch ($type) {
    case 'facebook':
        $fql  = "SELECT share_count FROM link_stat WHERE url = '" . $url . "'";
        $apifql= $countUrls[$type] . urlencode($fql);
        $result = file_get_contents($apifql);
        $result = json_decode($result, true);
        echo intval($result[0]['share_count']);
        break;
    case 'twitter':
        $result = file_get_contents($countUrls[$type] . urlencode($url));
        $result = json_decode($result, true);
        echo intval($result['count']);
        break;
    case 'google':
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $countUrls[$type]);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $curl_results = curl_exec ($curl);
        curl_close ($curl);
        $result = json_decode($curl_results, true);
        echo intval($result[0]['result']['metadata']['globalCounts']['count']);
        break;
    case 'pinterest':
        $result = file_get_contents($countUrls[$type] . urlencode($url));
        $result = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $result);
        $result = json_decode($result, true);
        echo $result['count'];
        break;
}
