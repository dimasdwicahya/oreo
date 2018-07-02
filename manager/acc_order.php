<?php
if (isset($_POST['notiket'])) {
$notiket = strip_tags($_POST['notiket']);
$namapekerjaan = strip_tags($_POST['namapekerjaan']);
$status = strip_tags($_POST['status']);
echo "<strong>Name</strong>: ".$notiket."</br>";
echo "<strong>Email</strong>: ".$namapekerjaan."</br>";
echo "<strong>Message</strong>: ".$status."</br>";
echo "<span class='label label-info'>Your feedback has been submitted with above details!</span>";
}
?>