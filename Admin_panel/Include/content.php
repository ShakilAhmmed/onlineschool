   <?php
   $email=Session::get("Email");
   $content=new Content;
   if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
   {
      $content->add_new_content($_POST,$_FILES);
   }
   ?>

   <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Content</h5>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <table class="table table-responsive">
                                    <thead>
                        <tr>
                          <td>Title</td>
                          <td><input type="text" class="form-control" name="content_title"/></td>
                        </tr>
                         <tr>
                           <td>Author</td>
                           <td><input type="text" class="form-control" value="<?=$email?>" name="content_author"/></td>
                        </tr>
                        <tr>
                        <td>Catagory</td>
                          <td>
                              <select class="form-control" name="content_catagory">
                              <?php
                             $catagory_data=$content->catagory_list();
                             if($catagory_data)
                             {
                              while ($catagory_data_value=$catagory_data->fetch_assoc()) {
                              ?>
                                <option><?=$catagory_data_value['catagory_title']?></option>
                                <?php
                               }
                             }
                            ?>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Content</td>
                          <td>
                            <video width="400" controls>
                                <source src="mov_bbb.mp4" id="video_here">
                                  Your browser does not support HTML5 video.
                            </video>
                          <input type="file" name="video" class="file_multi_video" accept="video/*">
                          </td>
                        </tr>
                         <tr>
                          <td>Post</td>
                          <td>
                           <textarea class="form-control" name="post"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>
                             <select class="form-control" name="content_status">
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
                          <td><input type="submit" class="btn btn-success" id="save" name="submit" value="Save">
                        </tr>
                      </thead>
                  </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on("change", ".file_multi_video", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
</script>