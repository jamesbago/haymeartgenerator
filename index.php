
   <?php include("includes/header.php") ?>
   <?php include("includes/topnavbar.php") ?>
   <?php include("includes/sidebar.php") ?>
   <link rel="stylesheet" type="text/css" href="bg.css">
   
    <script>// show the loading modal
function showLoadingModal() {
  var modal = document.getElementById("loading-modal");
  modal.style.display = "block";
}

// hide the loading modal
function hideLoadingModal() {
  var modal = document.getElementById("loading-modal");
  modal.style.display = "none";
}

// show the loading modal when the form is submitted
document.getElementById("artForm").addEventListener("submit", function() {
  showLoadingModal();
});

// hide the loading modal when the art is generated
setTimeout(function() {
  hideLoadingModal();
}, 5000);
</script>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    
                        <div class="card mb-4">
                            <div class="card-header">
                               
                            </div>
                            <div class="card-body">
                                 
                                <p>Hayme: A Unique Digital Art Generator is a revolutionary app designed for artists who want to streamline their creative process and automatically generate multiple or even thousands of unique digital art pieces using their own pre-made traits. With this app, users can harness the power of their own creative vision to generate an array of diverse art pieces, making the art generation process efficient and effortless.
                                       <br>      <a href="generateart.php">Let's Get Started! <i class="fa-solid fa-brush fa-shake"></i></a> </p>
                            <img src="art.png" alt="art" >
                     
                            </div>
                        </div>
                    </div>
                </main>

               <?php 
             include("includes/footer.php")
               ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
