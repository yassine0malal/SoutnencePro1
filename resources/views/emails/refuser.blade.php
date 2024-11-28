<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande Refusée</title>
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
            <h1>Demande Refusée</h1>
            <p>Bonjour {{ $user->username }},</p>
            <p>Nous vous informons que votre demande a été refusée.</p>
            <p>Nous vous prions de bien vouloir contacter notre service  pour plus d'informations.</p>
            <p>Merci de votre compréhension.</p>
            <p>Cordialement,</p>
            <p><strong>Madin Holding</strong></p>
        </div>

    </div>
</body>
</html>
