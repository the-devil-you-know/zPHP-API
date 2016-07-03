<?
declare(strict_types = 1);

namespace zPHP\API\Exceptions;

class ServerError extends Base {

	public $url;

	function __construct (string $url, string $message) {
		parent::__construct($message);
		$this->url = $url;
	}

	function __toString () : string {
		return "ServerError $this->url\n\n{$this->getMessage()}\n\n" . parent::__toString();
	}
}