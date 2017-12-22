<?php

class Record
{
	private $title;
	private $url;
	private $description;
	private $date;

	public function __construct(string $title = "",
	                            string $url = "",
	                            string $description = "",
	                            DateTime $date = null)
	{
		$this->title = $title;
		$this->url = $url;
		$this->description = $description;
		$this->date = $date;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return DateTime
	 */
	public function getDate(): DateTime
	{
		return $this->date;
	}
}
