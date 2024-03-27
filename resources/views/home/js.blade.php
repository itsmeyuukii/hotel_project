<script src="theme/js/jquery.min.js"></script>
<script src="theme/js/bootstrap.bundle.min.js"></script>
<script src="theme/js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="theme/js/custom.js"></script>
<!-- CDN javascript bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script>
    //this is script is to prevent from scrolling up to top once reload or sent a contact
    $(window).scroll(function() {
        sessionStorage.scrollTop = $(this).scrollTop();
    });
    $(document).ready(function() {
        if (sessionStorage.scrollTop != "undefined") {
            $(window).scrollTop(sessionStorage.scrollTop);
    }
    });
</script>
