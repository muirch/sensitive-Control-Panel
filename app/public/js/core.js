ScrollReveal().reveal('.panel');

$(function() {
    var i = 0;
    $('span.navigation__toggler').click(function() {
        $('.navigation__list').toggle(500);
    });
});