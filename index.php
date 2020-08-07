<?php
	
	function get_image_data($url){
		$context = stream_context_create(
			array(
				"http" => array(
					'method'=>"GET",
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) 
								AppleWebKit/537.36 (KHTML, like Gecko) 
								Chrome/50.0.2661.102 Safari/537.36\r\n" .
								"accept: text/html,application/xhtml+xml,application/xml;q=0.9,
								image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\r\n" .
								"accept-language: es-ES,es;q=0.9,en;q=0.8,it;q=0.7\r\n" . 
								"accept-encoding: gzip, deflate, br\r\n"
				)
			)
		);

		$image_data = file_get_contents($url, false, $context);
		return $image_data;
	}
	
	$images_url = array(
		'https://img.wethrift.com/bath-and-body-works.jpg',
		'https://img.wethrift.com/beauty-bay.jpg',
		'https://img.wethrift.com/waitr.jpg',
		'https://img.wethrift.com/dunelm.jpg',
		'https://img.wethrift.com/skip-the-dishes.jpg'
	);
	
	
	foreach($images_url as $url){
		$image_data = get_image_data($url);
		$downloadedFile = 'images/'.basename($url);
		file_put_contents( $downloadedFile, $image_data );
	}
?>