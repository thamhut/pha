<?php
    header("Content-type: text/html; charset=utf-8");
    include 'simple_html_dom.php';
    
    
    function write($error){
        $file = "Log.txt";
        $handle = fopen($file, 'a'); //w
        fwrite($handle, $error."\n");
        fclose($handle);
    }
    
    function read($file)
    {
        $link=array();
        $handle = fopen($file, 'r');
        while(!feof($handle))
        {
            $link[] = fgets($handle);
        }
        fclose($handle);
        return $link;
    }
          
    function check($a,$b) 
    {
        if(strpos($a,$b)!==false)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function insert($source)
    {
        $link = read('loadlink_singapore.txt');
        foreach($link as $item)
        {
            $cate = explode('()',$item);
            if(check(trim($cate[1]), $source))
            {
               loadcontent(trim($cate[1]),$cate[0]);
            }
            
        }
    }
    
    function get_fcontentByGoogle($url) {
        $url = str_replace( "&amp;", "&", urldecode(trim($url)) );
        (function_exists('curl_init')) ? '' : die('cURL Must be installed. Ask your host to enable it or uncomment extension=php_curl.dll in php.ini');
        $curl = curl_init();
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";
        
        curl_setopt($curl, CURLOPT_URL, $url);
        //curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        
        $html = curl_exec($curl);
        
        curl_close($curl);
        
        return $html;
    }
    
    function loadcontent_gumtree($url)
    {
        $result = array();
        $data = get_fcontentByGoogle($url);
        $html = str_get_html($data);$en='';
        foreach($html->find('h1#preview-local-title') as $e)
        {
            $result['title'] = strip_tags($e);
            break;
        }
        
        foreach($html->find('div#ad-desc span#preview-local-desc') as $e)
        {
            $result['content'] = $e;
            break;
        }
        foreach($html->find('noscript') as $e)
        {
            if(strpos($e, 'PhoneIcon')!==false)
            {
                $e = htmlentities($e);
                $e = explode('a href=&quot;#&quot;&gt;', $e);
                $e = explode('&lt;/a&gt;', $e[1]);
                $result['mobile'] = html_entity_decode($e[0]);
                break;
            }
        }
        
        foreach($html->find('td.imageStack  img.view') as $e)
        {
            $result['img'][] = $e->src;
            break;
        }
        return $result;
    }
    
    function loadcontent_locanto($url)
    {
        $result = array();
        $data = get_fcontentByGoogle($url);
        $html = str_get_html($data);$en='';
        foreach($html->find('div.topmargin div span.h2') as $e)
        {
            $result['title'] = strip_tags($e);
            break;
        }
        
        foreach($html->find('div.topmargin div div.user_content') as $e)
        {
            $result['content'] = $e;
            break;
        }
        foreach($html->find('div.mybox div a img') as $e)
        {
            $result['img'][] = $e->src;
            break;
        }
        return $result;
    }
    
    function loadcontent_stclassifieds($url)
    {
        $result = array();
        $data = get_fcontentByGoogle($url);
        $html = str_get_html($data);$en='';
        foreach($html->find('div#slideshow-main div.item-photo-450 img') as $e)
        {
            if(strpos($e->src,'stclassifieds.sg')==false)
            $result['img'][] = 'http://www.stclassifieds.sg'.$e->src;
            break;
        }
        
        foreach($html->find('div#content-395 div.Ad-d-header span') as $e)
        {
            $result['title'] = strip_tags($e);
            break;
        }
        
        foreach($html->find('div.Ad-d-desc div.Ad-d-info') as $e)
        {
            $result['content'] = $e;
            break;
        }
        
        foreach($html->find('script') as $e)
        {
            if(strpos($e,'jQuery("#callseller").click(function()')!==false)
            {
                $a = htmlentities($e);
                $a = explode('jQuery(&quot;#callbuyer&quot;).val(\'', $a);
                $a = explode('\');});});&lt;/script&gt;', $a[1]); 
                $result['mobile'] = ($a[0]);
                break;
            }
        }
        return $result;
    } 
    
    function loadcontent($url, $cate)
    {
        $date = date("Y-m-d H:i:s");
        $data = get_fcontentByGoogle($url);
        $html = str_get_html($data);
        if(strpos($url,'singapore.gumtree.sg')!==true)
        {
            foreach($html->find('tr td.hgk a') as $e)
            {
                $check = checkLink($e->href);
                if($check[0]==0)
                {
                    $data2 = loadcontent_gumtree($e->href);
                    $content = isset($data2['content'])?$data2['content']:'';
                    $content = preg_replace('#<a(.*?)>#i', '<a href="http://adf.ly/u7pgx">', $content);
                    $title = isset($data2['title'])?$data2['title']:'';
                    $city = isset($data2['city'])?$data2['city']:'';
                    $img = '';
                    if(isset($data2['img']))
                    {
                        $img = implode(',',$data2['img']);
                    }
                    if(isset($data2['mobile']))
                    {
                        $lienlac = $data2['mobile'].',,,';
                    }
                    else
                    {
                        $lienlac = ',,,,';
                    }
                    if($title!=''&& $content!='' && strlen($content)>300){
                        insertdb($url, $e->href, $date, 'singapore.gumtree.sg', $cate, addslashes($content), 2, addslashes($title), $img, $city, $lienlac);
                    }
                }
            }
        }
        
        if(strpos($url,'stclassifieds.sg')!==true)
        {
            foreach($html->find('div.sr-results ul li.sr-results-info a.newTabEnabled') as $e)
            {
                $check = checkLink('http://www.stclassifieds.sg'.$e->href);
                if($check[0]==0)
                {
                    $data2 = loadcontent_stclassifieds('http://www.stclassifieds.sg'.$e->href);
                    $content = isset($data2['content'])?$data2['content']:'';
                    $content = preg_replace('#<a(.*?)>#i', '<a href="http://adf.ly/u7pgx">', $content);
                    $title = isset($data2['title'])?$data2['title']:'';
                    $city = isset($data2['city'])?$data2['city']:'';
                    $img = '';
                    if(isset($data2['img']))
                    {
                        $img = implode(',',$data2['img']);
                    }
                    if(isset($data2['mobile']))
                    {
                        $lienlac = $data2['mobile'].',,,';
                    }
                    else
                    {
                        $lienlac = ',,,,';
                    }
                    if($title!=''&& $content!='' && strlen($content)>300){
                        insertdb($url, "http://www.stclassifieds.sg".$e->href, $date, 'stclassifieds.sg', $cate, addslashes($content), 2, addslashes($title), $img, $city, $lienlac);
                    }
                }
            }
        }
        
        
        if(strpos($url,'singapore.locanto.sg')!==true)
        {
            foreach($html->find('div.resultRow div.resultMain span.textHeader a') as $e)
            {
                //$check = checkLink($e->href);
                //if($check[0]==0)
                {
                    $data2 = loadcontent_stclassifieds($e->href);
                    $content = isset($data2['content'])?$data2['content']:'';
                    $content = preg_replace('#<a(.*?)>#i', '<a href="http://adf.ly/u7pgx">', $content);
                    $title = isset($data2['title'])?$data2['title']:'';
                    $city = isset($data2['city'])?$data2['city']:'';
                    $img = '';
                    if(isset($data2['img']))
                    {
                        $img = implode(',',$data2['img']);
                    }
                    if(isset($data2['mobile']))
                    {
                        $lienlac = $data2['mobile'].',,,';
                    }
                    else
                    {
                        $lienlac = ',,,,';
                    }
                    if($title!=''&& $content!='' && strlen($content)>300){
                        //echo $img;
                        //insertdb($url, "http://www.raovat.vn".$e->href, $date, 'raovat.vn', $cate, addslashes($content), 2, addslashes($title), $img, $city, $lienlac);
                    }
                }
            }
        }
    }
    
    
    function checkLink($url)
    {
        $query = "CALL raovat_check_url_insert('$url');";
        $iconn = mysqli_connect('localhost', 'chotam_thamhut', 'trietquyendao', 'chotam_raovat_singapore') or die('Eo ket noi duoc') ;
        mysqli_multi_query($iconn, $query) ;
		$result = mysqli_store_result($iconn);
		$data = array();
		$function = "mysqli_fetch_array";
		$data = $function($result);
		
		mysqli_free_result($result);
		if(mysqli_more_results($iconn))
		{
			mysqli_next_result($iconn);
		}
		return $data;
    }
    
    function insertdb($url, $url_chil, $date, $source, $cate, $content, $uid, $title, $img, $address, $lienlac)
    {
        //print_r($url.','.$url_chil.','.$date.','.$source.','.$cate.',$content,'.$uid.','.$title.','.$img.','.$address.','.$lienlac);
        //insertLink($url, $url_chil, $date, $source, $cate, $content, $uid, $title, $img, $address, $lienlac);
        $data = array();
        $query = "CALL raovat_insert_url('$url', '$url_chil', '$date', '$source', '$cate', '$content','$uid', '$title', '$img', '$address', '$lienlac');";
        $function = "mysqli_fetch_array";
		
		$iconn = mysqli_connect('localhost', 'chotam_thamhut', 'trietquyendao', 'chotam_raovat_singapore') ;
        mysqli_query($iconn, 'SET NAMES utf8' );
        mysqli_query($iconn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		mysqli_multi_query($iconn, $query) ;
		$i = 0;
		while (($result = mysqli_store_result($iconn)) !== false)
		{
			$data[$i] = array();
			while($row = $function($result))
			{
				$data[$i][] = $row;
			}
			$i++;
			if(!mysqli_next_result($iconn)) break;
		}
		
		if($result !== false) mysqli_free_result($result);
		if(mysqli_more_results($iconn))
		{
			mysqli_next_result($iconn);
		}
		return $data;
    }
    
    $dir = opendir(dirname(__FILE__));
    while($item = readdir($dir))
        if(is_file($sub = dirname(__FILE__).'\\'.$item)&&strpos($item,'core')!==false)
            unlink(dirname(__FILE__).'\\'.$item);
    //abc();
    
?>