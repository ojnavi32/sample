<?php
namespace Drupal\sample\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\sample\scripts;

class Page1 extends ControllerBase
{
	public function ShowPage()
	{
		$markup = [
			'#theme' => 'Page1',
			'#title' => 'This is a title coming from sample module.',
			'description' => 'say something here...',
		];
		return $markup;
	}
}