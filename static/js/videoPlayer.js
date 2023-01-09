const playPauseBtn = document.querySelector('.play-pause-button');
const fullScreenBtn = document.querySelector('.full-screen-button');
const muteBtn = document.querySelector('.mute-button');
const speedBtn = document.querySelector('.speed-button');
const currentTimeElem = document.querySelector('.current-time');
const totalTimeElem = document.querySelector('.total-time');
const thumbnailImg = document.querySelector('.thumbnail-img');
const volumeSlider = document.querySelector('.volume-slider');
const videoContainer = document.querySelector('.video-container');
const timelineContainer = document.querySelector('.timeline-container');
const video = document.querySelector('.video');

// Video timeline
timelineContainer.addEventListener('mousemove', handleTimeLineUpdate);
timelineContainer.addEventListener('mousedown', toggleScrubbing);

document.addEventListener('mouseup', event => {
    if (isScrubbing) toggleScrubbing(event);
});
document.addEventListener('mousemove', event => {
    if (isScrubbing) handleTimeLineUpdate(event);
});

let isScrubbing = false;
let wasPaused;

function toggleScrubbing(event) {
    const rect = timelineContainer.getBoundingClientRect();
    const timelinePercent = Math.min(Math.max(0, event.x - rect.x), rect.width) / rect.width;
    isScrubbing = (event.buttons & 1) === 1;
    videoContainer.classList.toggle('scrubbing', isScrubbing);
    if (isScrubbing) {
        wasPaused = video.paused;
        video.pause();
    } else {
        video.currentTime = timelinePercent * video.duration;
        if (!wasPaused)
            video.play();
    }

    handleTimeLineUpdate(event);
}

function handleTimeLineUpdate(event) {
    const rect = timelineContainer.getBoundingClientRect();
    const percent = Math.min(Math.max(0, event.x - rect.x), rect.width) / rect.width;

    if (isScrubbing) {
        event.preventDefault()
        timelineContainer.style.setProperty("--progress-position", percent)
    }
}

// Playback speed
speedBtn.addEventListener('click', () => changePlaybackSpeed(video));

function changePlaybackSpeed(video) {
    let newPlaybackRate = video.playbackRate + .25;
    if (newPlaybackRate > 2) newPlaybackRate = .25;
    video.playbackRate = newPlaybackRate;
    speedBtn.textContent = `${newPlaybackRate}x`;
}

// Time video logic
video.addEventListener('timeupdate', () => {
    currentTimeElem.textContent = formatTotalTime(video.currentTime);
    const timelinePercent = video.currentTime / video.duration;
    timelineContainer.style.setProperty('--progress-position', timelinePercent.toString());
})

video.addEventListener('loadeddata', () => {
    totalTimeElem.textContent = formatTotalTime(video.duration);
});

const zeroFormatter = new Intl.NumberFormat(undefined, {
    minimumIntegerDigits: 2
});

function formatTotalTime(totalTime) {
    const seconds = Math.floor(totalTime % 60);
    const minutes = Math.floor(totalTime / 60) % 60;
    const hours = Math.floor(totalTime / 3600);

    if (hours === 0)
        return `${minutes}:${zeroFormatter.format(seconds)}`;
    else
        return `${hours}:${zeroFormatter.format(minutes)}:${zeroFormatter.format(seconds)}`;
}

function skip(duration, video) {
    video.currentTime += duration;
}

// Volume video logic
muteBtn.addEventListener('click', event => toggleMute(video));
volumeSlider.addEventListener('input', event => {
    video.volume = event.target.value;
    video.muted = event.target.value === 0;
})
video.addEventListener('volumechange', () => {
    volumeSlider.value = video.volume;
    let volumeLevel;

    if (video.muted || video.volume === 0) {
        volumeSlider.value = 0;
        volumeLevel = "mute";
    } else if (video.volume >= .6) {
        volumeLevel = "up";
    } else {
        volumeLevel = "down";
    }

    videoContainer.dataset.volumeLevel = volumeLevel
})

function toggleMute(video) {
    video.muted = !video.muted;
}

// View video mode logic
function fullScreenMode(videoContainer) {
    if (document.fullscreenElement === null) {
        videoContainer.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

fullScreenBtn.addEventListener('click', event => fullScreenMode(videoContainer));
document.addEventListener('fullscreenchange', () => {
    videoContainer.classList.toggle('full-screen', document.fullscreenElement);
});

// Play/pause logic
function togglePlay(video) {
    video.paused ? video.play() : video.pause();
}

playPauseBtn.addEventListener('click', event => togglePlay(video));

video.addEventListener('click', event => togglePlay(video));

video.addEventListener('play', event => {
    videoContainer.classList.remove('paused');
});

video.addEventListener('pause', event => {
    videoContainer.classList.add('paused');
});

// document.addEventListener('keydown', event => {
//     const tagName = document.activeElement.tagName.toLowerCase();
//
//     if (tagName === 'input') return;
//
//     switch (event.key.toLowerCase()) {
//         case " ":
//             if (tagName === 'button') return;
//         case "k":
//             togglePlay(video);
//             break;
//         case "f":
//             fullScreenMode(videoContainer);
//             break;
//         case "m":
//             toggleMute(video);
//             break;
//         case "arrowleft":
//         case "j":
//             skip(-5, video);
//             break;
//         case "arrowright":
//         case "l":
//             skip(5, video);
//             break;
//     }
// });