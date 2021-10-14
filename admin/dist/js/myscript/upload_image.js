document.getElementById('readUrl').addEventListener('change', function() {
    if (this.files[0]) {
        var picture = new FileReader();
        picture.readAsDataURL(this.files[0]);
        picture.addEventListener('load', function(event) {
            document.getElementById('banner_image').setAttribute('src', event.target.result);
            document.getElementById('banner_image').style.display = 'block';
        });
    }
});