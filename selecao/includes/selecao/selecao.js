function loadModal(id, url) {
    $('#' + id).on('show.bs.modal', function () {
        $(this).load(url);
    });
}

$(document).ready(function () {

});

$("#myModal").on("show.bs.modal", function (e) {
    $target = {};
    var link = $(e.relatedTarget);
    ['id', 'button', 'title', 'content'].forEach(function (value, key) {
        $target[value] = $(e.relatedTarget).data(value);
    });
    $(".modal-title").text($target.title);
    $(".close-changes").text($target.button);

    $(this).find(".modal-body").load(link.attr("href"));
});

$(document).on('show', '.accordion', function (e) {
    //$('.accordion-heading i').toggleClass(' ');
    $(e.target).prev('.accordion-heading').addClass('accordion-opened');
});

$(document).on('hide', '.accordion', function (e) {
    $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
    //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
});