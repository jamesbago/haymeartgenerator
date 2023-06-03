<?php



// Set maximum execution time in seconds 
ini_set('max_execution_time', 86400);

// Get input values from form
$output_folder = $_POST['outputFolder'];
$canvas_width = $_POST['canvasWidth'];
$canvas_height = $_POST['canvasHeight'];
$quantity = $_POST['quantity'];

// retrieve dynamic trait folders from form data
$trait_folders = array();
$index = 1;
while (isset($_POST['trait'.$index])) {
    $trait_folder = $_POST['trait'.$index];
    if (!empty($trait_folder)) {
        $trait_folders[] = $trait_folder;
    }
    $index++;
}



// Function to generate art
function generate_art($trait_folders, $quantity, $output_folder, $canvas_width, $canvas_height) {
    $generated_combinations = array();
    $total_combinations = pow(count($trait_folders), count($trait_folders));
    $filename_counter = 1; // Counter for setting filename
    $generated_quantity = 0; // Counter for number of generated artworks
    for ($i = 0; $i < $quantity && count
    ($generated_combinations) < $total_combinations; $i++) {
        $combination = array();
        $image_filenames = array();
        foreach ($trait_folders as $trait_folder) {
            $trait_name = basename($trait_folder);
            $trait_images = glob($trait_folder . '/*.png');
            if (empty($trait_images)) {
                throw new Exception("No PNG images found in folder: " . $trait_folder);
            }
            $trait_image = $trait_images[array_rand($trait_images)];
            $combination[$trait_name] = $trait_image;
            $image_filenames[] = basename($trait_image, '.png');
        }
        $combination_hash = md5(serialize($combination));
        // If this combination has already been generated, skip to the next iteration
        if (in_array($combination_hash, $generated_combinations)) {
            continue;
        }
        $generated_combinations[] = $combination_hash;
        $output_image = imagecreatetruecolor($canvas_width, $canvas_height);
        $background_color = imagecolorallocatealpha($output_image, 0, 0, 0, 127);
        imagefill($output_image, 0, 0, $background_color);
        foreach ($combination as $trait_name => $trait_image) {
            $trait_image_data = imagecreatefrompng($trait_image);
            imagecopy($output_image, $trait_image_data, 0, 0, 0, 0, $canvas_width, $canvas_height);
            imagedestroy($trait_image_data);
        }
        $output_filename = $output_folder . '/art_' . $filename_counter . '.png'; // Set filename with counter
        imagepng($output_image, $output_filename);
        imagedestroy($output_image);

        // Write metadata to text file
        $metadata_filename = $output_folder . '/art_' . $filename_counter . '_metadata.txt';
        $metadata_content = "Artwork Name: art_" . $filename_counter . PHP_EOL;
        $metadata_content .= "Traits: " . implode(", ", $image_filenames) . PHP_EOL;
        file_put_contents($metadata_filename, $metadata_content);

        $filename_counter++; // Increment filename counter
        $generated_quantity++; // Increment number of generated artworks
    }

    if ($generated_quantity < $quantity) {
        $message = "Not enough unique combinations of traits to generate the requested quantity of $quantity. Only $generated_quantity artworks were generated. Please add more traits or decrease the quantity.";
    $redirect_url = "https://www.facebook.com/Jamesensation101/" . urlencode($message);
    header("Location: warning.php");
    exit;
    }
}


// Clear all files in output folder
$files = glob($output_folder . '/*'); // Get all files in output folder
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file); // Delete the file
    }
}



// Generate art
generate_art($trait_folders, $quantity, $output_folder, $canvas_width, $canvas_height);

// Redirect back to index.html after generating art
$outputFolderQueryParam = '?outputFolder=' . urlencode($output_folder);
header('Location: generatesuccess.php' . $outputFolderQueryParam);

?>
