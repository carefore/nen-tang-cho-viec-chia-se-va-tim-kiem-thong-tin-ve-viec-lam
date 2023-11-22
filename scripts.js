// scripts.js
$(document).ready(function() {
  // Load danh sách công việc khi trang được tải
  loadJobs();

  // Submit form thông tin công việc
  $('#jobForm').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    
    $.ajax({
      type: 'POST',
      url: 'submit_job.php',
      data: formData,
      success: function() {
        loadJobs(); // Reload danh sách công việc sau khi thêm mới
        $('#jobForm')[0].reset(); // Reset form
      }
    });
  });
});

// Hàm để load danh sách công việc từ cơ sở dữ liệu
function loadJobs() {
  $.ajax({
    type: 'GET',
    url: 'get_jobs.php',
    success: function(data) {
      $('#jobList').html(data);
    }
  });
}
