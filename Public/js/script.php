<?php header("Content-Type: application/javascript"); /* This meant the file can be used in script tag */ ?>

<?php $var = "Message"; ?>


document.getElementById("butt").onclick = function () {
    alert(<?=json_encode($var)?>);
}
