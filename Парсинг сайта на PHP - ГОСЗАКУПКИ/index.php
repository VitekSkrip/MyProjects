<?php
    include_once 'simple_html_dom.php';
    
    function curlGetPage($url, $referer='https://google.com/')
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

    
    // //МЕТОД, ИСПОЛЬЗУЯ БИБЛИОТЕКУ SIMPLE_HTML_DOM

    // $html = str_get_html($page);

    // $posts = [];
    // foreach ($html->find('tr[class$="table__row"]') AS $element) {
    //     $id = $element->find('.normal-text',0);
    //     $name = $element->find('.normal-text',1);
    //     $access = $element->find('.normal-text',2);
    //     $num = $element->find('.normal-text',3);
    //     $posts[] = [
    //         'id' => trim($id->plaintext),
    //         'name' => trim($name->plaintext),
    //         'access' => trim($access->plaintext),
    //         'num' => trim($num->plaintext),
    //     ];
    // }
    // $json = json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    // file_put_contents('test.json', $json);


    // С ПОМОЩЬЮ РЕГУЛЯРНЫХ ВЫРАЖЕНИЙ
    
    preg_match_all('/<tr class="table__row">(.*?)<\/tr>/si',$page,$matches);
    preg_match_all('/<th class="table__header-item table__row-item table-head-text">(.*?)<\/th>/si',$page,$str_title);
    foreach($matches[1] AS $i=>$el)
    {
        preg_match_all('/<td class="table__row-item normal-text">(.*?)<\/td>/si',$matches[1][$i],$str);
        foreach($str[1] AS $j=>$element)
        {   
            if ($j==0) { $title = '№'; }
            else{ $title = trim($str_title[1][$j-1]); }

            $rows[$i][$title] = trim($str[1][$j]);
        }
    }

    $json = json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents('json_ROWS.json', $json);

    // Парсинг полной информации об организации
    preg_match_all('/data-id=\"(.*?)\">/si',$page,$num);
    $rows_full = [];
    foreach($num[1] AS $i=>$el)
    {
        $urls = "https://zakupki.gov.ru/epz/order/notice/ea44/view/protocol/protocol-bid-review.html?regNumber=0329200062221006202&protocolLotId=35934706&protocolBidId=" . $num[1][$i];
        $page = curlGetPage($urls);
        preg_match_all('/<span class="section__info">(.*?)<\/span>/si',$page,$matches);
        preg_match_all('/<span class="section__title">(.*?)<\/span>/si',$page,$matches_title);
        $rows_full[$i] = array();
        foreach($matches[1] AS $j=>$element)
        {
            if ($j==6) { $title = 'Статус заявки'; }
            elseif ($j==7) { $title = 'Порядковый номер'; }
            else{ $title = trim($matches_title[1][$j]); }

            $rows_full[$i][$title] = trim($matches[1][$j]);
        }
    }
    $json = json_encode($rows_full, JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
    file_put_contents('json_FULL_ROWS.json', $json);
?>