<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toast({
    title = 'Thông báo',
    text = '',
    icon = 'success',
    position = 'top-end',
    timer = 2000,
    showConfirmButton = false,
    timerProgressBar = true,
} = {}) {
    Swal.fire({
        position: position,
        toast: true,
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: showConfirmButton,
        timer: timer,
        timerProgressBar: timerProgressBar,
    });
}
</script>
