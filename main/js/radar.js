const
    canvas = document.getElementById('canvas');
    ctx = canvas.getContext("2d");

ctx.font = "13px Arial Black";
const range = 5000,
        rad_x = 0,
        rad_y = 0,
        r_siz_x = 1024,
        r_siz_y = 1024;

canvas.width  = r_siz_x;
canvas.height = r_siz_y;

function CalcRadarPov(ent,mapname)
{
if(ent === {} || ent === undefined)
    return;

    var maps = {
        "de_dust2": {
            scale: 4.4,
            posX: -2476,
            posY: 3239
            },
        "de_cache": {
            scale: 5.5,
            posX: -2000,
            posY: 3250
        },
        "de_mirage": {
            scale: 5.00,
            posX: -3230,
            posY: 1713
        },
        "de_inferno": {
            scale: 4.9,
            posX: -2087,//2087
            posY:3870 //3870
        },
        "de_cbble": {
            scale: 6,
            posX: -3840,
            posY: 3072
        },
        "de_overpass": {
            scale: 5.2,
            posX: -4831,
            posY: 1781
        },
        "de_train": {
            scale: 4.7,
            posX: -2477,
            posY: 2392
        },
        "de_nuke": {
            scale: 7,
            posX: -3440,
            posY: 2890
        }
    };
    if(ent.alive){
        if(ent.team === 2)
            ctx.fillStyle='red';
        else
            ctx.fillStyle='blue';

        //if(ent.name === "C4")
        //    ctx.fillStyle= "#9CF3E2";

        var sc = maps[mapname].scale *(r_siz_y/1024);

        ctx.beginPath();
        ctx.arc(ent.x/sc-(maps[mapname].posX/sc),Math.abs(ent.y-maps[mapname].posY)/sc,4,0,Math.PI*2,true);
        ctx.closePath();
        ctx.fill();
        ctx.fillText(ent.name+"[" + ent.hp + "]", ent.x/sc-(maps[mapname].posX/sc),Math.abs(ent.y-maps[mapname].posY)/sc+16);
    }

}
var connected = false;
socket.onopen  = function(){
	connected=true;
	//socket.send('{"type": "get","nickname": ' + nickname '}');
}
socket.onclose  = function(){
	connected=false;
}

var players ={};
socket.onmessage  = function(event){
	try{
		players = (JSON.parse(event.data));
	}
	catch(e)
	{
		console.log(e);
	}
}

function updateRadar(){
	if(!connected)return;
	socket.send('{"type": "get","nickname": "' + nickname + '"}');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    //players = JSON.parse(data).players;
	/*
	
    players = {
        0: {
            "x":1300,
            "y":2613,
            "hp":100,
            "alive":1,
            "name":"CrowN",
            "team":3,
            "mapname":"de_dust2"
        },
        1: {
            "x":1300,
            "y":2610,
            "hp":50,
            "alive":1,
            "name":"Test",
            "team":2,
            "mapname":"de_dust2"
        },
        2: {
            "x":1300,
            "y":2616,
            "hp":1,
            "alive":1,
            "name":"Test565",
            "team":2,
            "mapname":"de_dust2"
        },
        3: {
            "x": Math.floor(Math.random() * (1300 - 100 + 1)) + 100,
            "y":Math.floor(Math.random() * (2623 - 100 + 1)) + 100,
            "hp":24,
            "alive":1,
            "name":"dwadwa",
            "team":3,
            "mapname":"de_dust2"
        }
    }
	*/
    //if(players === undefined)
    //    return;
	if(players === undefined || players == {})
	return;
    var img = new Image;

    img.src = "/main/images/maps/";
    img.src += players.map;
    img.src += "_radar_spectate.png";

    ctx.drawImage(img,0,0,r_siz_x,r_siz_y);

    var time = players.time;
    if(time !== undefined){
        ctx.fillStyle= "#9CF3E2";
        ctx.fillText(time,15,50,50);
    }
    for(var idx in players.players)
    {
        CalcRadarPov(players.players[idx],players.map);
    }
}
setInterval("updateRadar()", 1);


$('.radar .navigation li').on('click', function(){
    var action = $(this).attr('data-action');
    if(action == null) return false;

    $(this).toggleClass('active');
    $('.radar .actions').toggleClass(action);
});

function rotate(deg){
    var canvas = $('.radar canvas');
    var cdeg    = rotationDegrees(canvas);
    var scale   = getScale(canvas);
    var summ = deg + cdeg;
    canvas.css({'transform': 'rotate(' + summ + 'deg) scale(' + scale + ')'});
    return;
}

function scale(scale){
    var canvas  = $('.radar canvas');
    var cdeg    = rotationDegrees(canvas);
    var cscale  = getScale(canvas);
    var summ = cscale + scale;
    canvas.css({'transform': 'rotate(' + cdeg + 'deg) scale(' + summ + ')'});
    return;
}

function getScale(obj){
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");

    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
    } else { return 1; }

    return Math.sqrt(a*a + b*b);
}

function radius(){
    var canvas = $('.radar canvas');
    var radius = canvas.css('border-radius');

    if(radius == '0px')
        canvas.css({'border-radius': '50%'});
    else
        canvas.css({'border-radius': '0'});

    return;
}
function restart(){
    var canvas = $('.radar canvas').removeAttr("style");;
    return;
}
function rotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");

    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }

    if(angle < 0) angle +=360;
    return angle;
}
