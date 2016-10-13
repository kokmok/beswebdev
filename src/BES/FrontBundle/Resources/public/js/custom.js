$(function()
{
    tileSize();
    // $('.masoneryContainer').masonry({
    //     // options
    //     itemSelector: '.tile',
    //     columnWidth: '.tile-sizer',
    //     percentPosition: true
    // });
    // $('.masoneryContainer').isotope({
    //     // options
    //     itemSelector: '.tile',
    //     layoutMode: 'fitRows'
    // });7

    filters();
})


function filters(){

    $('.category-filter').on('click',function(){
        if (typeof $(this).attr('data-filter-id') === 'undefined'){
            $('.filtrable').show(200);
        }
        else{
            $('.filtrable').not('.filter-'+$(this).attr('data-filter-id')).hide(200);
            $('.filtrable.filter-'+$(this).attr('data-filter-id')).show(200);
        }

    });
}

function tileSize()
{
    $('.tile').height($('.tile:first').width());
    $('.student-tile').height($('.student-tile:first').width());
}
