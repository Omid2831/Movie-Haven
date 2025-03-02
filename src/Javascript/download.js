function downloadImage() {
    const link = document.createElement('a');
    link.href = '../images/Flow.jpg';
    link.download = 'Flow.jpg';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    }

document.getElementById('download').addEventListener('click', function() {
    if (window.location.pathname.endsWith('index.html')) {
        downloadImage();
    }
});
