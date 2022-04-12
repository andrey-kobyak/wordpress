jQuery(document).ready(function ($) {

    $('.form-line').find('input:not([type="submit"]), textarea').unwrap();
    $('.form-line').find('input:not([type="submit"]), textarea').each(function(item) {
        var $this = $(this);

        if ($this.val().trim() !== '') {
            $this.addClass('is-filled');
        }

        $this.on({
            focus: function() {
                $this.addClass('is-filled');
            },
            blur: function() {
                if ($this.val().trim() === '') {
                    $this.removeClass('is-filled');
                }
            }
        });
    });

    Fancybox.bind('[data-fancybox="gallery"]');


    $(".verify").click(function(event) {
        //event.preventDefault();
        if(!$('#popup').length)
            $('body').append(`		       		       
		        <div id="popup">
		            <div class="popup-inner">
		            <i onclick="jQuery('#popup').remove();"></i>
		                <div class="title">potwierdź dane</div>
		                <p>                       
                        Imię i Nazwisko: ` + jQuery('[name=your-name]').val() + `<br/><br/>                       
                        Email: ` + jQuery('[name=your-email]').val() + `<br/><br/>                       
                        Temat: ` + jQuery('[name=your-subject]').val() + `<br/><br/>                       
                        Wiadomość: ` + jQuery('[name=your-message]').val() + `
                        </p>
                        <div class="buttons">
                            <div class="bttn" onclick="jQuery('#popup').remove();">EDYTUJ</div>
                            <div class="bttn" onclick="jQuery('#popup').remove();jQuery('.wpcf7-form input[type=submit]').click()">WYŚLIJ</div>
                        </div
		            </div>
		        </div>
		    `);
        return false;
    });


    $(window).scroll(function fix_header() {
        $('#sticky').css(
            $(window).scrollTop() > 100
                ? {'position': 'fixed', 'top': '0', 'width': '100%', 'background-color': '#fff', 'z-index': '99999999'}
                : {'position': 'relative', 'top': 'auto'}
        );
        return fix_header;
    }());

    //search
    $(function () {
        $('a[href="#search"]').on("click", function (event) {
            event.preventDefault();
            $("#search").addClass("open");
            $('#search > form > input[type="search"]').focus();
        });

        $("#search, #search button.close").on("click keyup", function (event) {
            if (
                event.target == this ||
                event.target.className == "close" ||
                event.keyCode == 27
            ) {
                $(this).removeClass("open");
            }
        });

    });

    var btn = $('#button');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });
    $('.gray .efect:eq(0)').show(300, function(){
        $(this).next().show(300, arguments.callee);
    });
    jQuery( ".efect" ).click(function() {
        jQuery( ".efect" ).first().show( "slow", function showNext() {
            jQuery( this ).next( "div" ).show( "slow", showNext );
        });
    });

    $("#close-x").click(function(){
        $(".politic").hide();
    });
});
