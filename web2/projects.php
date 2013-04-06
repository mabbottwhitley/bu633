<?php

class Project{
	
	var $projID;
	var $name;
	var $owner;
	var $start;
	var $due;
	var $progress;
	var $complete;
	var $note;
	
	function Project($strName, $strOwner, $dateStart, $dateDue, $strProgress, $strComplete, $strNote){
		
		$this->name = $strName;
		$this->owner = $strOwner;
		$this->start = $dateStart;
		$this->due = $dateDue;
		$this->progress = $strProgress;
		$this->complete = $strComplete;
		$this->note = $strNote;
		
	}
	
	function setName($strName){
		
		$this->name = $strName;
	}
	
	function setOwner($strOwner){
		
		$this->owner = $strOwner;
	}
	
	function setStart($dateStart){
		
		$this->start = $dateStart;
	}
	
	function setDue($dateDue){
		
		$this->due = $dateDue;
	}
	
	function setProgress($strProgress){
		
		$this->progress = $strProgress;
	}
	
	function setComplete($strComplete){
		
		$this->complete = $strComplete;
	}
	
	function setNote($strNote){
		
		$this->note = $strNote;
	}
	
	function getProjectID(){
		
		return $this->projID;
	}
	
	function getName(){
		
		return $this->name;
		
	}
	
	function getOwner(){
		
		return $this->owner;
	}
	
	function getStart(){
		
		return $this->start;
	}
	
	function getDue(){
		
		return $this->due;
	}
	
	function getProgress(){
		
		return $this->progress;
	}

	function getComplete(){
		
		return $this->complete;
	}
	
	function getNote(){
		
		return $this->note;
	}
	
}

?>