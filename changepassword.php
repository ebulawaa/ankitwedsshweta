<?php include('head.php'); 
if(!isset($_SESSION['user'])){
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
}else{
?>
<body>
<div class="container">
	<div class="row justify-content-end">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="list-group">
			  <a href="index.php" class="list-group-item active">
			    Welcome! <?php echo $_SESSION['user']['email'];?>
			  </a>
			  <a class="list-group-item list-group-item-action" href="changepassword.php">Change Password</a>
			  <a class="list-group-item list-group-item-action" href="siteajax.php?logout">logout</a>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="container">
	
	<div class="messages"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
        	<form class="" method="POST" id="theForm">
	        	<div class="card ">
				  <div class="card-header">
				    Change Password
				  </div>
				  <div class="card-block">
				  	<div class="messages"></div>
				    <div class="form-group">   
			        	<label for="inputOldpassword" class="sr-only">Old Password</label>
			        	<input type="password" id="inputOldpassword" autocomplete="off" class="form-control" name="inputOldpassword" placeholder="Old Password" required>
			        </div>
			        <div class="form-group">   
			        	<label for="inputNewPassword" class="sr-only">New Password</label>
			        	<input type="password" id="inputNewPassword" autocomplete="off" class="form-control" name="inputNewPassword" placeholder="New Password" required>
			        </div>
			        <div class="form-group">   
			        	<label for="inputConfirmPassword" class="sr-only">New Confirm Password</label>
			        	<input type="password" id="inputConfirmPassword" autocomplete="off" class="form-control" name="inputConfirmPassword" placeholder="New Confirm Password" required>
			        </div>
				  </div>
				  <div class="card-footer text-muted">
				    <button class="btn btn-primary" id="loginbtn" type="submit">Change Now</button>
				  </div>
				</div>
			</form>
        </div>
	</div>
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
		    	url: "siteajax.php?changepassword", 
		    	type:'POST',
		    	data:data,
		    	success: function(data){
		        	var messageAlert = 'alert-' + data.type;
	                var messageText = data.message;
	                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
	                if (messageAlert && messageText) {
	                    $('#theForm').find('.messages').html(alertBox);
	                    if (data.type == 'success') {
	                    	$('#theForm')[0].reset();
	                    }
	                }
		    	}
			});
			return false;
		}
	});
});
</script>