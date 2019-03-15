<?php 
// No direct access
defined('_JEXEC') or die; ?>
<?php
echo "<table border=1>";
echo "<tr><th>Name</th><th>User Name</th><th>Email</th></tr>";
    foreach ($hello as $v)
    {
        echo "<tr>";
        echo "<td>$v->name</td>";
        echo "<td>$v->username</td>";
        echo "<td>$v->email</td>";
        echo "</tr>";
        //print_r($v->name);
    }
    echo "</table>";
?>
