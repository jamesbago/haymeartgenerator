<?php
if(isset($_GET["outputFolder"])){
    $outputFolder = urldecode($_GET["outputFolder"]);
}else{
    // handle error, outputFolder parameter is not set
}
?>
<link rel="stylesheet" type="text/css" href="generatesuccess.css">
<nav class="shelf">
  <a class="book home-page" href="index.php">Home page</a>
  <a class="book about-us" href="generateart.php">Generate Art</a>
  <a class="book contact"  href="about.php" target="_blank">ABOUT</a>
  
  <form method="post" action="preview.php">
  <input type="hidden" name="outputFolder" value="<?php echo $outputFolder; ?>">
  <button class="book faq" type="submit">VIEW GENERATED ARTS</button>
  </form>
  <span class="book not-found"></span>
 
  <span class="door left"></span>
  <span class="door right"></span>
</nav>
<h1>CONGRATULATIONS!</h1>
<p>You're Art Successfuly Generated.</p>

