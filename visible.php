<?php
namespace Lol\Token;

require_once 'token.php';

class Visible extends \Lol\Token
{
	protected $expects = array(
		'T_STRING',
		'T_END',
	);

	public function run($args)
	{
		// Just print out the args passed in
		foreach($args as $arg) {
			print $arg->getValue();
		}

		// print a new line
		print "\n";
	}
}


