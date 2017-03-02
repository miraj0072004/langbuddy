<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
</head>
<body>
   <header>
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsemenu" aria-expanded="false">
                    <span class="sr-only"> Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    Lang Buddy
                </a>
            </div>
            
                <!--Note this id value. We use this to link the hamburger menu which we have to code inside the header -->

                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="#">Public</a></li>
                    <li role="presentation" ><a href="private.php">Private</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <li role="presentation">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Logout
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                            <li><a href="#">Contact</a></li>                        
                        </ul>
                    </li>   
                </ul>
            
        </div>
    </div>
    </header>
    <div class="container">
        <div class="row">