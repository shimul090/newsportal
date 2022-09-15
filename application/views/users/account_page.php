	<div class="container">
		<h2>Welcome <?php echo $user['full_name']; ?>!</h2>
    	<div class="regisFrm">
        <p><b>Name: </b><?php echo $user['full_name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Phone: </b><?php echo $user['phone']; ?></p>
    </div>
	</div>
</body>
</html>