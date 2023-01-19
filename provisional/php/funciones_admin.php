<?php
    /**
     * 
     */
    function logueo_admin() {
        $date = date("Ymd");
        echo $date;
        $_SESSION['logueo_admin'] = $date;
    }
?>