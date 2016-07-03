<?
declare(strict_types = 1);

namespace zPHP\API\Exceptions;

class DataError extends Base {

	public $zCode, $url;

	function __construct (string $url, string $message, string $zCode) {
		parent::__construct($message);
		$this->zCode = $zCode;
		$this->url   = $url;
	}

	function __toString () : string {
		return "DataError $this->url\n\n$this->zCode\n\n{$this->getMessage()}\n\n" . parent::__toString();
	}
}