<?php
namespace App\Konie;

Class Offer 
{
	private $name;
	private $content;
	private $owner_id;
	private $category_id;
	private $position;

	public function __construct($name, $content, $owner_id, $category_id, $position)
	{
		$this->name = $name;
		$this->content = $content;
		$this->owner_id = $owner_id;
		$this->category_id = $category_id;
		$this->position = $position;
	}
}