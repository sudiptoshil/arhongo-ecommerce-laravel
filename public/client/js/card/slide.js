 $(function(){



          if (self.location.href == top.location.href){
                $("body").css({font:"normal 13px/16px 'trebuchet MS', verdana, sans-serif"});
                var logo=$("<a href=''><img id='logo' border='0' src='' alt='' style='display:none;'></a>").css({position:"absolute"});
                $("body").prepend(logo);
                $("#logo").fadeIn();
            }

           

            $("#extruderRight").buildMbExtruder({
                position:"right",
                width:300,
                extruderOpacity:.8,
                textOrientation:"tb",
                onExtOpen:function(){},
                onExtContentLoad:function(){},
                onExtClose:function(){}
            });


        });