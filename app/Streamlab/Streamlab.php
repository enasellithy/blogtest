<?php

namespace App\Streamlab;

class Streamlab
{
	protected $task;

	public function __construct()
	{
		$this->task = 'Hi';
	}

	public function DoTask()
	{
		return $this->task;
	}
}