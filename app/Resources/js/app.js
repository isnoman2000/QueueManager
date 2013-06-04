var App = {

};

(function ($) {

    jQuery.fn.name = function() {
        $(this).regexRestrict(RegExp("[^a-zA-Z.' ]", "g"));
    };

    jQuery.fn.email = function() {
        $(this).regexRestrict(RegExp("[^a-zA-Z.&_+@0-9]", "g"));
    };

    jQuery.validator.addMethod("validBangladeshMobile", function(value, element) {
        var prefix = value.substr(0, 2);
        var length = value.length;
        return (length == 11 && prefix == '01');
    }, "The mobile number must be in this format: 01XXXXXXXX and must be of 11 digit length.");

})(jQuery);

