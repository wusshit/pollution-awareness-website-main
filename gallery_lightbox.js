document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.gallery img');
    images.forEach(img => {
        img.addEventListener('click', function () {
            const lightbox = document.createElement('div');
            lightbox.id = 'lightbox';
            document.body.appendChild(lightbox);

            const imgElement = document.createElement('img');
            imgElement.src = img.src;
            lightbox.appendChild(imgElement);

            lightbox.addEventListener('click', () => {
                lightbox.remove();
            });
        });
    });
});
