<?php 

class Utilitarios{
    
    private $error;

	function __construct() {}

	function obterDados($url){
        $proxyUsername = "itc.teste";
        $proxyPassword = "123";
        $proxyPort = "3128";
        $proxyHost = "proxy.itc.ac.mz";
            // $url = $url . "?". http_build_query($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);        
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        // Set the proxy host.
        // curl_setopt($ch, CURLOPT_PROXY, $proxyHost);

        // // port.
        // curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);

        // // username and password.
        // curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxyUsername:$proxyPassword");

        $info = curl_getinfo($ch);
        $res = curl_exec($ch);        
        if (curl_error($ch)) {
            $this->error = curl_error($ch);
            throw new Exception($this->error);
        }else{
            curl_close($ch);
            return $res;
        }        
    }

        function obterDadosArray($url, $data){
        	$url = $url . "?". http_build_query($data);
        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_HEADER, false);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $info = curl_getinfo($ch);
            $res = curl_exec($ch);        
            if (curl_error($ch)) {
            	$this->error = curl_error($ch);
            	throw new Exception($this->error);
            }else{
            	curl_close($ch);
            	return $res;
            }        
        }

        function submeterDadosJson($url, $data){
        	$data = json_encode($data);
        	$ch = curl_init($url);                                                                      
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        	curl_setopt($ch, CURLOPT_POST, 1);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            	'Authorization: Bearer helo29dasd8asd6asnav7ffa',                                                      
            	'Content-Type: application/json',                                                                       
            	'Content-Length: ' . strlen($data))                                                                       
        );        
            $res = curl_exec($ch);
            if (curl_error($ch)) {
            	$this->error = curl_error($ch);
            	throw new Exception($this->error);
            }else{
            	curl_close($ch);
            	return $res;
            } 
        }

        function submeterDados($url, $data){
        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($ch, CURLOPT_POST, 1);
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");        
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);    
            // curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false); // !!!! required as of PHP 5.6.0 for files !!!
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-GB; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)");
            curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $res = curl_exec($ch);
            if (curl_error($ch)) {
            	$this->error = curl_error($ch);
            	throw new Exception($this->error);
            }else{
            	curl_close($ch);
            	return $res;
            } 
        }
    }
    ?>