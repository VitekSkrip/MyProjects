<?php
    include_once 'simple_html_dom.php';
    
    function curlGetPage($url,$referer= 'https://google.com/')
    {
        $ch =curl_init();
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44');
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_REFERER,$referer);
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    $page = curlGetPage('https://zakupki.gov.ru/epz/order/notice/ea44/view/protocol/protocol-bid-list.html?regNumber=0329200062221006202&protocolId=35530565');
    $html = str_get_html($page);
    //echo $html;


    $posts = [];
    foreach ($html->find('tr[class$="table__row"]') AS $element) {
        $id = $element->find('.normal-text',0);
        $name = $element->find('.normal-text',1);
        $access = $element->find('.normal-text',2);
        $num = $element->find('.normal-text',3);
        $posts[] = [
            'id' => trim($id->plaintext),
            'name'=> trim($name->plaintext),
            'access' => trim($access->plaintext),
            'num' => trim($num->plaintext),
        ];
    }
    $json = json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents('test.json', $json);

?>