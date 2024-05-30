const $ = require("jquery");
window.$ = window.jQuery = require('jquery');
import './bootstrap'


$(document).ready(function () {
    $(document).on('click', '.common-div', function () {
        if (!$(this).hasClass('bg-danger')) {
            $(this).addClass('bg-danger');
        } else {
            $(this).removeClass('bg-danger');
        }
    });

    $(document).on('change', '#color-changer', function () {
        const color = $(this).val();
        $.ajax({
            url: './box/color-changer',
            type: 'GET',
            data: {
                color: color,
            },
            success: function (data) {
                console.log(data)
            },
            error: function (xhr, status, error) {
                console.log(xhr, status, error);
            }
        })
    });
})
