@extends('layout.app')
@section('hello')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Social Media Card</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        *{
            margin: 0 !important;
            padding: 0 !important;

        }

        .contact-card {
            border: 2px solid #9097D5;
            border-radius: 10px;
            /* width: 100% !important; */
        }
        .contact-card .card-header {
            background-color: #9097D5;
            color: #fff;
        }
        .social-media-card .card-body {
            text-align: center;
        }
        .social-media-card .btn {
            margin: 5px;
        }
        .social-media-card .btn i {
            font-size: 1.5rem;
        }
        /* me  */
        .card{
            border: 2px solid #9097D5;
            border-radius: 10px;
            margin: 10px auto !important;
        }
        .card .card-header {
            background-color: #9097D5;
            color: #fff;
        }
        .card-body{
            padding: 20px !important;
            margin: 1px auto!important;
        }
        .card-footer{
            padding: 20px !important;
            margin: 1px auto!important;
        }

    </style>
</head>
<body>

<div class="container m-5 p-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Contact Card -->
            <div class="card contact-card mb-4 w-100">
                <div class="card-header">
                    <h4 class="card-title">Contact Us</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Madin Technologies est une entreprise spécialisée dans les solutions technologiques et les services informatiques. Fondée en 2000,
                        elle propose une gamme complète de services, dont le développement d'applications web et mobiles, le cloud computing, la cybersécurité,
                        et le consulting informatique. L'entreprise est reconnue pour son engagement envers l'innovation, la qualité et la satisfaction client. Composée de professionnels qualifiés,
                         Madin Technologies travaille avec une clientèle variée,
                        allant des petites entreprises aux grandes multinationales, pour offrir des solutions personnalisées et à la pointe de la technologie.
                    </p>
                </div>
                <div class="card-footer text-muted">
                    <p>Z.I Moulay Rachid,Al Khalidia 4, Rue 5 N°10, Casablanca, Maroc</p>
                    <p>Phone: (+212) 662 718 034</p>
                    <p>Email:  info@madintechnologies.ma</p>
                </div>
            </div>

            <!-- Social Media Card -->
            <div class="card social-media-card">
                <div class="card-header">
                    <h4 class="card-title">Follow Us</h4>
                </div>
                <div class="card-body">
                    <a href="https://www.facebook.com/madintechnologies" class="btn btn-primary" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="#" class="btn btn-info" target="_blank">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="#" class="btn btn-danger" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="https://www.linkedin.com/company/madin-technologies/" class="btn btn-primary" target="_blank">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection

