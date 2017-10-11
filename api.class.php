<?php

require_once('httpful.phar');

class API {

	// The API Url
	private static $base = 'https://yourapidomain.com';

	// Authentication
	private static $auth = 'yourauthkey';

	/**
	 * URL
	 * @param string $path the endpoint
	 * @return string
	 */

	private static function url($path){

		return self::$base . $path;

	}

	/**
	 * Headers
	 * Returns the default headers and authorization
	 * @return array
	 */

	private static function headers(){

		return array(
			'accept' => 'application/json',
			'authorization' => self::$auth         
		);

	}

	/**
	 * Encode
	 * Encodes the data into the proper format
	 * @param * $data the data to encode
	 */

	private static function encode($data){

		return json_encode($data);

	}

	/**
	 * GET Request
	 * @param string $path 
	 * @return obj Server response object
	 */

	public static function get($path){

		$response = \Httpful\Request::get( self::url($path) )
			->expectsJson()
			->addHeaders(self::headers())
			->send();

		return $response;

	}

	/**
	 * PUT Request
	 * @param string $path
	 * @param array|obj $data the data to send 
	 * @return obj Server response object
	 */

	public static function put($path, $data){

		$headers = self::headers();
		$headers[] = array('content-type' => 'multipart/form-data; boundary=---011000010111000001101001');

		$response = \Httpful\Request::put( self::url($path) )
			->addHeaders($headers)
			->body( self::encode($data) )
			->send();

		return $response;

	}

	/**
	 * POST Request
	 * @param string $path
	 * @param array|obj $data the data to send 
	 * @return obj Server response object
	 */

	public static function post($path, $data){

		$response = \Httpful\Request::post( self::url($path) )
			->sendsJson()
			->addHeaders( self::headers() )
			->body( self::encode($data) )
			->send();

		return $response;

	}

	// TODO:
	public static function delete(){}


}
?>