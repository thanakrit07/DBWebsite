'use strict';

var web = function () {
  'use strict';

  var resize = function resize() {
    var size = 100;

    $('#form-section .number-box').css({
      width: size,
      height: size
    });

    $('#form-section .number-box, #form-section .description').each(function (id, elm) {
      $(elm).css({
        paddingTop: (size - parseInt($(elm).css('font-size'))) / 2 - 15
      }).show();
    });
  };

  var initStyle = function initStyle() {

    resize();

    $('#btn-edit').click(function () {
      $('#Profile').slideDown('slow');
      $('#Registration').slideUp('slow');
    });

    $('#btn-submit').click(function () {
      $('#Registration').slideUp('slow');
      $('#Profile').slideDown('slow');
    });
  };

  $(function () {

    $(window).resize(resize);
    initStyle();
  });
}();