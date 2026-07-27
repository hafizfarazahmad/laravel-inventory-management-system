// ==========================
// Global Loader
// ==========================

function showLoader() {

    $('#page-loader')
        .css('display','flex')
        .hide()
        .fadeIn(200);

}

function hideLoader() {

    $('#page-loader').fadeOut(200);

}

$(document).on('submit','form:not(.delete-btn)',function(){

    showLoader();

    $(this)
        .find('button[type="submit"]')
        .prop('disabled',true)
        .html(`
            <span class="spinner-border spinner-border-sm me-2"></span>
            Please Wait...
        `);

});

$(window).on('load',function(){

    hideLoader();

});
$(document).on('click', '.show-loader', function () {
    showLoader();
});