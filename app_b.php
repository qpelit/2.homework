<!--

It is a forum page. It contains home and users pages. I used radio, text, button, alert, dropdowns. 
You can register and after that you can see your info on the Users page.

-->


<?php require_once("header.php"); ?>
<?php

	// require another php file
	// ../../../ => 3 folders back
	require_once("../../config.php");

	$everything_was_okay = true;
	$log_everything_was_okay = true;
	//*********************
	//  Register field validation
	//*********************
	if(isset($_GET["user_name"])){ //if there is ?to= in the URL
		if(empty($_GET["user_name"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please enter your username! <br>"; // yes it is empty
		}else{
			//echo "To: ".$_GET["user_name"]."<br>"; //no it is not empty
		}
	}else{
		$everything_was_okay = false; // do not exist
	}

	//check if there is variable in the URL
	if(isset($_GET["password"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty($_GET["password"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter your password! <br>";
		}else{
			//its not empty
			//echo "Message: ".$_GET["message"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	//*********************
	//  login field validation
	//*********************
if(isset($_GET["log_user_name"])){ //if there is ?to= in the URL
		if(empty($_GET["log_user_name"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please enter your username! <br>"; // yes it is empty
		}else{
			//echo "To: ".$_GET["user_name"]."<br>"; //no it is not empty
		}
	}else{
		$log_everything_was_okay = false; // do not exist
	}

	//check if there is variable in the URL
	if(isset($_GET["log_password"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty($_GET["log_password"])){
			//it is empty
			$log_everything_was_okay = false;
			echo "Please enter your password! <br>";
		}else{
			//its not empty
			//echo "Message: ".$_GET["message"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$log_everything_was_okay = false;
	}
	
	
	
	/***********************
	**** SAVE TO DB ********
	***********************/
	
	// ? was everything okay

	if($everything_was_okay == true){
		
		//echo "Saving to database ... ";
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_qpelit");
		
		$stmt = $mysql->prepare("INSERT INTO my_Data (user_name, mail, gender, phone, password) VALUES (?,?,?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("sssss", $_GET["user_name"], $_GET["mail"],$_GET["gender"],$_GET["phone"],$_GET["password"]);
		
		//save
      if($stmt->execute()) 
        
?>
		<div class="alert alert-success" role="alert">  <?php echo " ".$_GET["user_name"]; 
?> Saved to DB</div>
<?php
		}else{
			//echo  $stmt['error'];
       
		}
		?>
		
	

<style>

#container {
  width : 800px;
}

.holder {
width : 400px;
height : 300px;


float : left;
}

</style>


	



	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">The Forum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="app_b.php">
					Home
				</a>
			</li>
			
			
			<li>
				<a href="table_b.php">
					Users
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
 

	<div class="container">

        <div class = "holder">
		<h1> Register</h1>
		
		<form>
			<div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="user_name">@</span>
                  <input type="text" name="user_name"  id="user_name" class="form-control" placeholder="Username" aria-describedby="user_name">
                </div>
				</div>
			</div>
            
			<div class="row">
			<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="mail">Mail</span>
                  <input type="text" name="mail"  id="mail" class="form-control" placeholder="name@example.com" aria-describedby="mail">
                </div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-8 col-sm-6">
                                    <div class="input-group">
                  <span class="input-group-addon" id="password">Password</span>
                  <input type="password" name="password"  id="password" class="form-control" placeholder=" " aria-describedby="password">
                </div>
				</div>
			</div>
       
           <div class="radio">
  <label><input type="radio" name="gender" id="gender" value="male">Male</label>


  <label><input type="radio" name="gender" id="gender" value="female">Female</label>
</div>
          
               <div class="row">
<div class="form-group col-md-8 col-sm-8">
  
  <select class="form-control" name="phone" id="phone">
    <optionvalue="iphone">M-Phone Brand</option>
      <option value="iphone">Iphone</option>
    <option value="samsung">Samsung</option>
     <option value="other">Other</option>
  </select>
</div></div>
            <div class="row">
				<div class="col-md-8 col-sm-8">
					<input class="btn btn-success hidden-xs" type="submit" value="Register">
					<input class="btn btn-success btn-block visible-xs-block" type="submit" value="Register">
				</div>
			</div>
		</form>
		


        </div>
        <div class = "holder">
		<h1> Log In</h1>
		<h5> (not available for now)</h5>
		<form>
			<div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="log_user_name">@</span>
                  <input type="text" name="log_user_name"  id="log_user_name" class="form-control" placeholder="Username" aria-describedby="log_user_name">
                </div>
				</div>
			</div>
            
			
            <div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="log_password">Password</span>
                  <input type="password" name="log_password"  id="password" class="form-control" placeholder=" " aria-describedby="log_password">
                </div>
				</div>
			</div>
       
          <br>
            <div class="row">
				<div class="col-md-8 col-sm-6">
					<input class="btn btn-success hidden-xs" type="submit" value="Log In">
					<input class="btn btn-success btn-block visible-xs-block" type="submit" value="login">
				</div>
			</div>
		</form>
		


        </div>
	</div>
  
  </body>
</html>