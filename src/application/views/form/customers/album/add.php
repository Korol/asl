<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="remoteDialogLabel">Добавить альбом</h4>
</div>
<div class="modal-body">
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> <?= $errorMessage ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="Name">Название альбома</label>
        <input type="text" class="assol-input-style fullwidth defaultheight" id="Name" placeholder="Название альбома">
    </div>

    <div id="alertError" class="alert alert-danger" role="alert" style="display: none">
        <h4>Ошибка!</h4>
        <p id="alertErrorMessage"></p>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" id="bSubmit">Добавить</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
</div>

<script>
    function callback(data) {
        if (data.status) {
            $('#remoteDialog').modal('hide');
            $.CustomerCard.ReloadAlbumList();
        } else {
            showErrorAlert(data.message)
        }
    }

    $('#bSubmit').click(function () {
        $('#alertError').hide();

        var data = {
            name: $('#Name').val()
        };

        $.post('<?= current_url() ?>', data, callback, 'json');
    });

    function showErrorAlert(message) {
        $('#alertErrorMessage').text(message);
        $('#alertError').slideDown();
    }
</script>