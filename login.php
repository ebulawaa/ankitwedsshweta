<?php include('head.php');
if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
}else{
?>
<body>
<div class="container">
   <form class="form-signin" method="POST" id="theForm">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="messages"></div>
        <div class="form-group">
		    <label for="inputEmail" class="sr-only">Email address</label>
        	<input type="email" id="inputEmail" autocomplete="off" class="form-control" name="email" placeholder="Email address" required autofocus>
		</div>     
		<div class="form-group">   
        	<label for="inputPassword" class="sr-only">Password</label>
        	<input type="password" id="inputPassword" autocomplete="off" class="form-control" name="password" placeholder="Password" required>
        </div>
        <p><a href="signup.php">Create New Account</a></p>
        <button class="btn btn-primary btn-block" id="loginbtn" type="submit">Sign in</button>
    </form>
</div>

</body>
</html>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#theForm').on('submit', function(e) {
		if (!e.isDefaultPrevented()) {
			var data = $('#theForm').serialize();
		    $.ajax({
		    	url: "siteajax.php?login", 
		    	type:'POST',
		    	data:data,
		    	success: function(data){
		        	var messageAlert = 'alert-' + data.type;
	                var messageText = data.message;
	                //alert(messageText);
	                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
	                if (messageAlert && messageText) {
	                    $('#theForm').find('.messages').html(alertBox);
	                    if (data.type == 'success') {
	                        window.location.replace("index.php");
	                    }
	                }
		    	}
			});
			return false;
		}
	});
});
</script>