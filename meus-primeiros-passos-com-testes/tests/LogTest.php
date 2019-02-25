<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{
	protected function assertPreConditions(): void
	{
		$this->assertTrue(class_exists(Log::class));
	}

	public function testSeLogEFeitoComSucesso()
	{
		$log = new Log();

		$this->assertEquals(
			'Logando dados no sistema: Testando Save de Log no Sistema',
			$log->log('Testando Save de Log no Sistema'));
	}
}