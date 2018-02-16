<?php

class Record
{
	private $type;
	private $stage;
	private $level;
	private $time;
	private $runner;
	private $url;
	private $description;
	private $date;


	/**
	 * Record constructor.
	 * @param $type
	 * @param $stage
	 * @param $level
	 * @param $time
	 * @param $runner
	 * @param $url
	 * @param $description
	 * @param $date
	 */
	public function __construct($type, $stage, $level, $time, $runner, $url, $description, $date)
	{
		$this->type = $type;
		$this->stage = $stage;
		$this->level = $level;
		$this->time = $time;
		$this->runner = $runner;
		$this->url = $url;
		$this->description = $description;
		$this->date = $date;
	}


	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}


	/**
	 * @return mixed
	 */
	public function getStage()
	{
		return $this->stage;
	}


	/**
	 * @return mixed
	 */
	public function getLevel()
	{
		return $this->level;
	}


	/**
	 * @return mixed
	 */
	public function getTime()
	{
		return $this->time;
	}


	/**
	 * @return mixed
	 */
	public function getRunner()
	{
		return $this->runner;
	}


	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}


	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}


	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date;
	}
}
