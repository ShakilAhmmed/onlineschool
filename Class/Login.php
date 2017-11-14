<?php
include '../Session/Session.php';
 Session::checkLogin();
class Login{
	
	private $db;
	private $fm;
	protected $id;
	protected $first_name;
	protected $last_name;
	protected $admin_email;
	protected $confirm_email;
	protected $password;
	protected $confirm_passowrd;
	protected $inserted;
	protected $session_data;


	public function __construct()
	{
		$this->db  =new Database;
		$this->fm  =new Format;
	}

	public function user_signup($data)
	{
		$this->id=time();
        $this->first_name   =mysqli_real_escape_string($this->db->connection,$data['first_name']);
        $this->last_name    =mysqli_real_escape_string($this->db->connection,$data['last_name']);
        $this->admin_email  =mysqli_real_escape_string($this->db->connection,$data['admin_email']);
        $this->confirm_email=mysqli_real_escape_string($this->db->connection,$data['confirm_email']);
 $this->password     =mysqli_real_escape_string($this->db->connection,base64_encode($data['password']));
     $this->confirm_password=mysqli_real_escape_string($this->db->connection,base64_encode($data['confirm_password']));
    foreach ($data as $value) {
    	$this->fm->validation($value);
    }
    if(empty($this->first_name)||empty($this->last_name)||empty($this->admin_email)||empty($this->confirm_email)||empty($this->password)||empty($this->confirm_password))
    {
    	echo $this->fm->error("Field Is Empty");
    }elseif ($this->admin_email!=$this->confirm_email) {
    	echo $this->fm->error("Email Not Match");
    }
    elseif ($this->password!=$this->confirm_password) {
    	echo $this->fm->error("Password Not Match");
    }
    elseif (!filter_var($this->admin_email,FILTER_VALIDATE_EMAIL)) {
    	echo $this->fm->error("Email Is Not Valid");
    }
    else
    {
    	$this->inserted=$this->db->insert("user","id='$this->id',first_name='$this->first_name',last_name='$this->last_name',email='$this->admin_email',password='$this->password',status='Inactive'");
    	if($this->inserted)
    	{
    		echo $this->fm->success("Sign Up Completed.Check Your Email");
    	}
    	else
    	{
    		echo $this->fm->error("Something Went Wrong");
    	}
    }

	}

	public function user_login($data)
	{
		$this->admin_email=mysqli_real_escape_string($this->db->connection,$data['email']);
		$this->password=mysqli_real_escape_string($this->db->connection,base64_encode($data['password']));
		foreach ($data as  $value) {
			$this->fm->validation($value);
		}
		if (empty($this->admin_email)||empty($this->password)) {
		  echo $this->fm->error("Field Is Empty");
		}
		elseif(!filter_var($this->admin_email,FILTER_VALIDATE_EMAIL))
		{
          echo $this->fm->error("Email Is Not Valid");
		}
		else
		{
           $this->inserted=$this->db->first("user","*","email='$this->admin_email' AND password='$this->password' AND status='Active'");
           if($this->inserted->num_rows>0)
           {
           	  $this->session_data=$this->inserted->fetch_assoc();
           	  if($this->session_data)
           	  {
	           	  Session::set("login",true);
	           	  Session::set("FirstName",$this->session_data['first_name']);
	           	  Session::set("LastName",$this->session_data['last_name']);
	           	  Session::set("Email",$this->session_data['email']);
	           	  header('Location:../Admin_panel/index.php');
           	  }
           	  else
           	  {
                header('Location:Login_panel/index.php');
           	  }
           }
           else
           {
           	echo $this->fm->error("Email And Password Not Matched");
           }
		}
	}
	// public function logout()
	// {
	// 	Session::destroy();
	// }
}