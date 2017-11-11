<?php
class File{

	protected $request;
	protected $file;
	public function file_load()
	{ 
		$this->request=$_REQUEST['page'];
		$this->file   ='Include/'.$this->request.'.php';
		if(file_exists($this->file))
		{
			include $this->file;
		}else
		{
			include 'Include/dashboard.php';
		}  
	}
}