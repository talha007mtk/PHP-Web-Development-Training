<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy file</title>
    <style>
        h1{
            color: slategray;
            background-color: lightblue;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Copy File</h1>
        <br>
        <hr>
        <br>
        <table border="1" cellpadding="10" cellspacing="5">
            <form method="POST" action="">
                <tr>
                    <td><label>Source File Path:</label></td>
                    <td><input type="text" name="sourcePath"></td>
                </tr>
                <tr>
                    <td><label>Target File Path:</label></td>
                    <td><input type="text" name="targetPath"></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="submit" value="Copy File"></td>
                </tr>
            </form>
        </table>
        <?php
        if (isset($_POST['submit'])) {
            $sourcePath = $_POST["sourcePath"];
            $targetPath = $_POST["targetPath"];

            copying($sourcePath, $targetPath);
        }

        function copying($sourceFileName, $target) {
            $sourcePath = $sourceFileName;
        
            if (!is_file($sourcePath)) {
                echo "wrong source file name.";
                return;
            }
        
            if (is_dir($target)) {
                copyToDirectory($sourcePath, $target);
            } else {
                copyToFile($sourcePath, $target);
            }
        }
        
        function copyToDirectory($sourcePath, $targetDir) {
            $targetPath = $targetDir . '/' . basename($sourcePath);
        
            if (!is_dir($targetDir)) {
                echo "wrong target directory.";
                return;
            }
        
            $content = file_get_contents($sourcePath);
            $fileHandle = fopen($targetPath, 'w');
            fwrite($fileHandle, $content);
            fclose($fileHandle);
        
            echo "File copied successfully to directory.";
        }
        
        function copyToFile($sourcePath, $targetPath) {
            $targetDir = pathinfo($targetPath, PATHINFO_DIRNAME);
        
            if (!is_dir($targetDir)) {
                echo "wrong target file name.";
                return;
            }
        
            $content = file_get_contents($sourcePath);
            $fileHandle = fopen($targetPath, 'w'); 
            fwrite($fileHandle, $content);
            fclose($fileHandle);
        
            echo "File copied successfully to file.";
        }  
        ?>
    </center>
</body>
</html>
