    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });
    </script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
    $(document).on('ready', function () {
        var $body = $('body');
        $(window).on('scroll', function() {
            var offset = $(document).scrollTop();
            
            if (offset > 90) {
                $body.addClass('fixed');
            } else {
                $body.removeClass('fixed');
            }
            
        })
    });
    </script>
</body>
</html>