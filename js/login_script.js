$(document).ready(function() {
    // Handle input interaction
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }   
        } else if (e.type === 'focus') {
            if( $this.val() === '' ) {
                label.removeClass('highlight');
            } else if( $this.val() !== '' ) {
                label.addClass('highlight');
            }
        }
    });

    // Initial hide of all tab content except the first one
    $('.tab-content > div').not(':first').hide();

    // Tab switching logic
    $('.tab a').on('click', function (e) {
        e.preventDefault();

        var $this = $(this),
            target = $this.attr('href');

        $this.parent().addClass('active');
        $this.parent().siblings().removeClass('active');

        $('.tab-content > div').not(target).hide();
        $(target).fadeIn(600);
    });

    // Trigger the first tab to be active on initial load
    $('.tab a:first').trigger('click');
});
