<?php
require 'functions.php';

$id = $_GET["cars_id"];

if(delete($id) > 0) {
        echo "
            <script>
                alert('succeed');
                document.location.href = 'dashboard.php';
            </script>
        ";
} else {
        echo "
            <script>
                alert('failed');
                document.location.href = 'dashboard.php';
            </script>
        "; 
}