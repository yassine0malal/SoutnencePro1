<!DOCTYPE html>
<html>
<head>
    <title>Hello Mail</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #333;
        }
        .content p {
            color: #666;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #999;
        }
        .footer a {
            color: #999;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="email-container">
    <div class="content">

    <h1>Bienvenue, {{ $user->Username }}</h1>
    <p>Nous avons le plaisir de vous informer que votre demande a été validée avec succès.</p>
    <p>Merci de votre compréhension.</p>

    <p>Cordialement,</p>
    <p><strong>Madin Holding</strong></p>
    </div>
</div>

</body>
</html>
