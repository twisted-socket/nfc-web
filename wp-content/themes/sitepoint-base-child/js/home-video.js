jQuery(window).on('load', function ()
{
	new JCaption('img.caption');
});
var sidebar_pos = "";

jQuery("#yt-player").hide();
var tag = document.createElement("script");
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubePlayerAPIReady()
{
	player = new YT.Player("yt-player", {
		playerVars: {
			enablejsapi: 1,
			autoplay: 1,
			autohide: 2,
			loop: 1,
			controls: 0,
			disablekb: 0,
			showinfo: 0,
			rel: 0,
			fs: 0,
			list: 'PLICcdfGCswIvUqTlqlz4zq8Mb_f7c5c0I',
			listType: 'playlist',
			hl: "el",
			iv_load_policy: 3,
			start: 1,
			origin: "netfoodcafe.com",
			cc_load_policy: 0
		},
		width: "100%",
		height: "100%",
		events: {
			"onReady": onPlayerReady,
			//"onStateChange": onPlayerStateChange
		}
	});
}

function onPlayerReady(event)
{
	player.pauseVideo();
	player.mute();
	player.setPlaybackQuality("hd1080");
	setTimeout(function ()
	{
		jQuery(".eovid").css("display", "block");
		jQuery("#yt-player").fadeTo(3000, 1);
		player.playVideo();
	}, 1000);
}

var done = false;
function onPlayerStateChange(event)
{
	if (event.data == YT.PlayerState.PLAYING) {
		if (!done) {
			fade_in_video();
			setTimeout(loop_video, 59000);
			done = true;
		}
	} else if (event.data == YT.PlayerState.ENDED) {
		jQuery("#eoytvid").hide(function ()
		{
			player.stopVideo();
			jQuery(this).remove();
		});
	}
}

function fade_in_video()
{
	jQuery("input.bb").fadeTo(6000, "0.8");
	jQuery("#eoytvid").fadeTo(2000, 1.0);
}

function loop_video()
{
	player.seekTo(1);
	setTimeout(loop_video, 59000);
}


jQuery(document).ready(function ($)
{
	$(".billboard").css("background", "#000000");
	$('[class^="emod-billboard"]').fadeTo(0, 0.0);
	$("<img />").attr("src", "/assets/images/netfoodcafe-evia-greece-panoramic-1.jpg").load(function ()
	{
		$(this).remove();
		$('[class^="emod-billboard"]').css("background-image", "url('/assets/images/netfoodcafe-evia-greece-panoramic-1.jpg')");
		$('[class^="emod-billboard"]').fadeTo(500, 1.0);
	});
});

jQuery(function ($)
{
	$(".hasTooltip").tooltip({"html": true, "container": "body"});
});