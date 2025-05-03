<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            text-align: center;
            background-color:rgb(139, 139, 139);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        img {
            margin-top: 20px;
            border-radius: 0px;
            width: 300px;
            box-shadow: 0 0 0px #333;
        }
        button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 14px;
            background-color: #007bff;
            border: none;
            border-radius: 0px;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .caption {
            font-size: 24px;
            margin-top: 40px;
			font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="caption">Generate PHP ext</div>
    <img src="https://i1.sndcdn.com/avatars-zdvzjNATRc2uzrMu-s4M1pw-t500x500.jpg" alt="Image">
    <form action="upload.php" method="get">
        <button type="submit">Start</button>
    </form>
</body>
</html>
