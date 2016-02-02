$(function()
{
    tileSize();
})

function tileSize()
{
    $('.tile').height($('.tile:first').width());
    $('.student-tile').height($('.student-tile:first').width());
}
