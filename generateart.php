
        
   <?php include("includes/header.php") ?>
   <?php include("includes/topnavbar.php") ?>
   <?php include("includes/sidebar.php") ?>
   <link rel="stylesheet" type="text/css" href="generate.css">
   <script src="js/jquery.js"></script>


   
  <script>
        
    <!-- Add this within your script tags in your index.php file, after including jQuery -->
    $(document).ready(function() {
        $('#artForm').on('submit', function() {
            // Show the loader when the form is submitted
            $('#loadingModal').show();
        });

        $('#btnGenerate').on('click', function() {
            $('#loadingModal').hide();
        });
    });
   
</script>
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Generate Art</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Generate Art</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
             
            <br>
            <form id="artForm" method="post" action="generatefunction.php"> 

            <div id="text-boxes">
                <!-- initial textboxes-->
            </div>
            
            <label for="outputFolder">Output Folder</label>
            <input type="text" id="outputFolder" name="outputFolder" required data-toggle="tooltip" title="Enter/paste your ideal output folder path to where you want to save your generated arts">
            <label for="quantity" >Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required data-toggle="tooltip" title="Enter the quantity of art to generate">
            <label for="canvasWidth" >Canvas Width:</label>
             <input type="number" id="canvasWidth" name="canvasWidth" required data-toggle="tooltip" title="Enter width in pixels">
             <label for="canvasHeight">Canvas Height:</label>
             <input type="number" id="canvasHeight" name="canvasHeight" required data-toggle="tooltip" title="Enter height in pixels">
            </select>

            <div id="buttons">
                <button type="submit" id="generate-btn" name="generate-btn" data-toggle="tooltip" title="Generate Art">Generate Art</button> <!-- Add a new generate button with type="submit" -->
            </div>

        </form>

        </div>
        <a id="add-btn" data-toggle="tooltip" title="Add trait"><div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div> Add Trait</a>
        <a id="dec-btn" data-toggle="tooltip" title="Decrease trait"><div class="sb-nav-link-icon"><i class="fa-solid fa-user-minus"></i></div> Decrease Trait</a>
         </div>
    
            
                       
                    </div>
                </main>

                <?php 
             include("includes/footer.php")
               ?>
            </div>
        </div>
        <script>
  // Bootstrap Tooltip
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });




</script>
        <script>
        // JavaScript code for adding and decreasing traits
        var traitCount = 0; // initialize the trait counter

        document.getElementById("add-btn").addEventListener("click", function() {
            traitCount++; // increment the trait counter

            // create a new label element
            var label = document.createElement("label");
            label.setAttribute("for", "trait" + traitCount);
            label.textContent = "Folder Path of Trait #" + traitCount;

            // create a new input element
            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("id", "trait" + traitCount);
            input.setAttribute("name", "trait" + traitCount);

            // create a new div to contain the label and input elements
            var div = document.createElement("div");
            div.appendChild(label);
            div.appendChild(input);

            // append the div element to the text-boxes div
            var textboxes = document.getElementById("text-boxes");
            textboxes.appendChild(div);
        });

            document.getElementById("dec-btn").addEventListener("click", function() {
             if (traitCount > 0) {
            var textboxes = document.getElementById("text-boxes");
            textboxes.removeChild(textboxes.lastChild); // remove the last div element
            traitCount--; // decrement the trait counter
            }
        });
    </script>

    
            <div id="loadingModal" class="modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Generating...</span>
                    </div>
                </div>
            </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
