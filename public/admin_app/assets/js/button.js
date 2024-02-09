$(document).ready(function () {
  var today = new Date();
  var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
  var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
  $('#fromDate').val(formatDate(firstDayOfMonth));
  $('#toDate').val(formatDate(lastDayOfMonth));
  
  $('#today').click(function () {
    var today = new Date();
    var dateString = formatDate(today);
    $('#fromDate').val(dateString);
    $('#toDate').val(dateString);
  });

  $('#yesterday').click(function () {
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    var dateString = formatDate(yesterday);
    $('#fromDate').val(dateString);
    $('#toDate').val(dateString);
  });

  $('#thisWeek').click(function () {
    var today = new Date();
    var firstDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay()));
    var lastDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay() + 6));
    $('#fromDate').val(formatDate(firstDayOfWeek));
    $('#toDate').val(formatDate(lastDayOfWeek));
  });

  $('#thisMonth').click(function () {
    var today = new Date();
    var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
    var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    $('#fromDate').val(formatDate(firstDayOfMonth));
    $('#toDate').val(formatDate(lastDayOfMonth));
  });

  $('#lastMonthButton').click(function () {
    var today = new Date();
    var firstDayOfLastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1);
    var lastDayOfLastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
    $('#fromDate').val(formatDate(firstDayOfLastMonth));
    $('#toDate').val(formatDate(lastDayOfLastMonth));
    $('#thisMonth').removeClass('active-button');
    $(this).addClass('active-button');
  });

  function formatDate(date) {
    var day = ('0' + date.getDate()).slice(-2);
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var year = date.getFullYear();
    return year + '-' + month + '-' + day; // Note the change here
  }
  $('.date-range-button').click(function () {
    // First, remove the 'active-button' class from all buttons
    $('.date-range-button').removeClass('active-button');
    // Then, add the 'active-button' class to the clicked button
    $(this).addClass('active-button');
  });

});
