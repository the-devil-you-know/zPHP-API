<?
declare(strict_types = 1);

namespace zPHP\API\Exceptions;

class ConnError extends Base {

	public $url;

	function __construct (string $url) {
		parent::__construct();
		$this->url = $url;
	}

	function __toString () : string {
		return "ConnError $this->url\n\n" . parent::__toString();
	}
}