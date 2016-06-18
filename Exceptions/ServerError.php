<?
declare(strict_types = 1);

namespace zPHP\API\Exceptions;

class ServerError extends Base {

	function __construct (string $message) {
		parent::__construct($message);
	}
}