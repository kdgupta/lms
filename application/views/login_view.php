<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Try retriving data:
// $session_id = $this->session->userdata('session_id');
?>
<head>
    <script language="javascript" type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>

<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form class="form-signin" role="form" method="post" >
                <h2 class="form-signin-heading">Sign in </h2>
                <input type="text" name="email" align="right" class="form-control" placeholder="Email address" required="" autofocus="">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <label class="checkbox">

                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
