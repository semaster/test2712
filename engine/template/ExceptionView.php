<?php if(!defined("IN_RULE")) die ("Oops"); ?>

<?php if (!empty($message)) : ?><div class="alert alert-warning"><?php echo $message; ?></div><?php endif; ?>

    <header>
        <div class="container">
			<div class="jumbotron text-primary" style="color:#777;">
			    <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
			    <br />
			    <p class="lead">The page you requested could not be found. <br> 
			      Use your browsers <b>Back</b> button to navigate to the page you have prevously come from
			    </p>
			    <p><b>Or you could just press this neat little button:</b></p>
			    <p><a href="/" class="btn btn-lg btn-success"><i class="icon-home icon-white"></i> Take Me Home</a></p>
			</div>
        </div>
    </header>

