<?
declare(strict_types = 1);

namespace zPHP\API\Exceptions;

class DataError extends Base {

	public $zCode;

	function __construct (string $message, string $zCode) {
		parent::__construct($message);
		$this->zCode = $zCode;
	}
}