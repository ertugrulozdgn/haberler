window.Table = {};

Table.init = function () {
    Table.deleteRecord();
}

Table.deleteRecord = function() {
    $('table').on('click', 'a[data-action="delete"]', function () {

        var btn = $(this);

        console.log(btn.attr('href'));

        alertify.confirm('Silme işlemini onaylıyor musunuz?', 'Bu işlem geri alınamaz', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"DELETE",
                url: btn.attr('href'),
                success: function (msg) {
                    if (msg) {
                        btn.closest('tr').remove();
                        //$("#item-"+destroy_id).remove();
                        alertify.success("Silme işlemi Başarılı");
                    } else {
                        alertify.error("İşlem Tamamlanamadı");
                    }
                }
            });
        }, function () {
            alertify.error('Silme işlemi iptal edildi.')
        });

        return false;
    });
};