<?php

class Service
{

	private const ENVIRONMENTS = [
		'dev', 'prod',
	];


	public function getEnv(): string
	{
		$env = $this->getConfig('env');

		if (!in_array($env, self::ENVIRONMENTS, true)) {
			$env = 'dev';
		}

		return $env;
	}


	public function isProd(): bool
	{
		return $this->getEnv() === 'prod';
	}


	public function getBaseUrl(): string
	{
		return $this->getConfig('base_url');
	}


	private function getConfig(string $key = ''): string
	{
		$config = parse_ini_file(__DIR__ . '/../../config.ini');
		$key = strtolower($key);

		if (!array_key_exists($key, $config)) {
			return 'missing config variable';
		}

		return $config[$key];
	}
}
