<div class="container">
    <div class="panel panel-{{ $type_notice }}">
        <div class="panel-heading">Notice</div>
        <div class="panel-body item-message text-danger">{{ $message_notice }}</div>
    </div>
</div>
<script>
    setTimeout(() => {
        window.location.href = '{{ $url_redirect }}'
    }, 10000);
</script>