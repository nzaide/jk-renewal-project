var voice = document.querySelector('.js-slider-voice');

if (voice) {
    new Flickity(voice, {
        cellAlign: 'left',
        adaptiveHeight: true,
        wrapAround: true,
        contain: true,
        prevNextButtons: false,
        groupCells: true,
        autoPlay: true,
        imagesLoaded: true
    });
}
