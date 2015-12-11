<?php

if(isset($messages)):

?>

<div class="alert <?php if(array_key_exists("success",$messages)){ echo "alert-success"; } else {echo "alert-danger"; } ?>">
    <ul>
        <?php
            foreach($messages as $message){
                echo "<li>".$message."</li>";
            }
        ?>
    </ul>
</div>

<?php endif; ?>