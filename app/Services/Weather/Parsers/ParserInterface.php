<?php

namespace App\Services\Weather\Parsers;

interface ParserInterface
{
	public function handle($result);
}