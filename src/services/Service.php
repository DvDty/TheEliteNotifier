<?php

class Service
{

	private const ENVIRONMENTS = [
		'dev', 'prod',
	];


	public function isProd(): bool
	{
		return $this->getEnv() === 'prod';
	}


	public function getEnv(): string
	{
		$env = $this->getConfig('env', 'dev');

		if (!in_array($env, self::ENVIRONMENTS, true)) {
			$env = 'dev';
		}

		return $env;
	}


	private function getConfig(string $key = '', $default = ''): string
	{
		if (!file_exists(__DIR__ . '/../../config.ini')) {
			return $default;
		}

		$config = parse_ini_file(__DIR__ . '/../../config.ini');
		$key = strtolower($key);

		if (!$config || !array_key_exists($key, $config)) {
			return $default;
		}

		return $config[$key];
	}


	public function getBaseUrl(): string
	{
		return $this->getConfig('base_url', 'http://goldeneye007.aluminabuild.com/');
	}
}
