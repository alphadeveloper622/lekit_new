let countries = JSON.parse($('input[name="countries"]').val());
let filtered_countries = countries;
$(document).ready(function (){
    $(document).mouseup(function(e)
    {
        var container = $(".country__code--list");
        var container_clicker = $(".country__code--config");

        if (!container.is(e.target) && container.has(e.target).length === 0 && !container_clicker.is(e.target) && container_clicker.has(e.target).length === 0 && !container.hasClass('d-none'))
        {
            container.addClass('d-none');
        }
    });
    $(document).on('click', '.country__code--config', function (){
        ulHider($(this));
    });
    $(document).on('click', '.country_li', function (){
        let flag = $(this).data('flag');
        let id = $(this).data('id');
        let code = $(this).data('country_code');
        $(this).closest('.form-group').find('.number').val(code);
        ulHider($(this));
        $(this).closest('.form-group').find('.country__code--config-details .country__code--flag img').attr('src', flag);
        $(this).closest('.form-group').find('.country__code--config-details .country__code--number').text(code);
        $(this).closest('.form-group').find('.country_id').attr('value', id);
    });
    $(document).on('keyup', '.country__search', function (){
        countrySearch($(this));
    });
});
function ulHider(el){
    let container = el.closest('.form-group').find('.country__code--list');
    if(container.hasClass('d-none'))
    {
        container.removeClass('d-none');
    }
    else
    {
        container.addClass('d-none');
    }
}
function countrySearch(el) {
    let value = el.val();
    let res;
    res = countries.filter((d) => d.name || d.phonecode);
    filtered_countries = res.filter((d) => ((d.name && d.name.toLowerCase().includes(value) || d.phonecode.includes(value))));
    let li_s = el.closest('.country__code--list').find('.country_li');

    $.each(li_s,function (index, li){
        let id = $(li).data('id');
        let country = filtered_countries.find((d) => d.id == id);
        if(country)
        {
            $(li).removeClass('d-none');
        }
        else
        {
            $(li).addClass('d-none');
        }
    });
    return filtered_countries;
}