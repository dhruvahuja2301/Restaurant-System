// reserve a table
$("#reserve_table_input").on('click', () => {
  $('#reserve_table').modal('toggle');
});
// scroll to top
$("#scrolltop").click(function() {
  $("body").scrollTo('nav', 1000, { axis:'y' });
});
// about us page facts and history toggle
$("#facts").on('click',()=>{
  $("#factsdata").slideToggle();
});
$("#history").on('click',()=>{
  $("#historydata").slideToggle();
});

