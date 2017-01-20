<?php
session_start();
session_destroy();	

    echo "<script>alert('You Have Been Logged Out.'); window.location = 'index.php'</script>";
?>