<?php
    function formatName($name) {
        return ucwords(strtolower(trim($name)));
    }

    function validateEmail($email) {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
    }

    function cleanSkills($string) {
        $skillsArray = explode(",", $string);
        return array_map("trim", $skillsArray);
    }

    function saveStudent($name, $email, $skillsArray) {
        $timestamp = date("Y-m-d H:i:s");
        $line = $timestamp . "," . $name . "," . $email . "," . implode("|", $skillsArray) . "\n";
        return file_put_contents("students.txt", $line, FILE_APPEND) !== false;
    }

    function uploadPortfolioFile($file) {
        try { 
            if ($file["error"] !== 0) { 
                throw new Exception("Upload error."); 
            }

            if ($file["size"] > 2 * 1024 * 1024) { 
                throw new Exception("File too large. Max 2MB."); 
            }

            $allowedTypes = ["application/pdf", "image/jpeg", "image/png"]; 
            if (!in_array($file["type"], $allowedTypes)) { 
                throw new Exception("Invalid file type. Only PDF, JPG, PNG allowed."); 
            }

            $originalName = pathinfo($file["name"], PATHINFO_FILENAME); 
            $extension = pathinfo($file["name"], PATHINFO_EXTENSION);

            $newFileName = $originalName . "." . $extension;

            $uploadDir = __DIR__ . "/uploads/"; 
            if (!is_dir($uploadDir)) { 
                if (!mkdir($uploadDir, 0777, true)) { 
                    throw new Exception("Failed to create upload directory."); 
                } 
            }

            $destination = $uploadDir . $newFileName; 
            if (!move_uploaded_file($file["tmp_name"], $destination)) { 
                throw new Exception("Failed to save uploaded file."); 
            }

            return "<p style='color:green;'>File uploaded successfully as $newFileName</p>"; 
        } catch (Exception $e) { 
            return "<p style='color:red;'>Error: " . $e->getMessage() . "</p>"; 
        }
    }
?>
