<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
session_start();
session_destroy();

echo "<script>location.href='../../'</script>";
