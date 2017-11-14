<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<center>
<div class="container">
<?php
$setup=new Setup;
$email=Session::get("Email");
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['basic']))
{
	$basic=$setup->basic_information($_POST,$email);
}
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['upload']))
{
 
	$profile_image=$setup->upload_image($_FILES,$email);
}
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['third']))
{
  $third=$setup->third_information($_POST,$email);
}
$value=$setup->admin_data($email);

?>
         <div>
        <h2>User Profile</h2><hr>
     </div>


<div class="col-sm-12">

    <div class="col-sm-6">
      <div class="image_part">
    <img style="width: 30%" class="img-circle"  src="<?=$value['profile']?>" onerror="this.src='images/blankavatar.png';">
     </div>
    </div>

</div>



<div class="col-sm-12">
    <div class="col-sm-6">
        <div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <td class="text-center"> 
                        <center>

                        <?php
                     echo Session::get("FirstName")." ".Session::get("LastName");
                       ?>
                        </center>
                    </td>
                    </tr>
                    <tr><td style="color:green"><i class="fa fa-check-circle-o" aria-hidden="true"></i> &nbsp; Active</td></tr>
                </thead>
            </table>
        </div>
    </div>



</div>
</div>



<div class="container">
  <div class="row">
      <div class="col-sm-12">


              <div class="container">
          <h1 class="heading-primary"></h1>
          <div class="accordion">
            <dl>
              <dt>
                <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Basic Information</a>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
              <form action="" method="post">
                  <table class="table table-responsive">
                    <thead>
                        <tr>
                          <td>Birth Date</td>
                          <td><input type="Date" class="form-control" value="<?=$value['birth_date']?>" name="birthdate"></td>
                        </tr>

                        <tr>
                          <td>Gender</td>
                          <td>
	                          <input type="radio"  name="gender" value="Male"
                            <?php
                             if($value['gender']=='Male')
                             {
                             	echo "checked";
                             }
                            ?> >Male 
	                          <input type="radio" name="gender" value="Female"
                               <?php
                             if($value['gender']=='Female')
                             {
                             	echo "checked";
                             }
                            ?> >Female
                          </td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><input type="text" class="form-control" value="<?=$value['phone']?>" name="phone"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-success" name="basic"></td>
                        </tr>
                    </thead>
                  </table>
                </form>
              </dd>
              <dt>
                <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">
                  Profile Picture</a>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
<form action=" " method="post" class="dropzone" enctype="multipart/form-data">
  <div class="">
    <input type="file" name="image"/>
  </div>
  <input type="submit" name="upload" value="Upload" class="btn btn-success" />
</form>
         </dd>
              <dt>
                <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">
                  Third Accordion Information
                </a>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
 
               <form action=" " method="post">
                  <table class="table table-responsive">
                    <thead>
                        <tr>
                          <td>Email</td>
                          <td><input type="text" class="form-control" value="<?=$email?>"></td>
                        </tr>
                        <tr>
                        <td>Old Password</td>
                          <td><input type="password" class="form-control"  id="con_oldpass" name=""></td>
                          <td><input type="hidden" class="form-control" id="oldpass"  value="<?=base64_decode($value['password'])?>"><span id="oldpassmsg"></span></td>
                          
                        </tr>

                        <tr>
                          <td>New Password</td>
                          <td>
                       <input type="password" id="new_password" class="form-control" name="password">
                          <span id="new_password_msg"></span>
                          </td>
                        </tr>

                        <tr>
                          <td>Re-Type Password</td>
                          <td><input type="password" id="retype_password" class="form-control" name="retype_password">
                          <span id="retype_password_msg"></span>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input type="submit" class="btn btn-success" id="third" name="third" value="Save">
                        </tr>
                      </thead>
                  </table>
                </form>
              </dd>
            </dl>
          </div>
        </div>


      </div>
  </div>
</div>
</div>
</center/>

<style type="text/css">

//updated ver
* {
  box-sizing:border-box;
}
@import url(https://fonts.googleapis.com/css?family=Lato:400,700);
body {

  font-family:'Lato';
}
.heading-primary {
  font-size:2em;
  padding:2em;
  text-align:center;
}
.accordion dl,
.accordion-list {
   border:1px solid #ddd;
   &:after {
       content: "";
       display:block;
       height:1em;
       width:100%;
       background-color:darken(#38cc70, 10%);
     }
}
.accordion dd,
.accordion__panel {
   background-color:#eee;
   font-size:1em;
   line-height: 5.5em;
}
.accordion p {
  padding:1em 2em 1em 2em;
}

.accordion {
    position:relative;
    background-color:#eee;
}
.container {
  max-width:960px;
  margin:0 auto;
  padding:2em 0 2em 0;
}
.accordionTitle,
.accordion__Heading {
 background-color:#37414B;
   text-align:center;
     font-weight:700;
          padding:2em;
          display:block;
          text-decoration:none;
          color:#fff;
          transition:background-color 0.5s ease-in-out;
  border-bottom:1px solid darken(#38cc70, 5%);
  &:before {
   content: "+";
   font-size:1.5em;
   line-height:0.5em;
   float:left;
   transition: transform 0.3s ease-in-out;
  }
  &:hover {
    background-color:darken(#38cc70, 10%);
  }
}
.accordionTitleActive,
.accordionTitle.is-expanded {
   background-color:darken(#38cc70, 10%);
    &:before {

      transform:rotate(-225deg);
    }
}
.accordionItem {
    height:auto;
    overflow:hidden;
    //SHAME: magic number to allow the accordion to animate

     max-height:50em;
    transition:max-height 1s;


    @media screen and (min-width:48em) {
         max-height:15em;
        transition:max-height 0.5s

    }


}

.accordionItem.is-collapsed {
    max-height:0;
}
.no-js .accordionItem.is-collapsed {
  max-height: auto;
}
.animateIn {
     animation: accordionIn 0.45s normal ease-in-out both 1;
}
.animateOut {
     animation: accordionOut 0.45s alternate ease-in-out both 1;
}
@keyframes accordionIn {
  0% {
    opacity: 0;
    transform:scale(0.9) rotateX(-60deg);
    transform-origin: 50% 0;
  }
  100% {
    opacity:1;
    transform:scale(1);
  }
}

@keyframes accordionOut {
    0% {
       opacity: 1;
       transform:scale(1);
     }
     100% {
          opacity:0;
           transform:scale(0.9) rotateX(-60deg);
       }
}
</style>


<script type="text/javascript">
  //uses classList, setAttribute, and querySelectorAll
//if you want this to work in IE8/9 youll need to polyfill these
(function(){
  var d = document,
  accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
  setAria,
  setAccordionAria,
  switchAccordion,
  touchSupported = ('ontouchstart' in window),
  pointerSupported = ('pointerdown' in window);

  skipClickDelay = function(e){
    e.preventDefault();
    e.target.click();
  }

    setAriaAttr = function(el, ariaType, newProperty){
    el.setAttribute(ariaType, newProperty);
  };
  setAccordionAria = function(el1, el2, expanded){
    switch(expanded) {
      case "true":
        setAriaAttr(el1, 'aria-expanded', 'true');
        setAriaAttr(el2, 'aria-hidden', 'false');
        break;
      case "false":
        setAriaAttr(el1, 'aria-expanded', 'false');
        setAriaAttr(el2, 'aria-hidden', 'true');
        break;
      default:
        break;
    }
  };
//function
switchAccordion = function(e) {
  console.log("triggered");
  e.preventDefault();
  var thisAnswer = e.target.parentNode.nextElementSibling;
  var thisQuestion = e.target;
  if(thisAnswer.classList.contains('is-collapsed')) {
    setAccordionAria(thisQuestion, thisAnswer, 'true');
  } else {
    setAccordionAria(thisQuestion, thisAnswer, 'false');
  }
    thisQuestion.classList.toggle('is-collapsed');
    thisQuestion.classList.toggle('is-expanded');
    thisAnswer.classList.toggle('is-collapsed');
    thisAnswer.classList.toggle('is-expanded');

    thisAnswer.classList.toggle('animateIn');
  };
  for (var i=0,len=accordionToggles.length; i<len; i++) {
    if(touchSupported) {
      accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
    }
    if(pointerSupported){
      accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
    }
    accordionToggles[i].addEventListener('click', switchAccordion, false);
  }
})();
</script>
<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#con_oldpass").unbind().keyup(function(){
      var con_oldpass=$(this).val();
      var oldpass    =$("#oldpass").val();
      if(con_oldpass==oldpass)
      {
        $("#oldpassmsg").html("<font color='#27ae60'>Password Matched</font>");
        $("#third").attr('disabled',false);
      }
      else
      {
        $("#oldpassmsg").html("<font color='red'>Password Not Matched</font>");
        $("#third").attr('disabled','disabled');
      }
    });
    $("#new_password").unbind().keyup(function(){
      var new_password=$(this).val().length;
      if(new_password<9)
      {
        $("#new_password_msg").html("<font color='red'>Password Week</font>");
        $("#third").attr('disabled','disabled');
      }
      else
      {
        $("#new_password_msg").html("<font color='#27ae60'>Password Strong</font>");
        $("#third").attr('disabled',false);
      }
    });

    $("#retype_password").unbind().keyup(function(){
      var new_password   =$("#new_password").val();
      var retype_password=$("#retype_password").val();
      if(new_password==retype_password)
      {
         $("#retype_password_msg").html("<font color='#27ae60'>Password Matched</font>");
         $("#third").attr('disabled',false);
      }
      else
      {
         $("#retype_password_msg").html("<font color='red'>Password Not Matched</font>");
         $("#third").attr('disabled','disabled');
      }
    });
 



  });
</script>