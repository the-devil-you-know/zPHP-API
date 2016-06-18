<?
declare(strict_types = 1);

namespace zPHP\API;

class Rend {

	static function success (array $data) {
		self::rend([
			'status' => 'success',
			'data'   => $data
		]);
	}

	static function error (string $message, string $code) {
		self::rend([
			'status'  => 'error',
			'code'    => $code,
			'message' => $message
		]);
	}


	private static function rend (array $data) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}