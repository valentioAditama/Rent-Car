@if (session('success'))
<script>
  // Show Notification
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire(
      'Success!',
      `{{ session('success') }}`,
      'success'
    );
  });
</script>
@endif