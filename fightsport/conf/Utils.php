<?php

class Utils
{
    public function translate($string) {}
    public function encode($string) {}
    public function decode($string) {}
    
    function converToUrl($url){
    	$url = $this->convertToAlias($url);
    	$url = str_replace('html', '', $url);
        while(strpos($url,'--')!==false)
        {
            $url = str_replace('--', '-', $url);
        }
    	return strtolower(preg_replace('/[^a-z0-9\- _]+/i', '', $url));
    }
    
    
    function convertToAlias($title)
    {
        $title = htmlspecialchars_decode(trim($title));
        $strFind = array(
            ': ', ':',
            ' ', '_',
            'đ', 'Đ',
            'á', 'à', 'ạ', 'ả', 'ã', 'Á', 'À', 'Ạ', 'Ả', 'Ã', 'ă', 'ắ', 'ằ', 'ặ', 'ẳ', 'ẵ', 'Ă', 'Ắ', 'Ằ', 'Ặ', 'Ẳ', 'Ẵ', 'â', 'ấ', 'ầ', 'ậ', 'ẩ', 'ẫ', 'Â', 'Ấ', 'Ầ', 'Ậ', 'Ẩ', 'Ẫ',
            'ó', 'ò', 'ọ', 'ỏ', 'õ', 'Ó', 'Ò', 'Ọ', 'Ỏ', 'Õ', 'ô', 'ố', 'ồ', 'ộ', 'ổ', 'ỗ', 'Ô', 'Ố', 'Ồ', 'Ộ', 'Ổ', 'Ỗ', 'ơ', 'ớ', 'ờ', 'ợ', 'ở', 'ỡ', 'Ơ', 'Ớ', 'Ờ', 'Ợ', 'Ở', 'Ỡ',
            'é', 'è', 'ẹ', 'ẻ', 'ẽ', 'É', 'È', 'Ẹ', 'Ẻ', 'Ẽ', 'ê', 'ế', 'ề', 'ệ', 'ể', 'ễ', 'Ê', 'Ế', 'Ề', 'Ệ', 'Ể', 'Ễ',
            'ú', 'ù', 'ụ', 'ủ', 'ũ', 'Ú', 'Ù', 'Ụ', 'Ủ', 'Ũ', 'ư', 'ứ', 'ừ', 'ự', 'ử', 'ữ', 'Ư', 'Ứ', 'Ừ', 'Ự', 'Ử', 'Ữ',
            'í', 'ì', 'ị', 'ỉ', 'ĩ', 'Í', 'Ì', 'Ị', 'Ỉ', 'Ĩ',
            'ý', 'ỳ', 'ỵ', 'ỷ', 'ỹ', 'Ý', 'Ỳ', 'Ỵ', 'Ỷ', 'Ỹ'
        );
        $strReplace = array(
            '-', '-',
            '-', '-',
            'd', 'd',
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i',
            'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y'
        );
    
        return strtolower(preg_replace('/[^a-z0-9\- _]+/i', '', str_replace($strFind, $strReplace, $title)));
    }
    
    public function explode_first($s, $c)
    {
        $s = explode($c, $s);
        $data = isset($s[0])&&$s[0]!=''?$s[0]:null;
        return $data;
    }
    
    function gettitle($string)
    {
        $string = strip_tags($string);
        if(strlen($string)>200)
        {
            $string = substr($string, 0, 200 );
        }
        $lastSpacePosition = strrpos($string," ");
        $textWithoutLastWord =substr($string,0,$lastSpacePosition);
        return $textWithoutLastWord;
    }
    
    function getcontentlst($string)
    {
        $string = strip_tags($string);
        if(strlen($string)>500)
        {
            $string = substr($string, 0, 500 );
        }
        else
        {
            return $string;
        }
        $lastSpacePosition = strrpos($string," ");
        $textWithoutLastWord =substr($string,0,$lastSpacePosition);
        return $textWithoutLastWord;
    }
    function getcontentlst_cate($string)
    {
        $string = strip_tags($string);
        if(strlen($string)>500)
        {
            $string = substr($string, 0, 500 );
        }
        else
        {
            return $string;
        }
        $lastSpacePosition = strrpos($string," ");
        $textWithoutLastWord =substr($string,0,$lastSpacePosition);
        return $textWithoutLastWord;
    }
    
    function convertToKeyword($title){
		$title = htmlspecialchars_decode(trim($title));
        $strFind = array(
            ': ', ':',
            'đ', 'Đ',
            'á', 'à', 'ạ', 'ả', 'ã', 'Á', 'À', 'Ạ', 'Ả', 'Ã', 'ă', 'ắ', 'ằ', 'ặ', 'ẳ', 'ẵ', 'Ă', 'Ắ', 'Ằ', 'Ặ', 'Ẳ', 'Ẵ', 'â', 'ấ', 'ầ', 'ậ', 'ẩ', 'ẫ', 'Â', 'Ấ', 'Ầ', 'Ậ', 'Ẩ', 'Ẫ',
            'ó', 'ò', 'ọ', 'ỏ', 'õ', 'Ó', 'Ò', 'Ọ', 'Ỏ', 'Õ', 'ô', 'ố', 'ồ', 'ộ', 'ổ', 'ỗ', 'Ô', 'Ố', 'Ồ', 'Ộ', 'Ổ', 'Ỗ', 'ơ', 'ớ', 'ờ', 'ợ', 'ở', 'ỡ', 'Ơ', 'Ớ', 'Ờ', 'Ợ', 'Ở', 'Ỡ',
            'é', 'è', 'ẹ', 'ẻ', 'ẽ', 'É', 'È', 'Ẹ', 'Ẻ', 'Ẽ', 'ê', 'ế', 'ề', 'ệ', 'ể', 'ễ', 'Ê', 'Ế', 'Ề', 'Ệ', 'Ể', 'Ễ',
            'ú', 'ù', 'ụ', 'ủ', 'ũ', 'Ú', 'Ù', 'Ụ', 'Ủ', 'Ũ', 'ư', 'ứ', 'ừ', 'ự', 'ử', 'ữ', 'Ư', 'Ứ', 'Ừ', 'Ự', 'Ử', 'Ữ',
            'í', 'ì', 'ị', 'ỉ', 'ĩ', 'Í', 'Ì', 'Ị', 'Ỉ', 'Ĩ',
            'ý', 'ỳ', 'ỵ', 'ỷ', 'ỹ', 'Ý', 'Ỳ', 'Ỵ', 'Ỷ', 'Ỹ'
        );
        $strReplace = array(
            '_', '_',
            'd', 'd',
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i',
            'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y'
        );

        return strtolower(str_replace($strFind, $strReplace, $title));
	}
        
    function getStringCut($string)
    {
        $string = $this->convertToKeyword($string);
        $string = preg_replace('/[`|~||!|@|#|$|%|^|&|*|(|)|-|=|\[|\]|{|}|\'|"|;|.|?|\/|>||<|,|\\|\||“]+/i', '',$string);
        $string = preg_replace('/[| |]+/i', '-',$string);
        return $string;
    }  
    
    public function enhtml($s)
    {
        $s = str_replace('<','&lt;',$s);
        $s = str_replace('>','&gt;',$s);
        return $s;
    }
    
    function subdate($d1, $d2)
    {
        $today1 = date("m",strtotime($d1));  
        $today2 = date("m",strtotime($d2));
        $ketqua = array();
        if(date("m",strtotime($d1))==date("m",strtotime($d2)) && date("d",strtotime($d1)) - date("d",strtotime($d2))<7)
        {
            $ketqua['d'] = (date("d",strtotime($d1)) - date("d",strtotime($d2)));
            $ketqua['h'] = (date("H",strtotime($d1)) - date("H",strtotime($d2)));
            $ketqua['i'] = (date("i",strtotime($d1)) - date("i",strtotime($d2)));
            return $ketqua;
        }
        else
        {
            return 0;
        }
    }
    
    
    function getCurrentPageURL() {
        $pageURL = 'http';
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    
    function getMessageError($key, $error)
    {
        if(isset($error['field']))
        {
            if(($key == $error['field']))
            {
                return $error['message'];
            }
        }        
        return false;
    }
    
    function getRealIPAddress(){  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    function getcode()
    {
        $arr = array('a','b','c','d','e','f', 'g', 'h', 'i', 'j', 'k', 'l','n','m','o','p','q','r', 's', 't', 'u', 'v', 'w','x', 'y', 'z');
        $data = array();
        $des = array();
        $date = date('Y-m-d H:m:s').md5($this->getRealIPAddress());
        $dir = 'public/xacnhancp/'.md5($this->getRealIPAddress());
        if (!@is_dir($dir)){
            if( ! @mkdir($dir, 0777)){
            @chmod($dir, 0777);
            }
        }
        for($i=0; $i<6; ++$i)
        {
            $key[] = rand(0,25);
            $source[] = $arr[$key[$i]];
            $des[] = md5($arr[$key[$i]].$date);
            copy('public/xacnhan/'.$arr[$key[$i]].'.png',$dir.'/'.$des[$i].'.png'); 
        }      
        $data['key'] = $source;
        $data['value'] = $des;  
        return $data;
    }
    
    function deletecode($item)
    {
        if (!is_dir('public/xacnhancp')) {
    
        }
        else
        {
            foreach (scandir('public/xacnhancp/') as $folder) {
                if (is_dir('public/xacnhancp/'.$folder) && date("d m Y H i", filectime('public/xacnhancp/'.$folder))!= date("d m Y H i")) {
                    if ($folder == '.' || $folder == '..') continue;
                    foreach (scandir('public/xacnhancp/'.$folder) as $item) {
                        if ($item == '.' || $item == '..') continue;
                        if (file_exists('public/xacnhancp/'.$folder.'/'.$item)) {
                                unlink('public/xacnhancp/'.$folder.'/'.$item);
                        }
                    }
                    rmdir('public/xacnhancp/'.$folder);
                }
            }
            
        }
    }
    
    public function checkFormatFile($file)
    {
        $err = array();
        $allowedTypes = array('image/gif', 'image/jpg', 'image/png','image/bmp', 'image/jpeg');
        $format = $file->getRealType();   
        $err[2] = explode('/', $format);
        $err[2] = isset($err[2][1])?$err[2][1]:'';
        if(!in_array($format, $allowedTypes))
        {
            $err[1]['format'] = 'err';
        }
        if($file->getSize() > 1000000)
        {
            $err[1]['size'] = 'err';
        }
        return $err;
    }
    
    public function uploadFile($files)
    {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        $upload = array();
        $y = date('Y');
        $m = date('m');
        $des = 'uploads/images/'.$y;
        if (!@is_dir($des)){
            if( ! @mkdir($des, 0777)){
            @chmod($des, 0777);
            }
        }
        $des = 'uploads/images/'.$y.'/'.$m;
        if (!@is_dir($des)){
            if( ! @mkdir($des, 0777)){
            @chmod($des, 0777);
            }
        }
        foreach ($files as $file){
            $upload['err'] = $err = $this->checkFormatFile($file);
            if(!isset($err[1]))
            {
                 $name = md5(date('Y-m-d H:i:s').$file->getName()).'.'.$err[2];
                 $file->moveTo($des.'/'.$name);
                 $upload['des'][] =  $url->get().$des.'/'.$name;
            }
        }
        return $upload; 
    }
    
}