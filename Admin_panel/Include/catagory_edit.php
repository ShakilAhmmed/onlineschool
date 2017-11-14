<?php
$email=Session::get("Email");
$catagory=new Catagory;

if(isset($_GET['edit']))
{
   $edit_id=base64_decode($_GET['edit']);
   $edit_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$edit_id);
   $value=$catagory->catagory_edit_data($edit_id,$email);
} 
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
  $edit_id=base64_decode($_GET['edit']);
   $edit_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$edit_id);
  $catagory->catagory_edit($_POST,$edit_id,$email);
}


?>


 <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4"><?=$value['catagory_title']?> 's Catagory Edit</h5>
                                    <form class="forms-sample" action="" method="post">
                                        <table class="table table-responsive">
                                    <thead>
                        <tr>
                          <td>Title</td>
                          <td><input type="text" class="form-control" value="<?=$value['catagory_title']?>" name="catagory_title"/></td>
                        </tr>
                        <tr>
                        <td>Catagory Slug</td>
                          <td>
                              <input type="text" class="form-control" value="<?=$value['catagory_slug']?>" name="catagory_slug">
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>
                             <select class="form-control" name="catagory_status">
                                  <option>Active</option>
                                  <option>Inactive</option>
                             </select>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input type="submit" class="btn btn-success" id="edit" name="submit" value="Save">
                        </tr>
                      </thead>
                  </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>