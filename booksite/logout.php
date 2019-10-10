
<?php
session_start();
session_destroy();
?>
<script type="text/javascript">
   alert("Log out");
   window.open('home.php','_self')
</script>
<?php
?>