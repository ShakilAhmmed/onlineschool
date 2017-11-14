<?php
   $content=new Content;
   $email=Session::get("Email");
   if(isset($_GET['delete']))
   {
     $delete_id=base64_decode($_GET['delete']);
     $delete_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$delete_id);
     $content->delete_content($delete_id,$email);
   }
   if(isset($_GET['status']))
{
   $status_id=base64_decode($_GET['status']);
   $status_id=preg_replace('/[^-a-zA-Z0-9_]/', '',$status_id);
   $content->status_content($status_id,$email);
} 
?>


<div class="container-fluid pb-video-container">
    <div class="col-md-10 col-md-offset-1">
        <h3 class="text-center">My Content List</h3>
        <div class="row pb-row">
        <?php
        $content_list_data=$content->content_list();
        if($content_list_data)
        {
            while($content_list_data_value=$content_list_data->fetch_assoc())
          {
        ?>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="<?=$content_list_data_value['video']?>" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">
                Title : <?=$content_list_data_value['content_title']?> </br/>
                Catragory : <?=$content_list_data_value['content_catagory']?></br/>
                Post : <?=$content_list_data_value['post']?></br/>
                <a href="?page=content_list&&delete=<?=base64_encode($content_list_data_value['id'])?>"
                onclick="return confirm('Are You Sure?')" >
                <input type="button" class="btn btn-danger" value="Delete" name="delete">
                </a>
                <?php
                 if($content_list_data_value['content_status']=='Active')
                 {
                ?>
                <a href="?page=content_list&&status=<?=base64_encode($content_list_data_value['id'])?>">
                <input type="button" class="btn btn-warning" value="Inactive" name="delete">
                </a>
                <?php
                }
                else
                {
              ?>
               <a href="?page=content_list&&status=<?=base64_encode($content_list_data_value['id'])?>"">
                <input type="button" class="btn btn-info" value="Active" name="delete">
                </a>
            <?php
                }
            ?>
              </label>
            </div>
        <?php
       }
      }
    ?>
            <!-- <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/wjT2JVlUFY4?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">Manuel Riva - Mhm Mhm</label>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/papuvlVeZg8?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">Clean Bandit - Rockabye</label>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Y1_VsyLAGuk?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">Burak Yeter - Tuesday</label>
            </div>
        </div>
        <div class="row pb-row">
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/UY1bt8ilps4?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">F.O. and Peeva - Lichnata</label>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">Machine Gun - Bad Things</label>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/h3kRIxLruDs?ecver=" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">INNA - Say it with your body</label>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Jr4TMIU9oQ4?ecver=1" frameborder="0" allowfullscreen></iframe>
                <label class="form-control label-warning text-center">INNA - Gimme Gimme</label>
            </div> -->
        </div>
    </div>
</div>

<style>
    .pb-video-container {
        padding-top: 20px;
        background: #bdc3c7;
        font-family: Lato;
    }

    .pb-video {
        border: 1px solid #e6e6e6;
        padding: 5px;
    }

        .pb-video:hover {
            background: #2c3e50;
        }

    .pb-video-frame {
        transition: width 2s, height 2s;
    }

        .pb-video-frame:hover {
            height: 300px;
        }

    .pb-row {
        margin-bottom: 10px;
    }
</style>