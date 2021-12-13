<?php
if (isset($_GET["error"])) {
    if (isset($_GET["message"])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
            htmlspecialchars($_GET["message"]) . ' <button type="button" class="btn-close" 
                        data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
} elseif (isset($_GET["success"])) {
    if (isset($_GET["message"])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
            htmlspecialchars($_GET["message"]) . ' <button type="button" class="btn-close" 
                        data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
