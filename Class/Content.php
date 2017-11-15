<?php
class Content{

	private $db;
	private $fm;
	private $id;
	private $email;
	private $content_title;
	private $content_author;
	private $content_catagory;
	private $video_name;
	private $video_tmp;
  private $delete_id;
  private $deleted;
	private $content_status;
	private $post;
	private $div;
	private $ext;
	private $path;
	private $inserted;

	   public function __construct()
   {
		$this->db  =new Database;
		$this->fm  =new Format;
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
	 public function add_new_content($data,$file)
	 {
        $this->id=time();
        $this->content_title=mysqli_real_escape_string($this->db->connection,$data['content_title']);
        $this->content_title=$this->fm->validation($data['content_title']);
        $this->content_author=mysqli_real_escape_string($this->db->connection,$data['content_author']);
        $this->content_author=$this->fm->validation($data['content_author']);
     $this->content_catagory=mysqli_real_escape_string($this->db->connection,$data['content_catagory']);
     $this->content_catagory=$this->fm->validation($data['content_catagory']);
     $this->post=mysqli_real_escape_string($this->db->connection,$data['post']);
     $this->post=$this->fm->validation($data['post']);
        $this->content_status=mysqli_real_escape_string($this->db->connection,$data['content_status']);
        $this->content_status=$this->fm->validation($data['content_status']);
        $this->email=mysqli_real_escape_string($this->db->connection,$data['email']);
        $this->email=$this->fm->validation($data['email']);


        $this->video_name  =$file['video']['name'];
        $this->div         =explode(".",$this->video_name);
        $this->ext         =strtolower(end($this->div));
        $this->path        ="Video/".time().".".$this->ext;
        $this->video_tmp   =$file['video']['tmp_name'];

        if(empty($this->content_title)||empty($this->content_author)||empty($this->content_catagory)||empty($this->content_status)||empty($this->video_name))
        {
        	echo $this->fm->error("Field Is Required");
        }
        else
        {
        	if($this->ext!="mp4")
        	{
        		echo $this->fm->error("Only Mp4 File Is Supported");
        	}
        	else
        	{
        		move_uploaded_file($this->video_tmp,$this->path);
        		$this->inserted=$this->db->insert("content","id='$this->id',content_title='$this->content_title',content_author='$this->content_author',content_catagory='$this->content_catagory',video='$this->path',post='$this->post',content_status='$this->content_status',email='$this->email'");
              if($this->inserted)
              {
              	
              	echo $this->fm->success("New Content Uploaded");
              }
              else
              {
              	echo $this->fm->error("Somthing Went Wrong");
              }
        	}
        }
	 }


   public function content_list()
  {
    $this->email=Session::get("Email");
    $this->data=$this->db->first("content","*","email='$this->email'");
    if($this->data)
    {
      return $this->data;
    }
  }
  public function delete_content($delete_id,$email)
  {
      $this->delete_id=mysqli_real_escape_string($this->db->connection,$delete_id);
      $this->email=mysqli_real_escape_string($this->db->connection,$email);
      $this->deleted=$this->db->delete("content","id='$this->delete_id' AND email='$this->email'");
      if($this->deleted)
      {
        echo $this->fm->success("Content Deleted Successfully");
      }
      else
      {
        echo $this->fm->error("Something Went Wrong");
      }
  }
    public function status_content($status_id,$email)
  {
    $this->status_id=mysqli_real_escape_string($this->db->connection,$status_id);
    $this->email=mysqli_real_escape_string($this->db->connection,$email);
    $this->catagory_data=$this->db->first("content","*","id='$this->status_id' AND email='$this->email'");
    if($this->catagory_data)
    {
      $this->value=$this->catagory_data->fetch_assoc();
      if($this->value['content_status']=='Active')
      {
      $this->active=$this->db->update("content","content_status='Inactive'","id='$this->status_id' AND email='$this->email'");
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
        $this->inactive=$this->db->update("content","content_status='Active'","id='$this->status_id' AND email='$this->email'");
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
}
