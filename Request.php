<?
declare(strict_types = 1);

namespace zPHP\API;

class Request {

	static $lastUrl = NULL;

	/**
	 * @throws Exceptions\ConnError
	 * @throws Exceptions\ServerError
	 * @throws Exceptions\DataError
	 */
	static function get (string $domain, string $uri, array $params) : array {
		self::$lastUrl = $domain . '/' . $uri . '?' . http_build_query($params);
		return self::request(self::$lastUrl, stream_context_create([
			'http' => ['ignore_errors' => TRUE]
		]));
	}

	/**
	 * @throws Exceptions\ConnError
	 * @throws Exceptions\ServerError
	 * @throws Exceptions\DataError
	 */
	static function post (string $domain, string $uri, array $getParams, array $postParams) : array {
		self::$lastUrl = $domain . '/' . $uri . '?' . http_build_query($getParams);
		return self::request(self::$lastUrl, stream_context_create([
			'http' => [
				'ignore_errors' => TRUE,
				'method'        => 'POST',
				'header'        => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
				'content'       => http_build_query($postParams)
			]
		]));
	}


	/**
	 * @throws Exceptions\ConnError
	 * @throws Exceptions\ServerError
	 * @throws Exceptions\DataError
	 */
	private static function request (string $url, $context) : array {
		$response = @file_get_contents($url, FALSE, $context);
		if (FALSE === $response)
			throw new Exceptions\ConnError($url);

		$json = json_decode($response, TRUE);
		if (NULL === $json)
			throw new Exceptions\ServerError($url, $response);

		if ('error' == $json['status'])
			throw new Exceptions\DataError($url, $json['message'], $json['code']);

		return $json['data'];
	}
}