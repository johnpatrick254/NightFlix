<?php
require_once dirname(__DIR__) . '/nightflix/includes/Header.php';
if(!isset($_GET['id'])){
    ErrorHandler::showError("Page Does not Exist");
}
$video = new Video($db,$_GET['id']);
$video->incrementViewCount();
?>
<div class="watch-container">
    <div class="video-controls watch-nav">
        <button onclick="goBack()" class="transparent icon-button">
        <i class="fa-solid fa-arrow-left "></i>
    </button>
    <h1><?php echo $video->getTitle()?></h1>
    </div>
    <video controls autoplay src='<?php echo $video->getFilePath()?>' type="video/mp4">
    </video>
</div>
<script>
    runOnLoad("<?php echo $video->getID(); ?>","<?php echo $_SESSION['user']; ?>");
</script>