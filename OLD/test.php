<?php

class Project{
	
	var $name;
	var $owner;
	var $start;
	var $due;
	var $note;
	
	function Project($strName, $strOwner, $dateStart, $dateEnd, $strNote){
		
		$this->name = $strName;
		$this->owner = $strOwner;
		$this->start = $dateStart;
		$this->due = $dateEnd;
		$this->note = $strNote;
		
	}

	public function getName(){
		
		return $this->name;
		
	}
	
	public function setName($strName){
		
		$this->name = $strName;
	}

	
}

	include 'header.html';

	$name = 'mike';
	$owner = 'Todd';
	$start = 'date';
	$due = 'date';
	$note = 'note';

	echo $name;

	$myProject = new project($name, $owner, $start, $due, $note);
	
	//$myProject->setName($name);
	
	$myVar = $myProject->getName();
	
	echo $myVar;
	
	include 'footer.html';



?>