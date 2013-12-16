var colors = new Array('#4D3D98', '#0C8B44', '#88288F', '#D24827', '#4a8bc2');
var body_Color = "#1C1651";
var hover_Color = "#352869";

var search_color = "#1C1651";
var search_hover = "#5F4A9E";


var inmenu1 = new Boolean(false);
var slide = new Boolean(true);
var time = 200;
var inmenu1F = new Boolean(false);
var slide1F = new Boolean(true);
var tempX = 0;
var CurMenu;

var prevMenuCap = "";


$(window).load(function(){
/*-----------------------------------Setting Up Colors---------------------------------------------- */
	$("ul.menu1").css("background-color", body_Color);
	$("ul.menu1>li.login_form form").css("background-color", body_Color);
	$("ul.menu1>li.dropdown>ul").css("background-color", body_Color);

	jQuery("ul.menu1>li").not("ul.menu1>li.search").each(function(){
		L = colors.length;
		X = $(this).index();
		for(i = 0, j = 0; i <= X; i++, j++)
		{
			if(j == L)
				j = 0;
			if(i == X)
				$(this).css("background-color", colors[j]);
		}
	})
	$("ul.menu1>li.search:has(img)").css("background-color", search_color);


/*-----------------------------------Fixxnig Width Of Menus----------------------------------- */
	jQuery("ul.menu1>li").not(".search").not(".login_form").each(function(){
		if($(this).width() < 70)
			$(this).css("width", String(80) + "px");
		else
			$(this).css("width", String($(this).width() + 20) + "px");
	})
	
/*-----------------------------------Position fixing of  dropdown menusDrop, loginform down----------------------------------- */

	$("ul.menu1>li.dropdown").each(function(){
	
		X = jQuery(this).children("ul").width();
		
		if(X < 150){
			jQuery(this).children("ul").css("width", String(150 + 2) + "px");
		}else{
			jQuery(this).children("ul").css("width", String(X + 2) + "px");
		}
		
		jQuery(this).children("ul").children("li").children("a").each(function(){
		
			if(jQuery(this).children("img").length > 0){
				jQuery(this).children("span").css("float", "right");
			}else{
				if(jQuery(this).children("span").length == 0)
				{
					T = $(this).text();
					$(this).text("");
					$(this).prepend("<span>" + T + "</span>")
				}
				jQuery(this).children("span").css("float", "left");
			}		
		})
	})
	
	
	$("ul.menu1>li.dropdown").each(function(){

		X = $(this).offset().left + $(this).width()/2 - jQuery(this).children("ul").width()/2;
		Y = $("ul.menu1").offset().top + $("ul.menu1").height();
	
		if(X < $("ul.menu1").offset().left)
		{
			X = $("ul.menu1").offset().left;
		}

		jQuery(this).children("ul").offset({top:Y,left:X})

	})
	
	
	$("ul.menu1>li.login_form").each(function(){

		X = $(this).offset().left + $(this).width()/2 + 2 - jQuery(this).children("form").width()/2;
		Y = $("ul.menu1").offset().top + $("ul.menu1").height();
	
		jQuery(this).children("form").offset({top:Y,left:X})

	})

	
/*------------------------------ Fixing the search -----------------------------*/
	$("ul.menu1>li.search").css({'border':'none', 'margin':'0px', 'padding':'0px'});
	jQuery("ul.menu1>li.search:has(input)").css("height", "100%");
	
	X = jQuery("ul.menu1>li.search:has(input)").children("input").height() + 10;
	Y = jQuery("ul.menu1>li.search:has(input)").height();
	T = (Y - X)/2;
	jQuery("ul.menu1>li.search:has(input)").children("input").css("margin-top", String(T) + "px");
		
	$("ul.menu1>li.search:has(img)").css({'border':'solid 2px white', 
										'margin-top':String(T) + 'px', 'height':String(X -4)+'px', width : String(X -4)+'px',
										'margin-right':'10px'});
	jQuery("ul.menu1>li.search:has(img)").children("img").css('height', String(X - 4) + 'px');

	/*------------- Other Fixing -----------------*/
	$("ul.menu1>li.search:has(input)").css("cursor", "default");
	
	/*------------- Hiding Elements -----------------*/
			
	$("ul.menu1>li.dropdown>img, ul.menu1>li.dropdown>ul").hide();
	$("ul.menu1>li.login_form>img, ul.menu1>li.login_form form").hide();
	$("ul.menu1>li.dropdown>img, ul.menu1>li.dropdown>ul").css("opacity", "1");


/* ------------- Events handling ------------*/
	
	$("ul.menu1>li:has(a) , ul.menu1>li:has(img)").not('.dropdown, .login_form, .search').mouseenter(function(){		
		$(this).css("opacity", ".5");
		$(this).animate({opacity:'1'}, "fast");
		$(this).css("border", "solid 2px " + hover_Color);
	})

	
	$("ul.menu1>li:has(a) , ul.menu1>li:has(img)").not('.dropdown, .login_form, .search').mouseleave(function(){
		$(this).css("border", "solid 2px transparent");
	})
	
	

	$("ul.menu1>li.dropdown").mouseenter(function(){
		if(CurMenu != this){


			$("ul.menu1>li.dropdown").children("ul").stop(false, true);
			$("ul.menu1>li.dropdown").children("ul").hide();
			
			$(this).css("opacity", ".5");
			
			$(this).css("border", "solid 2px " + hover_Color);
			$(this).animate({opacity:'1'}, "fast");
			
			jQuery(this).children("img").show();
			jQuery(this).children("ul").show();
			
			X = jQuery(this).children("ul").offset().left + 20;
			jQuery(this).children("ul").offset({left:X});
			jQuery(this).children("ul").stop(false, true).animate({left:'-=20px'}, time);
			jQuery(this).children("ul").css("opacity", "1");
			
			jQuery(this).children("ul").children("*").css("opacity", '0');
			jQuery(this).children("ul").children("*").animate({opacity:'1'}, time);
		}else{
		
			$(this).css("border", "solid 2px " + hover_Color);
		}
		CurMenu = this;
		inmenu1 = true;
	})
	
	$("ul.menu1>li.dropdown").mouseleave(function(){
		inmenu1 = false;
		$(this).css("border", "solid 2px transparent");
		Hmenu = this;
		setTimeout(function(){
		
			if(inmenu1 == false){
				jQuery(Hmenu).children("ul").stop(false, true);
				X = jQuery(Hmenu).children("ul").offset().left + 20;
				jQuery(Hmenu).children("ul").offset({left:X});
				jQuery(Hmenu).children("ul").stop(false, true).animate({left:'-=20px', opacity:'0'}, time, function(){
																		jQuery(Hmenu).children("ul").hide();
																		});
				if(Hmenu == CurMenu)
					CurMenu = 0;
				}
			}, 300);
	})

	$("ul.menu1>li.dropdown>ul>li").mouseenter(function(){
		$(this).css("background-color", hover_Color);
		$(this).css("opacity", ".7");
		$(this).animate({opacity : "1"}, "fast");
	})

	$("ul.menu1>li.dropdown>ul>li").mouseleave(function(){
		$(this).css("background-color", "transparent");
	})
	
	
	$("ul.menu1>li.search input").focus(function(){
		$(this).animate({width:"+=10px"}, "fast");
	})

	$("ul.menu1>li.search input").blur(function(){
		$(this).animate({width:"-=10px"}, "fast");
	})	
	
	$("ul.menu1>li.search:has(img)").mouseenter(function(){
		$(this).css("background-color", search_hover)
	})
	
	$("ul.menu1>li.search:has(img)").mouseleave(function(){
		$(this).css("background-color", search_color)
	})
	
	
	$("ul.menu1>li.login_form").mouseenter(function(){
		inmenu1F = true;
		if(slide1F == true){

			$(this).css("opacity", ".7");
			$(this).animate({opacity : "1"});
			$("ul.menu1>li.login_form form").stop(false, true);
			$("ul.menu1>li.login_form>img, ul.menu1>li.login_form>form").show();
			$("ul.menu1>li.login_form>form").css("opacity", "1");
			X = $("ul.menu1>li.login_form form").offset().left + 20;
			$("ul.menu1>li.login_form form").offset({left:X});
			$("ul.menu1>li.login_form form").stop(false, true).animate({left:'-=20px'}, time);
			slide1F = false;
		}
	})
	
	$("ul.menu1>li.login_form").mouseleave(function(){

		inmenu1F = false;
		setTimeout(function(){
				if(inmenu1F == false){
					$("ul.menu1>li.login_form form").stop(false, true)
					X = $("ul.menu1>li.login_form form").offset().left + 20;
					$("ul.menu1>li.login_form form").offset({left:X});
					$("ul.menu1>li.login_form form").stop(false, true).animate({left:'-=20px', opacity:'0'}, time,
											function(){
												$("ul.menu1>li.login_form form").hide();
											});
					$("ul.menu1>li.login_form>img").hide();
					
					slide1F = true;
				}}, 300)
	})
})