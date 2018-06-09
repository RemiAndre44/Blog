<?php 
    require 'templates/headMaterialize.html';
?>

<nav class="light-green lighten-4">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html"><i class="material-icons">search</i></a></li>
            <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
            <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
            <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
        </ul>
    </div>
</nav>

<body>
    <div class="row">
        <div class="col s4">
            <div id='sideBar'class=" light-green lighten-5">
                <p>salut</p>
            </div>
        </div>
        <div class="col s8">
            <div id='contenuPrincipal'>
                <div class="parallax-container">
                    <div class="parallax"><img src="img/platine.jpg"></div>
                </div>
                <div class="section white">
                    <div class="row container">
                        <h2 class="header">Parallax</h2>
                        <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
                    </div>
                </div>
                <div class="parallax-container">
                    <div class="parallax"><img src="img/platine.jpg"></div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
require 'templates/footerMaterialize.html';
?>