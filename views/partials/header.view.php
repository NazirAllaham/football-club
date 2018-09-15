<header class="bg-light">
    <div class="navbar navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar navbar-brand mx-auto bg-light">
            <img src="/public/img/header_logo.png" class="img-fluid logo" />
        </div>
    </div>

   <div class="col-md-8 mx-auto bg-light" style="margin-top: 72px">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active menu-option">
                        <a class="nav-link btn" href="/">Home</a>
                    </li>
                    <li class="nav-item menu-option">
                        <a class="nav-link btn" href="/players">Our Players</a>
                    </li>
                    <li class="nav-item menu-option">
                        <a class="nav-link btn" href="/matches">Matches Schedule</a>
                    </li>
                    <li class="nav-item menu-option">
                        <a class="nav-link btn disabled" href="/gallery">Gallery</a>
                    </li>
                    <li class="nav-item menu-option">
                        <a class="nav-link btn" href="/tv">RMD TV</a>
                    </li>
                </ul>
            </div>
        </nav>
   </div>

    <div id="announcement-bar" class="border border-bottom border-secondary bg-secondary text-white">
        <label id="announcement-message" >-- welcome to real madrid website -- </label>
    </div>
</header>
<script>

$(window).ready(function() {
    $(this).scroll(function(e) {
        if(window.pageYOffset > 32) {
            $('#navbarSupportedContent').hide();
        }
        if(window.pageYOffset < 32) {
            $('#navbarSupportedContent').show();
        }
    });
});

</script>