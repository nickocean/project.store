<?php

namespace Src;

class Flashes
{
	public static function flash($style, $body)
	{
		echo "<div class=\"alert alert-$style\" role=\"alert\">$body</div>";
	}
}