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

@if (session('failed'))
<script>
  // Show Notification
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire(
      'error!',
      `{{ session('failed') }}`,
      'error'
    );
  });
</script>
@endif