function select_photo(selected_photo) {
    document.querySelectorAll('.select_photo_label img').forEach(img => {
        img.parentNode.classList.remove('selected');
    });
    selected_photo.parentNode.classList.add('selected');
    selected_photo.nextElementSibling.checked = true;
}
function previewImage(event) {
    var preview = document.getElementById('custom_photo_preview');
    preview.style.display = 'block';
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = () => {
        URL.revokeObjectURL(preview.src);
    }
}
document.querySelector('form').addEventListener('reset', () => {
    var preview = document.getElementById('custom_photo_preview');
    preview.style.display = 'none';
    preview.src = "#";
});