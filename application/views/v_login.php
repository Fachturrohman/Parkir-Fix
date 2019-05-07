<!DOCTYPE html>
<html lang="en">
<head>
 <title>Test Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url()?>vendors/fa/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
 body{padding-top:20px;}
</style>

</head>
<body>
 <div class="container">
    <div class="row">
  <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><center>Harap Login</center></h3>
    </div>
      <div class="panel-body">
        <form accept-charset="UTF-8" role="form" id="f_login" method="POST" action="<?=base_url()?>login/do_login/">
                    <fieldset>
           <div class="form-group">
             <input class="form-control" placeholder="Username" name="username" id="username" type="text">
         </div>
         <div class="form-group">
          <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
         </div>
         <div class="checkbox">
             <label>
              <input name="remember" type="checkbox" value="Remember Me"> Remember Me
             </label>
            </div>

            <button class="btn btn-lg btn-success btn-block" type="submit" id="btn_login" data-loading-text="<i class='fa fa-spinner fa-spin fa-lg'></i>">Login</button>

        </fieldset>
          </form>
       </div>
   </div>
  </div>
 </div>
</div>
 
 <script src="<?=base_url()?>vendors/jquery/jquery.min.js"></script>
 <script src="<?=base_url()?>vendors/bootstrap/js/bootstrap.min.js"></script>

 <script type="text/javascript">
  $(document).ready(function(){
   $('#f_login').submit(function(evt){
             evt.preventDefault();
              $('#btn_login').button('loading');
              var formData = new FormData(this);
              $.ajax({
                    type : 'POST',
                    url : $(this).attr('action'),
                    data : formData,
                    cache : false,
                    contentType : false,
                    processData : false,
                    success:function(response) {
                     
                        if (response.st==1) {
                         window.location.replace("<?=base_url()?>c_pendataan/");
                        } else {
                         alert('Invalid username and Password!');
                         $('#btn_login').button('reset');
                         $('#username').focus();
                        }
                     
                    },dataType :'json'
                });
         });
  });
 </script>
</body>
</html>