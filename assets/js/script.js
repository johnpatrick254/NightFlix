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

const goBack = ()=>{
    window.history.back();
}

const startHideTimer=()=>{
    let timer;
    $(document).on("mousemove",()=>{
        clearTimeout(timer);
        $(".watch-nav").fadeIn();
        timer = setTimeout(()=>{
            $(".watch-nav").fadeOut();
        },2000)
    })
}

const updateVideoProgress = (id,user)=>{
    addDuration(id,user);
    let timer;
    $("video").on("playing",(e)=>{
          window.clearInterval(timer);
          const target = e.target;
          timer = window.setInterval(()=>{
            updateProgres(id,user,target.currentTime);

          },3000)
    }).on("ended",()=>{
        window.clearInterval(timer);

    })
}

const addDuration=(id,user)=>{
$.post("ajax/Addduration.php",{videoId:id,username:user},(data)=>{

    if(data !==null && data !== ""){
        alert(data);
    }
})
}

const updateProgres =(id,user,progress)=>{
    $.post("ajax/updateDuration.php",{videoId:id,username:user,progress:progress},(data)=>{

        if(data !==null && data !== ""){
            alert(data);
        }
    })
}

const runOnLoad=(videoID,user)=>{
    startHideTimer();
    updateVideoProgress(videoID,user);
}