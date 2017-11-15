<?php
error_reporting(true);
 class Database{
    private $host   =DB_SERVER;
    private $user   =DB_USER;
    private $pass   =DB_PASSWORD;
    private $db_name=DB_NAME;
    protected $query;
    protected $insert_data;
    protected $first_data;
    protected $get_data;
    protected $update_data;
    protected $delete_data;


    public $connection;

    public function __construct()
    {
      $this->ConnectDb();
    }

    private function ConnectDb()
    {
      $this->connection=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
      if($this->connection->connect_errno)
      {
        die("Error".$this->connection->error.__LINE__);
      }
    }


    public function insert($table,$value){
    $this->query="INSERT INTO $table SET $value";
    $this->insert_data=$this->connection->query($this->query) or die($this->connection->error.__LINE__);
     if($this->connection->affected_rows>0)
     {
       return $this->insert_data;
     }else
     {
      return false;
     }
  }

  public function  first($table,$column,$condition)
  {
    $this->query="SELECT $column FROM $table WHERE $condition";
    $this->first_data=$this->connection->query($this->query) or die($this->connection->error.__LINE__);
    if($this->first_data->num_rows>0)
    {
      return $this->first_data;
    }
    else
    {
      return false;
    }
  }

 public function  update($table,$values,$condition)
  {
    $this->query="UPDATE $table SET $values WHERE $condition";
    $this->update_data=$this->connection->query($this->query) or die($this->connection->error.__LINE__);
    if($this->connection->affected_rows>0)
    {
      return $this->update_data;
    }
    else
    {
      return false;
    }
  }
   public function  delete($table,$condition)
  {
    $this->query="DELETE FROM $table WHERE $condition";
    $this->delete_data=$this->connection->query($this->query) or die($this->connection->error.__LINE__);
    if($this->connection->affected_rows>0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
   public function  get($table,$column)
  {
    $this->query="SELECT $column FROM $table";
    $this->get_data=$this->connection->query($this->query) or die($this->connection->error.__LINE__);
    if($this->get_data->num_rows>0)
    {
      return $this->get_data;
    }
    else
    {
      return false;
    }
  }

 




}
