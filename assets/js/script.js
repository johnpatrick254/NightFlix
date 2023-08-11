const toggleVolume  = (button)=>{
    const muted = $('.preview-video').prop("muted");
$('.preview-video').prop("muted",!muted);
$(button).find('i').toggleClass('fa-volume-high');
$(button).find('i').toggleClass('fa-volume-xmark');
}

const previewEnded = ()=>{
    $('.preview-video').toggle();
    $('.preview-image').toggle();
}
