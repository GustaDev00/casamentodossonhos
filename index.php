<?php 
    require_once ("lib/raelgc/view/Template.php");
    use raelgc\view\Template;

    $tpl = new Template ("view/index.html");

    $tpl ->show();

?>