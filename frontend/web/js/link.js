const linkModal = document.getElementById('linkModalToggle');
if(linkModal){
    linkModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget;

        let id = button.getAttribute('data-bs-id');
        let linkId = button.getAttribute('data-bs-linkId');
        let title = button.getAttribute('data-bs-title');
        let url = button.getAttribute('data-bs-url');

        let idInput = linkModal.querySelector('.modal-body .linkId');
        let titleInput = linkModal.querySelector('.modal-body .linkTitle');
        let urlInput = linkModal.querySelector('.modal-body .linkUrl');
        let linkIdInput = linkModal.querySelector('.modal-body .linkId');

        titleInput.value = title;
        urlInput.value = url;
        idInput.value = id;
        linkIdInput.value = linkId
    })
}

// const $form = $('#link-form');
// $form.on('beforeSubmit', function() {
//     const data = $form.serialize();
//     $.ajax({
//         url: $form.attr('action'),
//         type: 'POST',
//         data: data,
//         success: function (data) {
//             // Implement successful
//         },
//         error: function(jqXHR, errMsg) {
//             alert(errMsg);
//         }
//     });
//     return false; // prevent default submit
// });