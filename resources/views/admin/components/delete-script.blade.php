<script>
    function deleteObj(url, name) {
        swal.fire({
            title: 'Warning',
            text: 'Xác nhận xoá【' + name + '】 ？',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Đóng',
            confirmButtonText: 'Xác nhận',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'DELETE',
                    url: url,
                    data: {_token: '{{ csrf_token() }}'},
                    dataType: 'json',
                    success: function(ret) {
                        if (ret.status === 'success') {
                            swal.fire({title: ret.message, icon: 'success', timer: 1000, showConfirmButton: false}).then(() => window.location.reload());
                        } else {
                            swal.fire({title: ret.message, icon: 'error'}).then(() => window.location.reload());
                        }
                    },
                    error: function(ret) {
                        swal.fire({title: ret.responseJSON.message, icon: 'error'}).then(() => window.location.reload());
                    }
                });
            }
        });
    }
</script>