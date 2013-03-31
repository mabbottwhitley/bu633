<?php

class Task{
	
	var $name;
	var $description;
	var $projectID;
	var $sequence;
	var $creatorID;
	var $assigneeID;
	var $start;
	var $due;
	var $complete;
	var $note;
	
	function Task($strname, $strdescription, $numprojectID, $sequence, $numcreatorID, $numassigneeID, $datestart, $datedue, $boolcomplete, $strnote){
		
		$this->name = $strname;
		$this->description = $strdescription;
		$this->projectID = $numprojectID;
		$this->sequence = $sequence;
		$this->creatorID = $numcreatorID;
		$this->assigneeID = $numassigneeID;
		$this->start = $datestart;
		$this->due = $datedue;
		$this->complete = $boolcomplete;
		$this->note = $strnote;
		
	}
	
	function getName(){
		
		return $this->name;
	}
	
	function getDescription(){
		
		return $this->description;
	}
	
	function getProjectID(){
		
		return $this->projectID;
	}
	
	function getSequence(){
		
		return $this->sequence;
	}
	
	function getCreatorID(){
		
		return $this->creatorID;
	}
	
	function getAssigneeID(){
		
		return $this->assigneeID;
	}
	
	function getStart(){
		
		return $this->start;
	}
	
	function getDue(){
		
		return $this->due;
	}
	
	function getComplete(){
		
		return $this->complete;
	}
	
	function getNote(){
		
		return $this->note;
	}
	
	function setName($strName){
		
		$this->name = $strName;
	}
	
	function setDescription($strDescription){
		
		$this->description = $strDescription;
	}
	
	function setProjectID($numProjectID){
		
		$this->projectID = $numProjectID;
	}
	
	function setSequence($numSequence){
		
		$this->sequence = $numSequence;
	}
	
	function setCreatorID($numCreatorID){
		
		$this->creatorID = $numCreatorID;
	}
	
	function setAssigneeID($numAssigneeID){
		
		$this->assigneeID = $numAssigneeID;
	}
	
	function setStart($dateStart){
		
		$this->start = $dateStart;
	}
	
	function setDue($dateDue){
		
		$this->due = $dateDue;
	}
	
	function setComplete($boolComplete){
		
		$this->complete = $boolComplete;
	}
	
	function setNote($strNote){
		
		$this->note = $strNote;
	}

}



?>