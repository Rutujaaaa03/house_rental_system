<?php 

include("navbar.php");

 ?>
 <style>

  body{
  align-items:center;
  background: url(bg9.jpg) no-repeat;
  background-size: cover;
  background-position: center;
  justify-content:"center";
}
.Box1 {
    display: flex;
    justify-content: center;
    align-items: center;
    margin:5% 0;
    width: 100%;
  }

.wrapper{
  width:60%;
  align-items: center;
  justify-content:"center";
  background: transparent;
  border: 3px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(9px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  align-items: center;
  justify-content:"center";
  position: relative;
  width: 60%;
  height: 50px;
  margin: 40px 120px;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 20px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: gray;
}
.input-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;

}

.remember-forgot label input{
  accent-color: #fff;
  margin-right: 3px;

}
.wrapper .btn{
  width: 40%;
  height: 45px;
  background: transparent;
  border-color: white;
  outline: white;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color:#fff;
  font-weight: 600;
}
.wrapper .register-link{
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;

}
.register-link p a{
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover{
  text-decoration: underline;
}
.register{
  align-items:center;
}
</style>
<body>
<div class="Box1">
  <div class="wrapper">
  <h1 style="font-weight: bold; text-align: center">Tenant Register</h1><hr><br>
  <form method="POST" action="tenant-engine.php" enctype="multipart/form-data">
    <div class="input-box">
      <label for="full_name">Full Name:</label>
      <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" required>
      <i class='bx bxs-user,form-control'></i>
    </div>
    <div class="input-box">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
      <i class='bx bxs-user,form-control'></i>
    </div>
    <div class="input-box">
      <label for="password1">Password:</label>
      <input type="password" class="form-control" id="password1" placeholder="Enter Password" name="password" required>
    </div>
    <div class="input-box">
      <label for="password2">Confirm Password:</label>
      <input type="password" class="form-control" id="password2" placeholder="Enter Password Again" required>
    </div>
    <div class="input-box">
      <label for="phone_no">Phone No.:</label>
      <input type="text" class="form-control" id="phone_no" placeholder="Enter Phone No." name="phone_no" required>
    </div>
    <div class="input-box">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
    </div>
    <div class="input-box">
      <label for="id_type">Type of ID:</label>
      <select style="background: transparent;" class="form-control" name="id_type" required>
        <option>Citizenship</option>
        <option>Driving Licence</option>
      </select>
    </div>
    <div class="input-box">
      <label for="card_photo">Upload your Selected Card:</label>
      <input type="file" class="form-control" placeholder="Upload id photo" name="id_photo" accept="image/*" onchange="preview_image(event)" required>
    </div>
    <div class="form-group">
      <label>Your selected File:</label><br>
      <img src="" id="output_image"/ height="50px" required>
    </div>
    <hr>
    <center><button id="submit" name="tenant_register" class="btn btn-primary btn-block" onclick="return Validate()">Register</button></center><br>
    <div class="iform-group text-right">
      <label class="register">Register as a <a href="owner-register.php">Owner</a>?</label><br>
    </div><br><br>
  </form>
</div>
</div>
</body>
<script type='text/javascript'>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>