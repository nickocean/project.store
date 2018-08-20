<?php

namespace Src;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log {

	static public function info($message, $arr = null)
	{
		$logger = new Logger('log');
		$logger->pushHandler(new StreamHandler(APP . "/logs/info/log", Logger::INFO));
		$logger->info($message, $arr);
	}

	static public function error($message, $arr = null)
	{
		$logger = new Logger('log');
		$logger->pushHandler(new StreamHandler(APP . "/logs/errors/log", Logger::ERROR));
		$logger->error($message, $arr);
	}

	static public function notice($message, $arr = null)
	{
		$logger = new Logger('log');
		$logger->pushHandler(new StreamHandler(APP . "/logs/notices/log", Logger::NOTICE));
		$logger->notice($message, $arr);
	}
}