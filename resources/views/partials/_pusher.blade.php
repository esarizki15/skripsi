<script type="text/javascript">
    $(document).ready(function() {
        Push.create("Berhasil!", {
            body: '{{ $message }}',
            icon: '/icon.png',
            timeout: 4000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
    });
</script>