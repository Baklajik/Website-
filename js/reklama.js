window.addEventListener('scroll', function () {
    const scrollPosition = window.scrollY || document.documentElement.scrollTop;
    const pageHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const middlePosition = pageHeight / 2;

    if (scrollPosition >= middlePosition) {
        const ad = document.getElementById('hidden-ad');
        if (ad && ad.style.display === 'none') {
            ad.style.display = 'block'; 
        }
    }
});

function hideAd() {
    const ad = document.getElementById('hidden-ad');
    if (ad) {
        ad.style.display = 'none';
    }
}