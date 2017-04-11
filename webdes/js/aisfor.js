var AIF = {};

AIF.video = function () {

    var $firstVideos,
        $inner,
        $body,
        $letters,
        $introVideo,
        $introButtons,
        $window,
        $header,
        $upControl,
        $downControl,
        $fullheight,
        $scrollEventElems,
        $mute,
        muted = false,
        videoHeight,
        currentPosition = 0,
        totalPositions,
        isSingleCol = false,
        vimeoPlayer,
        $vimeoHolder;

    function init () {

        // Cache selectors
        $window = $(window);
        $inner = $('.container--inner');
        $letters = $('.letter');
        $body = $('body');
        $introVideo = $('.js--video-intro');
        $header = $('header');
        $fullheight = $('.fullheight');
        $introButtons = $('.intro--buttons');
        $upControl = $('.header--hit--up');
        $downControl = $('.header--hit--down');
        $modal = $('.modal');
        $mute = $('.header--mute');
        $scrollEventElems = $('.letter, .intro--container');
        $vimeoHolder = $('.vimeo');

        checkWidth();

        $introVideo.on('ended', function (e) {
            showHeader();
            bindControls();
        });

        $window.on('resize', function () {
            checkWidth();
            calcTotalPositions();
        });
    }

    function checkWidth () {
        isSingleCol = ($window.innerWidth() <= 800);
        $fullheight.height($window.height());
        videoHeight = $('.video-container').height();
    }

    function showHeader () {
        $header.addClass('show');
    }

    function calcTotalPositions () {
        if (isSingleCol) {
            totalPositions = 28;
        } else {
            totalPositions = 14;
        }
    }

    function bindControls () {

        calcTotalPositions();
        checkControls();

        // Handle up/down keys
        $(document).on('keyup', function (e) {
            if (e.keyCode === 40) {
                moveDown();
            } else if (e.keyCode === 38) {
                moveUp();
            }
        });

        // Handle swipes
        $('.letters').hammer({}).bind('swipeup swipedown', function (e) {
            e.preventDefault();
            if (e.type === 'swipeup') {
                moveDown();
            } else if (e.type == 'swipedown') {
                moveUp();
            }
        });
        // $body.data('hammer').set({
        //     touchAction: 'auto'
        // });
        $('.letters').data('hammer').get('swipe').set({
            direction: Hammer.DIRECTION_VERTICAL
        });

        // Handle mousewheel
        var blockEvent = false;
        $('.letter, .intro--container').on('wheel', function (e) {

            if (blockEvent)
                return false;

            var dir = 'down';
            if(typeof e.originalEvent.detail == 'number' && e.originalEvent.detail !== 0) {
                if(e.originalEvent.detail > 0) {
                    dir = 'down';
                } else if(e.originalEvent.detail < 0){
                    dir = 'up';
                }
              } else if (typeof e.originalEvent.wheelDelta == 'number') {
                if(e.originalEvent.wheelDelta < 0) {
                    dir = 'down';
                } else if(e.originalEvent.wheelDelta > 0) {
                    dir = 'up';
                }
              }

            if (dir === 'up') {
                moveUp();
            } else {
                moveDown();
            }

            blockEvent = true;

            //Throttle 1 event every 2 seconds
            setTimeout(function () {
                blockEvent = false;
            }, 2000);
        });

        // When container has moved video(s) into view
        $inner.on('transitionend', function (e) {
            if($(e.target).is('.container--inner')) {
                checkVideo();
            }
        });

        $letters.find('.playbutton').on('click', function (e) {
            var $target = $(e.target),
                $firstVideo = $target.parent().find('.first video');

            if ($firstVideo.hasClass('ended')) {
                videoClicked($firstVideo);
            }
        });

        $introButtons.addClass('show');

        $introButtons.find('.explore').on('click', function (e) {
            e.preventDefault();
            moveDown();
        });

        $introButtons.find('.watch-full').on('click', function (e) {
           showModal();
        });

        $modal.on('click', function (e) {
            $modal.hide();
            if (vimeoPlayer) {
                vimeoPlayer.unload();
            }
        });

        $upControl.on('click', function () {
            moveUp();
        });

        $downControl.on('click', function () {
            moveDown();
        });

        $mute.on('click', function (e) {
            e.preventDefault();
            muted = !muted;
            $('video').each(function (index, elem) {
                var $elem = $(elem);
                $elem[0].muted = muted;
            });

            if (muted) {
                $(e.target).text('Turn Sound On');
            } else {
                $(e.target).text('Turn Sound Off');
            }
        });
    }

    function showModal () {
        $modal.show();
        var $inner = $modal.find('.modal--inner');
        $inner.css('padding-top', ($modal.height() - $inner.height()) / 2);

        if (!vimeoPlayer) {
            var options = {
                url: $vimeoHolder.data('src'),
                width: '100%'
            };
            vimeoPlayer = new Vimeo.Player($vimeoHolder[0], options);
        }
    }

    function checkControls () {
        if (currentPosition === 0) {
            $upControl.hide();
        } else if (!isSingleCol) {
            $upControl.show();
        }

        if (currentPosition === totalPositions) {
            $downControl.hide();
        } else if (!isSingleCol) {
            $downControl.show();
        }
    }

    function moveDown () {

        if (!isSingleCol && currentPosition > 13) {
            return false;
        } else if (isSingleCol && currentPosition > 26) {
            return false;
        }

        var windowHeight = $window.innerHeight(),
            moveTo = (windowHeight + (currentPosition * videoHeight)) * -1;

        if (isSingleCol && currentPosition !== 26) {
            // Centre letter videos in page
            var extra = (windowHeight - videoHeight) / 2;
            moveTo += extra;
        }

        $inner.css('top', moveTo);

        if (currentPosition < totalPositions) {
            currentPosition++;
        }

        checkControls();
    }

    function moveUp (noTransition) {

        if (currentPosition > 0) {
            currentPosition--;
        }

        var windowHeight = $window.innerHeight(),
            moveTo = (currentPosition * videoHeight);

        if (isSingleCol && currentPosition !== 0 && currentPosition !== 27) {
            // Centre letter videos in page
            var extra = (windowHeight - videoHeight) / 2;
            moveTo -= extra;
        }

        if (currentPosition > 0) {
            moveTo = moveTo + (windowHeight - videoHeight);
        }

        if (noTransition) {
            $inner.addClass('notransition');
        }

        $inner.css('top', moveTo * -1);

        if (noTransition) {
            // Force reflow
            $inner[0].offsetHeight; // jshint ignore:line
            $inner.removeClass('notransition');
            checkVideo();
        }

        checkControls();
    }

    function gotoLetter (letter) {

        var gotoIndex = 0;

        if (letter == '#intro') {
            gotoIndex = -1;
            showModal();
        } else if (letter == '#about'){
            gotoIndex = 26;
        } else {
            letter = letter.replace('#', '');

            $letters.each(function (index, elem) {
                if ($(elem).attr('id') === letter) {
                    gotoIndex = index;
                }
            });
        }

        if (isSingleCol) {
            currentPosition = gotoIndex + 2;
        } else {
            currentPosition = Math.ceil((gotoIndex + 1) / 2) + 1;
        }

        moveUp(true);
    }

    function checkVideo () {
        var lettersToPlay = [];

        if (isSingleCol) {
            lettersToPlay.push(currentPosition - 1);
        } else {
            var pos = currentPosition * 2;
            lettersToPlay.push(pos - 2);
            lettersToPlay.push(pos - 1);
        }

        playFirstVideos(lettersToPlay);
    }

    function playFirstVideos (lettersToPlay) {

        $.each($letters, function (index, letter) {
            var $letter = $(letter),
                $elem = $letter.find('.first video'),
                $playbutton = $elem.parent().parent().find('.playbutton');

            if (lettersToPlay.indexOf(index) > -1) {
                // Set source tag, fade in when source has loaded
                // iOS must have autoplay set on <video> to get loadeddata event
                var $source = $('<source type="video/mp4"></source>');
                $source[0].src = $elem.data('src');
                $elem.on('loadeddata', function (e) {
                    $(e.target).addClass('show');
                    $elem.off('loadeddata');
                });
                $elem.on('ended', function (e) {
                    $elem.addClass('ended');
                    $playbutton.addClass('show');
                    $elem.off('ended');
                });
                if (!isSingleCol && !muted) {
                    $elem.removeAttr('muted');
                }
                setTimeout(
                    function () {
                        $elem.append($source);
                    },
                    lettersToPlay.indexOf(index) * 1000
                );
            } else if ($elem.hasClass('show')) {
                // Hide and unload previously played videos
                // iOS can only have have 15 loaded videos on the page at once
                $elem.on('transitionend', function (e) {
                    $elem.off('transitionend');
                    $elem.find('source').prop('src', '');
                    $elem[0].load();
                });
                $elem.removeClass('show ended');
                $playbutton.removeClass('show');
                var $second = $letter.find('.second video');
                $second.on('transitionend', function (e) {
                    $second.off('transitionend');
                    $second.remove();
                });
                $second.removeClass('show');
            }

        });
    }

    function videoClicked ($video) {
        var $secondElem = $('#' + $video.data('second')),
            secondSrc = $video.data('second-src'),
            $playbutton = $secondElem.parent().parent().find('.playbutton');

        $playbutton.removeClass('show');

        var $existingVideo = $secondElem.find('video');

        if ($existingVideo.length > 0) {
            $existingVideo[0].play();
        } else {
            if (isSingleCol || muted) {
                $video = $('<video autoplay muted playsinline></video>');
            } else {
                $video = $('<video autoplay playsinline></video>');
            }
            $source = $('<source type="video/mp4"></source>');
            $source[0].src = secondSrc;
            $video.append($source);
            $secondElem.append($video);
            $secondElem.show();
            $video.on('loadeddata', function (e) {
                $(e.target).addClass('show');
                $video.off('loadeddata');
            });
            $secondElem.on('click', function (e) {
                $video[0].play();
            });
            $video.on('ended', function () {
                $playbutton.addClass('show');
            });
        }
    }

    return {
        init: init,
        gotoLetter: gotoLetter
    };
}();

AIF.nav = function () {

    var $navToggle,
        $nav,
        $navItems;

    function init () {
        $navToggle = $('.js--nav-toggle');
        $nav = $('nav');
        $navItems = $nav.find('li a');

        $navToggle.on('click', function (e) {
            e.preventDefault();
            // iOS vh fix.
            var height = $(window).innerHeight() - 40;
            if ($(window).innerWidth() <= 800) {
                $navItems.css('height', Math.ceil(height / 7));
                $navItems.css('width', Math.floor($(window).innerWidth() / 4));
            } else {
                $navItems.css('height', Math.ceil(height / 4));
            }

            $nav.toggleClass('open');
        });

        $navItems.on('click', function (e) {
            e.preventDefault();
            $nav.removeClass('open');
            var href = $(e.target).closest('a').attr('href');
            AIF.video.gotoLetter(href);
        });
    }

    return {
        init: init
    };
}();

AIF.share = function () {

    var share_url = 'http://aisforalbert.com/',
        share_text = 'Feast your eyes on this animated alphabetical adventure about the highs and lows of parenting',
        share_via = 'studiolovelock';

    function init (argument) {
        $('.js--tweet').on('click', function (e) {
            e.preventDefault();
            openWindow('https://twitter.com/intent/tweet?url=' + encodeURI(share_url) + '&text=' + encodeURI(share_text) + '&via=' + encodeURI(share_via));
        });

        $('.js--facebook').on('click', function (e) {
            e.preventDefault();
            openWindow('https://www.facebook.com/sharer/sharer.php?u=' + encodeURI(share_url));
        });
    }

    function openWindow (url) {
        var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left,
            dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top,
            width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width,
            height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height,
            w = 600,
            h = 400,
            left = ((width / 2) - (w / 2)) + dualScreenLeft,
            top = ((height / 2) - (h / 2)) + dualScreenTop,
            share_window = 'menubar=no,location=yes,resizable=yes,scrollbars=yes,status=no,width=' + w + ', height=' + h + ', top=' + top + ', left=' + left;

        window.open(url, 'Share', share_window);
    }

    return {
        init: init
    };

}();

$(document).ready(function () {

    AIF.video.init();
    AIF.nav.init();
    AIF.share.init();

    $('.intro video').on('click', function (e) {
        $('.intro video')[0].play();
    });

    $('.js--who-made').hover(function (e) {
        $(e.target).text('Studio Lovelock');
    }, function (e) {
        $(e.target).text('Who made this?');
    });

});
