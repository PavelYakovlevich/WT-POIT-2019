<<<<<<< HEAD
<?php 

class TemplateHandler{
	
	var $valueList = [];
	var $pageContent;
	
	public function setValue($key, $value){
		$this->valueList[$key] = $value;
	}
	
	public function ReplaceValues($filePath){
		$fileContent = file_get_contents($filePath);
		
		foreach($this->valueList as $key => $value)
			$fileContent = str_replace($key, $value, $fileContent);
			
		$this->pageContent = $fileContent;
	}
	
}

=======
<?php 

class TemplateHandler{
	
	var $valueList = [];
	var $pageContent;
	
	public function setValue($key, $value){
		$this->valueList[$key] = $value;
	}
	
	public function ReplaceValues($filePath){
		$fileContent = file_get_contents($filePath);
		
		foreach($this->valueList as $key => $value)
			$fileContent = str_replace($key, $value, $fileContent);
			
		$this->pageContent = $fileContent;
	}
	
}

>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
?>