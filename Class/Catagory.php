<?php
class Catagory{

    private $db;
	private $fm;
	private $id;
	private $catagory_title;
	private $catagory_slug;
	private $catagory_status;
	private $email;
	private $inserted;
	private $data;
	private $data_user;
	private $delete_id;
	private $deleted;
	private $status_id;
	private $active;
	private $inactive;
	private $value;
	private $catagory_data;
	private $edit_id;
	private $catagory_name;
	

   public function __construct()
   {
		$this->db  =new Database;
		$this->fm  =new Format;
	}

	public function new_catagory($data)
	{
		// foreach ($data as $value) {
  //     	$this->fm->validation($value);
  //     }
	  $this->id=time();
      $this->catagory_title=mysqli_real_escape_string($this->db->connection,$data['catagory_title']);
      $this->catagory_title=$this->fm->validation($this->catagory_title);
      $this->catagory_slug=mysqli_real_escape_string($this->db->connection,$data['catagory_slug']);
      $this->catagory_slug=$this->fm->validation($this->catagory_slug);
      $this->catagory_status=mysqli_real_escape_string($this->db->connection,$data['catagory_status']);
      $this->catagory_status=$this->fm->validation($this->catagory_status);
      $this->email=mysqli_real_escape_string($this->db->connection,$data['email']);
       $this->email=$this->fm->validation($this->email);
      
      if(empty($this->catagory_title)||empty($this->catagory_slug)||empty($this->catagory_status)||empty($this->email))
      {
      	echo $this->fm->error("Field Is Required");
      }
      else
      {
         $this->inserted=$this->db->insert("catagory","id='$this->id',catagory_title='$this->catagory_title',catagory_slug='$this->catagory_slug',catagory_status='$this->catagory_status',email='$this->email'");
         if($this->inserted)
         {
         	echo $this->fm->success("$this->catagory_title 's Named Catagory Added");
         }
         else
         {
         	echo $this->fm->error("Somthing Went Wrong");
         }
      }
	}

	public function catagory_list()
	{
		$this->email=Session::get("Email");
		$this->data=$this->db->first("catagory","*","email='$this->email'");
		if($this->data)
		{
			return $this->data;
		}
	}

	public function delete_catagory($delete_id,$email)
	{
      $this->delete_id=mysqli_real_escape_string($this->db->connection,$delete_id);
      $this->email=mysqli_real_escape_string($this->db->connection,$email);
      $this->deleted=$this->db->delete("catagory","id='$this->delete_id' AND email='$this->email'");
      if($this->deleted)
      {
      	echo $this->fm->success("Catagory Deleted SUccessfully");
      }
      else
      {
      	echo $this->fm->error("Something Went Wrong");
      }
	}
	public function status_catagory($status_id,$email)
	{
		$this->status_id=mysqli_real_escape_string($this->db->connection,$status_id);
		$this->email=mysqli_real_escape_string($this->db->connection,$email);
		$this->catagory_data=$this->db->first("catagory","*","id='$this->status_id' AND email='$this->email'");
		if($this->catagory_data)
		{
			$this->value=$this->catagory_data->fetch_assoc();
			if($this->value['catagory_status']=='Active')
			{
			$this->active=$this->db->update("catagory","catagory_status='Inactive'","id='$this->status_id' AND email='$this->email'");
				if($this->active)
				{
				echo $this->fm->success("Status Updated Into Inactive");
				}
				else
				{
					echo $this->fm->error("Something Went Wrong");
				}
			}
			else
			{
				$this->inactive=$this->db->update("catagory","catagory_status='Active'","id='$this->status_id' AND email='$this->email'");
				if($this->inactive)
				{
				echo $this->fm->success("Status Updated Into Inactive");
				}
				else
				{
					echo $this->fm->error("Something Went Wrong");
				}
			}
		}
	}
	public function catagory_edit_data($edit_id,$email)
	{  
	
		  $this->status_id=mysqli_real_escape_string($this->db->connection,$edit_id);
		  $this->email=mysqli_real_escape_string($this->db->connection,$email);
	    $data=$this->db->first("catagory","*","id='$this->status_id' AND email='$this->email'");
       if($data)
       {
       	return $data->fetch_assoc();
       }
	}
	public function catagory_edit($data,$edit_id,$email)
	{

      $this->catagory_title=mysqli_real_escape_string($this->db->connection,$data['catagory_title']);
      $this->catagory_slug=mysqli_real_escape_string($this->db->connection,$data['catagory_slug']);
      $this->catagory_status=mysqli_real_escape_string($this->db->connection,$data['catagory_status']);
      $this->email=mysqli_real_escape_string($this->db->connection,$email);
       $this->status_id=mysqli_real_escape_string($this->db->connection,$edit_id);
      foreach ($data as $value) {
      	$this->fm->validation($value);
      }
      if(empty($this->catagory_title)||empty($this->catagory_slug)||empty($this->catagory_status)||empty($this->email))
      {
      	echo $this->fm->error("Field Is Required");
      }
      else
      {
         $this->inserted=$this->db->update("catagory","catagory_title='$this->catagory_title',catagory_slug='$this->catagory_slug',catagory_status='$this->catagory_status'","id='$this->status_id' AND email='$this->email'");
         if($this->inserted)
         {
         	echo $this->fm->success("$this->catagory_title 's Named Catagory Updated");
         }
         else
         {
         	echo $this->fm->error("Somthing Went Wrong");
         }
      }
	}

	public function catagory_list_user()
	{
		$this->data_user=$this->db->first("catagory","*","catagory_status='Active'");
		if($this->data_user)
		{
			return $this->data_user;
		}
	}
	public function catagory_gallery($catagory_name)
	{
      $this->catagory_name=mysqli_real_escape_string($this->db->connection,$catagory_name);
      $data=$this->db->first("content","*","content_catagory='$this->catagory_name'");
      if($data)
      {
      	return $data;
      }
	}
}