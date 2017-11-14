<?php
$email=Session::get("Email");
$catagory=new Catagory;
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{ 
  $catagory->new_catagory($_POST);
}
if(isset($_GET['delete']))
{
   $delete_id=base64_decode($_GET['delete']);
   $delete_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$delete_id);
   $catagory->delete_catagory($delete_id,$email);
} 

if(isset($_GET['status']))
{
   $status_id=base64_decode($_GET['status']);
   $status_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$status_id);
   $catagory->status_catagory($status_id,$email);
} 


?>
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Catagory</h5>
                                    <form class="forms-sample" action="" method="post">
                                        <table class="table table-responsive">
                                    <thead>
                        <tr>
                          <td>Title</td>
                          <td><input type="text" class="form-control" name="catagory_title"/></td>
                        </tr>
                        <tr>
                        <td>Catagory Slug</td>
                          <td>
                              <input type="text" class="form-control" name="catagory_slug">
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
                          <td>
                             <input type="hidden" class="form-control" name="email" value="<?=$email?>"/>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input type="submit" class="btn btn-success" id="third" name="submit" value="Save">
                        </tr>
                      </thead>
                  </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Catagory List</h5>
                                    <div class="table-responsive">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Sl No</th>
                                                    <th>Catagory Title</th>
                                                    <th>Catagory Slug</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                <?php
                                                $catagory_data=$catagory->catagory_list();
                                                if($catagory_data)
                                                {
                                                    $i=0;
                                                    while ($catagory_data_value=$catagory_data->fetch_assoc()) {
                                                        $i++;
                                                 ?>
                                                <td><?=$i?></td>
                                                <td><?=$catagory_data_value['catagory_title']?></td>
                                                <td><?=$catagory_data_value['catagory_slug']?></td>
                                                <td>
                                             <?php 
                                               if($catagory_data_value['catagory_status']=='Active')
                                               {
                                                ?>
                                               <span style="color: green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$catagory_data_value['catagory_status']?></span>
                                                <?php
                                               }
                                               else
                                               {
                                                ?>
                                            <span style="color: red;"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<?=$catagory_data_value['catagory_status']?></span>
                                               <?php
                                               }
                                               ?>
                                                </td>
                                               <td>
                                               <a href="?page=catagory_edit&&edit=<?=base64_encode($catagory_data_value['id'])?>">
                                                  <button class="btn btn-info">EDIT</button>
                                               </a>
                                    <a href="?page=catagory&&delete=<?=base64_encode($catagory_data_value['id'])?>" onclick="return confirm('Are You Sure?')">
                                                  <button class="btn btn-danger">DELETE</button>
                                               </a>
                                            
                                               <?php 
                                               if($catagory_data_value['catagory_status']=='Active')
                                               {
                                                ?>
                         <a href="?page=catagory&&status=<?=base64_encode($catagory_data_value['id'])?>">
                                        <button class="btn btn-warning"> INACTIVE</button>
                                </a>
                                                <?php
                                               }
                                               else
                                               {
                                                ?>
                                                  <a href="?page=catagory&&status=<?=base64_encode($catagory_data_value['id'])?>">
                                                 <button class="btn btn-success"> ACTIVE</button>
                                                </a>
                                               <?php
                                               }
                                               ?>
                                            </td>
                                                </tr>
                                                <?php
                                               }
                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>