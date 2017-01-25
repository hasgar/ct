
$(window)['load'](function() {
    $('#status')['fadeOut']();
    $('#preloader')['delay'](250)['fadeOut']('slow');
    $('body')['delay'](250)['css']({
        "\x6F\x76\x65\x72\x66\x6C\x6F\x77": 'visible'
    });
    $('#sub_content')['addClass']('animated zoomIn');
    $(window)['scroll']();
    $('.number')['each'](function() {
        $(this)['prop']('Counter', 0)['animate']({
            Counter: $(this)['text']()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(_0x6c79x1) {
                $(this)['text'](Math['ceil'](_0x6c79x1))
            }
        })
    })
});

new WOW()['init']();
jQuery(function(_0x6c79x2) {
    'use strict';

    function _0x6c79x3() {
        _0x6c79x2(this)['css']('display', 'block');
        var _0x6c79x4 = _0x6c79x2(this)['find']('.modal-dialog'),
            _0x6c79x5 = (_0x6c79x2(window)['height']() - _0x6c79x4['height']()) / 2,
            _0x6c79x6 = parseInt(_0x6c79x4['css']('marginBottom'), 10);
        if (_0x6c79x5 < _0x6c79x6) {
            _0x6c79x5 = _0x6c79x6
        };
        _0x6c79x4['css']('margin-top', _0x6c79x5)
    }
    _0x6c79x2('.modal')['on']('show.bs.modal', _0x6c79x3);
    _0x6c79x2('.modal-popup .close-link')['click'](function(_0x6c79x7) {
        _0x6c79x7['preventDefault']();
        _0x6c79x2('.modal')['modal']('hide')
    });
    _0x6c79x2(window)['on']('resize', function() {
        _0x6c79x2('.modal:visible')['each'](_0x6c79x3)
    })
});
<!-- Magnific popup -->
;
$(function() {
    'use strict';
    $('.video_pop')['magnificPopup']({
        type: 'iframe'
    });
    $('.magnific-gallery')['each'](function() {
        $(this)['magnificPopup']({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            },
            removalDelay: 500,
            callbacks: {
                beforeOpen: function() {
                    this['st']['image']['markup'] = this['st']['image']['markup']['replace']('mfp-figure', 'mfp-figure mfp-with-anim');
                    this['st']['mainClass'] = this['st']['el']['attr']('data-effect')
                }
            },
            closeOnContentClick: true,
            midClick: true
        })
    })
});
<!-- Radio and checkbox styles -->
;
$('input.icheck')['iCheck']({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey'
});
<!-- Collapse filters close on mobile-->
;
if ($(this)['width']() < 991) {
    $('.collapse#collapseFilters')['removeClass']('in');
    $('.collapse#collapseFilters')['addClass']('out')
} else {
    $('.collapse#collapseFilters')['removeClass']('out');
    $('.collapse#collapseFilters')['addClass']('in')
};
<!-- Tooltip -->
;
$('.tooltip-1')['tooltip']({
    html: true
});
<!-- Pace holder -->
;
$('input, textarea')['placeholder']();
<!-- Accordion -->
;

function toggleChevron(_0x6c79x9) {
    $(_0x6c79x9['target'])['prev']('.panel-heading')['find']('i.indicator')['toggleClass']('icon_plus_alt2 icon_minus_alt2')
}
$('.panel-group')['on']('hidden.bs.collapse shown.bs.collapse', toggleChevron);
<!-- Cat nav onclick active -->
;
$('ul#cat_nav li a')['on']('click', function() {
    $('ul#cat_nav li a.active')['removeClass']('active');
    $(this)['addClass']('active')
});
<!-- Drop down menu options-->
;
$('.dropdown-menu')['on']('click', function(_0x6c79x9) {
    _0x6c79x9['stopPropagation']()
});
$('a.add_to_basket')['on']('click', function() {
    $('.dropdown')['removeClass']('open')
})
