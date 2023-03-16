<?php
    use User\Uwriters\app\Http\Security\Auth\Session;
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.auth.nav.php');

?>

<div class="container display-flex m-b-20">
    <?php
        Application::$app->router->resource('views.layouts.auth.side.php');
       
    ?>
    
    <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white box-shadow ">
        <div class="stats display-flex p-20">
           
			<div class="profile">
               <div class="form ">
                   <?php if(isset($msg)){
                        echo $msg;
                        }?>
                   <form action=""  enctype="multipart/form-data" method="post" class="b-n b-white p-10-0 col-8 m-a display-flex">
                       <div class="w-p-100 text-center">
                           <img class="w-70 h-70 m-b-20 box-shadow b-r-50 " id="profileImageShow" src="/storage/admin/<?php echo Dash::profile()['img'];?>">
                           <input type="file" class="d-n" name="profileimg" id="profileImage">
                       </div>
                       <div class="name w-p-100" style="display:flex; flex-wrap:wrap">
                            <input class ="p-10-15 m-4-0 col-4 f-s-17" style="flex:1;flex-wrap:wrap" type="text" name="name" id="" value="<?php echo Dash::profile()['firstname'];?>">
                            <input class ="p-10-15 m-4-0 col-4 f-s-17" style="flex:1;flex-wrap:wrap"  type="text" name="sname" id="" value="<?php echo Dash::profile()['secondname']; ?>">
                       </div>
                       <input class ="p-10-15 m-4-0 w-p-100 f-s-17" type="text" name="email" id="" value="<?php echo Dash::profile()['email'];?>">
                        <textarea name="bio" id="bio" rows="10" class ="p-10-5 f-s-17 m-4-0 w-p-100"><?php echo Dash::profile()['bio'];?></textarea>
                       <div class="btn w-p-100 p-t-10">
                            <button name="updateDetails" value="Btn"  class="f-s-17 p-10-30 b-r-2 b-n bg-fade1 c-white float-left">Save</button>
                       </div>
                    </form>
               </div>
           </div>
            
        </div>
    </div>
</div>

<script>

          var profileImageShow = document.querySelector("#profileImageShow");
            profileImageShow.onclick = (()=>{
                document.querySelector("#profileImage").click();
            });


            const profileImage = document.querySelector("#profileImage");
            profileImage.addEventListener("change", function(){
                
                const reader = new FileReader();
                reader.addEventListener("load", ()=>{
                    const profileImageShow = reader.result;
                const img =  document.querySelector("#profileImageShow");
                img.src = `${profileImageShow}`;
                

                });
                reader.readAsDataURL(this.files[0]);
            });
    </script>
    
  
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>

     
