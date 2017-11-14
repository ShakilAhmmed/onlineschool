<?php
class Setup{

	private $db;
	private $fm;
	protected $birthdate;
	protected $gender;
	protected $phone;
	protected $email;
	protected $basic;
	protected $data;
	protected $profile_image;
	protected $profile_image_tmp;
	protected $div;
	protected $ext;
	protected $grant;
	protected $path;
  protected $profile;
  protected $password;
  protected $retype_password;
	protected $third;


   public function __construct()
   {
		$this->db  =new Database;
		$this->fm  =new Format;
	}
	public function basic_information($data,$email)
	{
       $this->birthdate=mysqli_real_escape_string($this->db->connection,$data['birthdate']);
       $this->gender=mysqli_real_escape_string($this->db->connection,$data['gender']);
       $this->phone=mysqli_real_escape_string($this->db->connection,$data['phone']);
       $this->email=mysqli_real_escape_string($this->db->connection,$email);
       foreach ($data as $value) {
       	$this->fm->validation($value);
       }
       if(empty($this->birthdate)||empty($this->gender)||empty($this->phone))
       {
       	  echo $this->fm->error("Field Is Empty");
       }else
       {
       	 $this->basic=$this->db->update("user","birth_date='$this->birthdate',gender='$this->gender',phone='$this->phone'","email='$this->email'");
       	 if($this->basic)
       	 {
       	 	echo $this->fm->success("Basic Information Updated Successfully");
       	 }
       	 else
       	 {

       	 	echo $this->fm->error("Somthing Went Wrong");
       	 }
       }
	}

	public function admin_data($email)
	{  
		$this->email=mysqli_real_escape_string($this->db->connection,$email);
		$this->data=$this->db->first("user","*","email='$this->email'");
		if($this->data)
		{
			return $this->data->fetch_assoc();
		}
	}

	public function upload_image($file,$email)
	{
		$this->email=mysqli_real_escape_string($this->db->connection,$email);
        $this->profile_image=$file['image']['name'];
        $this->profile_image_tmp=$file['image']['tmp_name'];
        $this->div=explode(".",$this->profile_image);
        $this->ext=strtolower(end($this->div));
        $this->path="images/Profile/".$email.".".$this->ext;
        $this->grant=['png','jpg','jpeg','gif'];
       
       if(in_array($this->ext, $this->grant))
       {
       	  
         $this->profile=$this->db->update("user","profile='$this->path'","email='$this->email'");
       	  if($this->profile)
       	  {
             move_uploaded_file($this->profile_image_tmp,$this->path);
       	  	echo $this->fm->success("Profile Picture Updated Succesfully");
       	  }
       	  else
       	  {
       	  	echo $this->fm->error("Somthing Went Wrong");
       	  }
       }
       else
       {
       	 echo $this->fm->error("Png,Jpg,Jpeg,Gif,File Are Supported");
       }
	}

  public function third_information($data,$email)
  {
     $this->password=mysqli_real_escape_string($this->db->connection,base64_encode($data['password']));
     $this->retype_password=mysqli_real_escape_string($this->db->connection,base64_encode($data['retype_password']));
     foreach ($data as  $value) {
       $this->fm->validation($value);
     }
     if (empty($this->password)||empty($this->retype_password)) {
      echo $this->fm->error("Input Field Must Required");
     }
     else
     {
        if($this->password==$this->retype_password)
        {
           $this->third=$this->db->update("user","password='$this->password'","email='$email'");
           if($this->third)
           {
            echo $this->fm->success("Password Changed Successfully");
           }
           else
           {
            echo $this->fm->error("Somthing Went Wrong");
           }
        }
        else
        {
          echo $this->fm->error("Password Not Matched");
        }
     }
  }

	
}