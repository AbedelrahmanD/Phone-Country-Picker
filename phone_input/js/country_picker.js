
$.fn.country_picker = function () {

    var country_options = `<option value=''>&nbsp;</option>`;
    for (var country of countries) {
        country_options += `<option data-mobile-code='${country.MobileCode}' value='${country.Code}'>
                                (${country.MobileCode})
                                ${country.Name}
                        </option>`;
    }




    $(this).html(country_options).select2({
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                `<div style='display:flex'>
                   <div style='width:30px;height:30px'> ${window.CountryFlagSvg[state.id]} </div>
                   <div style='margin:0 10px;'>${state.text}</div>
                </div>`
            );
            return $state;

        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                `<div style='display:flex'>
                   <div style='width:30px;height:30px'> ${window.CountryFlagSvg[state.id]} </div>
                </div>`
            );
            return $state;

        },
        theme: "bootstrap-5"

    }).change(function () {
        var $input = $(this).parents("[data-country-picker]").find("input");
        var mobile_code = $(this).find("option:selected").attr("data-mobile-code");
        $input.val(`${mobile_code} `);

        setTimeout(function () {
            $input.trigger("focus");
        }, 400);

    });



    return $(this);
}