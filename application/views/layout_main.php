<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?= WEBSITE ?>ui-lib/bootstrap/ico/favicon.png">

        <title><?php echo $title ?></title>

        <link href="<?= WEBSITE ?>ui-lib/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= WEBSITE ?>ui-lib/css/starter-template.css" rel="stylesheet">
        <script src="<?= WEBSITE ?>ui-lib/jquery/jquery-1.10.2.min.js"></script>
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" style="color: #FFFFFF;"><b>LMS</b></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!--                        <li class="active"><a href="#">Home</a></li>
                        
                        
                                                <li class="dropdown">
                                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tools <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/resttester">REST Tester</a></li>
                                                        <li><a href="/soaptester">SOAP Tester</a></li>
                                                        <li><a href="#">HTTP(S) Request Maker</a></li>
                        
                                                    </ul>
                                                </li>
                                                <li><a href="#about">About</a></li>-->
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <?php echo $content_for_layout ?>
            </div>

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="<?= WEBSITE ?>ui-lib/bootstrap/js/bootstrap.min.js"></script>

        <div id="footer">
            <div class="container" align="center">
                <p>Powered By: <a taget="_blank" href="http://www.tradus.com">OMS Team</a><br>
                    Please give us your suggestions Email: <a taget="_blank" href="mailto:oms@tradus.com">contact@tradus.com</a>
                </p>

            </div>
        </div>

    </body>
</html>
