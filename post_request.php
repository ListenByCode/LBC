<?php
    $file_path = __DIR__.'/xxx.mp3';
	
    if (class_exists('CURLFile')) {// PHP versions >= 5.5
        //NOTE: file name should not contain slashes "/"
		$file = new CURLFile($file_path, 'audio/mp3', 'xxx.mp3');
    } else {// PHP versions < 5.5
        $file = '@'.$file_path;
    }
    $data = array(
        'file' => $file,
        'appkey' => 'your appkey',
        //Developer needs to return "success"(not including double quotes) string as response in the callback interface.
        'callbackurl' => 'your callbackurl',
    );

    $url = "https://www.listenbycode.com/api/v1/upload";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: multipart/form-data')
    );
    $output = curl_exec($ch);
    curl_close($ch);
    var_dump($output);



