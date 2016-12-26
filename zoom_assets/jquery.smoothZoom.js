/*
	Smooth Zoom Pan - jQuery Image Viewer
 	Copyright (c) 2011-14 Ramesh Kumar
	http://codecanyon.net/user/VF
	
	Version:	1.7.0
	RELEASE:	09 SEP 2011
	UPDATE:		27 May 2014
	
	Built using:
	jQuery 		version: 1.7.0+		http://jquery.com/
	Modernizr 	version: 2.8.2		http://www.modernizr.com/
	MouseWheel	version: 3.1.11		http://brandon.aaron.sh
	
*/

(function ($, window, document) {
	
	/*****************************************************************************
		Default settings:
		For detailed description of individual parameters, see the help document
	******************************************************************************/
	var defaults = {
		
		width: '',									//Width of the view area [480, '480px', '100%']
		height: '',									//Height of the view area [480, '480px', '100%']

		initial_ZOOM: '',							//Initial zoom level to start with (in percentage) [100]
		initial_POSITION: '',						//Initial location to be focused in pixel value [150,150 or 150 150]

		animation_SMOOTHNESS: 5.5,					//Ease or smoothness of all movements [Any number from 0]				
		animation_SPEED_ZOOM: 5.5,					//Speed of zoom movements [Any number from 0] 
		animation_SPEED_PAN: 5.5,					//Speed of pan movements [Any number from 0] 

		zoom_MAX: 800,								//Maximum limit for zooming (in percentage)
		zoom_MIN: '',								//Minimum limit for zooming (in percentage)
		zoom_SINGLE_STEP: false,					//To reach maximum and minimum zoom levels in single click 
		zoom_OUT_TO_FIT: true,						//To allow image to be zoomed out with whitespace on sides
		zoom_BUTTONS_SHOW: true,					//To enable/disable the + and - buttons

		pan_BUTTONS_SHOW: true,						//To enable/disable the arrow and reset buttons
		pan_LIMIT_BOUNDARY: true,					//To allow/restrict moving the image beyond boundaries
		pan_REVERSE: false,
		
		reset_ALIGN_TO: 'center center', 			//Image can be aligned to desired position on reset. Example: 'Top Left'
		reset_TO_ZOOM_MIN: true,					//How it should behave if zoom_MIN value set and while clicking reset button, 

		button_SIZE: 18,							//Button width and height (in pixels)
		button_SIZE_TOUCH_DEVICE: 30,				//Button width and height (in pixels) on touch devices
		button_COLOR: '#FFFFFF',					//Button color in hexadecimal
		button_BG_COLOR: '#000000',					//Button set's background color in hexadecimal
		button_BG_TRANSPARENCY: 55,					//Background transparency (in percentage)
		button_AUTO_HIDE: false,					//To hide the button set when mouse moved outside the view area
		button_AUTO_HIDE_DELAY: 1,					//Auto hide delay time in seconds
		button_ALIGN: 'bottom right',				//Button set can be aligned to any side or center
		button_MARGIN: 10,							//Space between button set and view port's edge
		button_ROUND_CORNERS: true,					//To enable disable roundness of button corner
		
		touch_DRAG: true,							//Enable/disable the dragability of image (touch)
		mouse_DRAG: true,							//Enable/disable the dragability of image (mouse)
		mouse_WHEEL: true,							//Enable/disable mousewheel zoom
		mouse_WHEEL_CURSOR_POS: true,				//Enable/disable position sensitive mousewheel zoom
		mouse_DOUBLE_CLICK: true,					//Enable/disable zoom action with double click

		background_COLOR: '#FFFFFF',				//Background colour of image container
		border_SIZE: 1,								//Border size of view area
		border_COLOR: '#000000',					//Border color of view area
		border_TRANSPARENCY: 10,					//Border transparency of view area
		
		image_url: '',								//Set url or image to be zoomed
		image_original_width: '',					//Original width of main image
		image_original_height: '',					//Original height of main image
		container: '',								//Set container element of image (id of container)
		
		on_IMAGE_LOAD: '',							//To Call external function immediatly after image loaded
		on_ZOOM_PAN_UPDATE: '',						//To Call external function for each zoom, pan animation frame
		on_ZOOM_PAN_COMPLETE: '',					//To Call external function whenever zoom, pan animation completes
		on_LANDMARK_STATE_CHANGE: '',				//To Call external function whenever the zoom leval crosses global "data-show-at-zoom" value
		
		use_3D_Transform: true,						//To enable / disable Hardware acceleration on webkit browsers
		
		responsive: false,							//To enable / disable Responsive / fluid layout
		responsive_maintain_ratio: true,			//To maintain view area width/height ratio or not
		max_WIDTH: '',								//Maximum allowed width of view area (helpful when 'width' parameter set with % and need limit)
		max_HEIGHT: ''								//Maximum allowed height of view area (helpful when 'height' parameter set with % and need limit)
	};

	function Zoomer($elem, params) {
		
		var self = this,		
		op = $.extend({}, defaults, params);
		this.$elem = $elem;	
		this.hasTouch = this.checkTouchSupport ();

		/**********************************************************
		Option values verified and formated if needed
		**********************************************************/
		this.sW = op.width;
		this.sH = op.height;

		this.init_zoom = op.initial_ZOOM / 100;
		this.init_pos = op.initial_POSITION.replace(/,/g, ' ').replace(/\s{2,}/g, ' ').split(' ');

		this.zoom_max = op.zoom_MAX / 100;
		this.zoom_min = op.zoom_MIN / 100;
		
		this.zoom_single = checkBoolean (op.zoom_SINGLE_STEP);
		this.zoom_fit = checkBoolean (op.zoom_OUT_TO_FIT);		
		this.zoom_speed = 1 + (((op.animation_SPEED === 0 || op.animation_SPEED? op.animation_SPEED : op.animation_SPEED_ZOOM) + 1) / 20);
		this.zoom_show = checkBoolean (op.zoom_BUTTONS_SHOW);

		this.pan_speed_o = (op.animation_SPEED === 0 || op.animation_SPEED ? op.animation_SPEED : op.animation_SPEED_PAN);
		this.pan_show = checkBoolean (op.pan_BUTTONS_SHOW);
		this.pan_limit = checkBoolean (op.pan_LIMIT_BOUNDARY);	
		this.pan_rev = checkBoolean (op.pan_REVERSE);		
		
		this.reset_align = op.reset_ALIGN_TO.toLowerCase().split(' ');	
		this.reset_to_zmin = checkBoolean(op.reset_TO_ZOOM_MIN);
		
		this.bu_size = parseInt((this.hasTouch? op.button_SIZE_TOUCH_DEVICE : op.button_SIZE)/2)*2;
		this.bu_color = op.button_COLOR;
		this.bu_bg = op.button_BG_COLOR;
		this.bu_bg_alpha = op.button_BG_TRANSPARENCY / 100;
		this.bu_icon = op.button_ICON_IMAGE;
		this.bu_auto = checkBoolean (op.button_AUTO_HIDE);

		this.bu_delay = op.button_AUTO_HIDE_DELAY * 1000;
		this.bu_align = op.button_ALIGN.toLowerCase().split(' ');
		this.bu_margin = op.button_MARGIN;
		this.bu_round = checkBoolean (op.button_ROUND_CORNERS);

		this.touch_drag = checkBoolean (op.touch_DRAG);
		this.mouse_drag = checkBoolean (op.mouse_DRAG);
		this.mouse_wheel = checkBoolean (op.mouse_WHEEL);
		this.mouse_wheel_cur = checkBoolean (op.mouse_WHEEL_CURSOR_POS);
		this.mouse_dbl_click = checkBoolean (op.mouse_DOUBLE_CLICK);

		this.ani_smooth =  Math.max(1, (op.animation_SMOOTHNESS+1)/1.45);
		
		this.bg_color = op.background_COLOR;
		this.bord_size = op.border_SIZE;
		this.bord_color = op.border_COLOR;
		this.bord_alpha = op.border_TRANSPARENCY / 100;

		this.container = op.container;
		this.image_url = op.image_url;
		this.image_width = op.image_original_width;
		this.image_height = op.image_original_height;
		
		this.responsive = checkBoolean (op.responsive);
		this.maintain_ratio = checkBoolean (op.responsive_maintain_ratio);
		this.w_max = op.max_WIDTH;
		this.h_max = op.max_HEIGHT;
		
		this.onLOAD = op.on_IMAGE_LOAD;
		this.onUPDATE = op.on_ZOOM_PAN_UPDATE;
		this.onZOOM_PAN = op.on_ZOOM_PAN_COMPLETE;
		this.onLANDMARK = op.on_LANDMARK_STATE_CHANGE;

		/***********************************************************
		Variables for inner operation.	
		x, y, width, height and scale value of image
		***********************************************************/
		this._x;
		this._y;
		this._w;
		this._h;
		this._sc = 0;		
		
		this.rA = 1;
		this.rF = 1;
		this.rR = 1;
		this.iW = 0;
		this.iH = 0;
		this.tX = 0;
		this.tY = 0;
		this.oX = 0;
		this.oY = 0;
		this.fX = 0;
		this.fY = 0;
		this.dX = 0;
		this.dY = 0;
		this.cX = 0;
		this.cY = 0;

		this.transOffX = 0;
		this.transOffY = 0;
		this.focusOffX = 0;
		this.focusOffY = 0;
		this.offX = 0;
		this.offY = 0;
		
		/***********************************************************
		Flags that convey current states and events 
		***********************************************************/
		this._playing = false;
		this._dragging = false;
		this._onfocus = false;
		this._moveCursor = false;
		this._wheel = false;
		this._recent = 'zoomOut';
		this._pinching = false;
		this._landmark = false;
		this._rA;
		this._centx;
		this._centy;
		this._onButton = false;
		this._onHitArea = false;		
		this.cFlag = {
			_zi: false,
			_zo: false,
			_ml: false,
			_mr: false,
			_mu: false,
			_md: false,
			_rs: false,
			_nd: false
		};
		
		/***********************************************************
		Elements and arrays that references elements
		***********************************************************/
		this.$holder;
		this.$hitArea;
		this.$controls;
		this.$loc_cont;		
		this.map_coordinates = [];
		this.locations = [];
		this.buttons = [];
		this.border = [];
		
		/***********************************************************
		miscellaneous
		***********************************************************/
		this.buttons_total = 7;
		this.cButtId = 0;
		this.pan_speed;
		this.auto_timer;
		this.ani_timer;
		this.ani_end;
		this.focusSpeed = this.reduction = .5;
		this.orig_style;		
		this.mapAreas;
		this.icons;		
		this.show_at_zoom;		
		this.assetsLoaded = false;	
		this.zStep = 0;	
		this.sRed = 300;
		this.use3D = op.use_3D_Transform && supportsTrans3D;
		
		// Set events to support pointer / touch / mouse 			
		if (navigator.pointerEnabled || navigator.msPointerEnabled) {			
			//Pointer				
			if (navigator.pointerEnabled) {
				this.pointerDown = 'pointerdown';
				this.pointerUp = 'pointerup';
				this.pointerMove = 'pointermove';
				
			} else if (navigator.msPointerEnabled) {
				this.pointerDown = 'MSPointerDown';
				this.pointerUp = 'MSPointerUp';
				this.pointerMove = 'MSPointerMove';
				
			}
			this.event_down = this.pointerDown+ '.sz';
			this.event_up 	= this.pointerUp+ '.sz';
			this.event_move = this.pointerMove+ '.sz';
			
			this.supportsPointer = true;	
			this.pointers = [];	
		
		} else if (this.hasTouch){	
			//Touch	only	
			this.event_down = 'touchstart'+ '.sz';
			this.event_up 	= 'touchend'+ '.sz';
			this.event_move = 'touchmove'+ '.sz';
		
		} else {
			//Mouse only
			this.event_down = 'mousedown'+ '.sz';
			this.event_up 	= 'mouseup'+ '.sz';
			this.event_move = 'mousemove'+ '.sz';
		}
	
		//Case 1: Image specificed (possibly) through img tag:
		if (this.image_url == '') {
			this.$image = $elem;
			this.id = this.$image.attr('id');
		
		//Case 2: Image url specificed through parameter:
		} else {
			var img = new Image();
			if (this.image_width) {
				img.width = this.image_width;
			}
			if (this.image_height) {
				img.height = this.image_height;
			}
			img.src = this.image_url;			
			this.$image = $(img).appendTo($elem);
		}		
		
		
		//Prepare container div (Basically the element that masks image with overflow hidden)
		this.setContainer();	
		
		//Get button icon image's url
		var testOb;
		if (!this.bu_icon) {
			var regx=/url\(["']?([^'")]+)['"]?\)/;
			testOb = $('<div class="smooth_zoom_icons"></div>');
			this.$holder.append(testOb);
			this.bu_icon = testOb.css("background-image").replace(regx,'$1');
			if (this.bu_icon == 'none') {
				this.bu_icon = 'zoom_assets/icons.png';
			}
			testOb.remove();
		}		
		
		//Firefox feature checkup
		if (this.$image.css('-moz-transform') && prop_transform) {
			testOb = $('<div style="-moz-transform: translate(1px, 1px)"></div>');
			this.$holder.append(testOb);
			this.fixMoz = testOb.position().left === 1 ? false : true;
			testOb.remove();	
		} else {
			this.fixMoz = false;
		}		
		
		//Preload icons and main image.	
		this.$image.hide();	
		this.imgList = [
			{loaded: false, src: this.bu_icon || 'zoom_assets/icons.png'}, //Icon image
			{loaded: false, src: this.image_url == ''? this.$image.attr('src') : this.image_url} // Main image
		];
		
		$.each(this.imgList, function (i){
			var _img = new Image();	
			$(_img) .bind('load', {id:i, self: self}, self.loadComplete)
					.bind('error', {id:i, self: self}, self.loadComplete); //Allow initiation even if image is not there :(
			_img.src = self.imgList[i].src;	
		});
		
	}

	Zoomer.prototype = {
		
		/*Preload the icon and main image
		*********************************************************************************************************************/
		loadComplete: function (e) {
			var self = e.data.self,
				complete = true;
			
			self.imgList[e.data.id].loaded = true;					
			for (var j=0; j<self.imgList.length; j++){				
				if (!self.imgList[j].loaded) {
					complete = false;
				}
			}
			if (complete) {
				self.assetsLoaded = true;				
				if (self.onLOAD !== '') {
					self.onLOAD ();
				}
										
				//Assets loaded, initiate plugin
				self.init();
			}
		},	
		
		
		/*Make sure the device has touch screen support
		*********************************************************************************************************************/
		checkTouchSupport: function (){
			var touch = 'ontouchstart' in window || 'createTouch' in document;					
			if (navigator.pointerEnabled) {
				touch =  Boolean(touch || navigator.maxTouchPoints);
			} else if (navigator.msPointerEnabled) {
				touch = Boolean(touch || navigator.msMaxTouchPoints);
			}		
			return touch;
		},

		
		/*Initiate after assets loaded
		***********************************************************************************************************************/
		init: function () {
			var self = this,
				$image = self.$image,
				sW = self.sW,
				sH = self.sH,
				container = self.container,	
				cBW, cBH, pan_show = self.pan_show,
				zoom_show = self.zoom_show,
				$controls = self.$controls,
				buttons = self.buttons,
				cFlag = self.cFlag,
				bu_align = self.bu_align,
				bu_margin = self.bu_margin,
				$holder = self.$holder;

			//Store the default image properties so that it can be reverted back when plugin needs to be destroyed
			self.orig_style = self.getStyle();

			//IE 6 Image tool bar disabled
			$image.attr('galleryimg', 'no');
			
			if (!navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad)/)) {
				$image.removeAttr('width');
				$image.removeAttr('height');
			}		

			//In case parent element's display property set to 'none', we need to first set them 'block', measure the width and height and then set them back to 'none'
			var temp = $image,
			dispArray = [];
			for (var i = 0; i<5; i++) {				
				if (temp && temp[0].tagName !== 'BODY' && temp[0].tagName !== 'HTML'){									
					if (temp.css('display') == 'none') {
						temp.css('display', 'block');
						dispArray.push(temp);		
					}
					temp = temp.parent();
				} else {
					break;
				}
			}	

			self.iW = $image.width();
			self.iH = $image.height();
			
			for (var i = 0; i< dispArray.length; i++) {
				dispArray[i].css('display', 'none');
			}

			//Initially the image needs to be resized to fit container. To do so, first measure the scaledown ratio	
			self.rF = self.rR = self.checkRatio(sW, sH, self.iW, self.iH, self.zoom_fit);

			//If NO Minimum zoom value set
			if (self.zoom_min == 0 || self.init_zoom != 0) {			
				if (self.init_zoom != '') {
					self.rA = self._sc = self.init_zoom;
				} else {
					self.rA = self._sc = self.rF;
				}	
				if (self.zoom_min != 0) {
					self.rF = self.zoom_min;
					if (self.reset_to_zmin) {
						self.rR = self.zoom_min											
					}
				}
				
			//If Minimum zoom value set
			} else {				
				if (self.rF < self.zoom_min) {
					self.rF = self.zoom_min;
					if (self.reset_to_zmin) {
						self.rR = self.zoom_min											
					}
					self.rA = self._sc = self.zoom_min;				
				} else {
					self.rA = self._sc = self.rR;
				}				
			}

			//Width and Height to be applied to the image
			self._w = self._sc * self.iW;
			self._h = self._sc * self.iH;

			//Resize the image and position it centered inside the wrapper
			if (self.init_pos == '') {
				self._x = self.tX = (sW - self._w) / 2;
				self._y = self.tY = (sH - self._h) / 2;
			} else {
				self._x = self.tX = (sW / 2) - parseInt(self.init_pos[0]) * self._sc;
				self._y = self.tY = (sH / 2) - parseInt(self.init_pos[1]) * self._sc;
				self.oX = (self.tX - ((sW - self._w) / 2)) / (self._w / sW);
				self.oY = (self.tY - ((sH - self._h) / 2)) / (self._h / sH);
			}

			if ((!self.pan_limit || self._moveCursor || self.init_zoom != self.rF) && self.mouse_drag) {				
				 $image.css('cursor', 'move');
				 self.$hitArea.css('cursor', 'move');
			}
			
			
			if (prop_transform) {	
				self.$image.css(prop_origin, '0 0');
			}
			if (self.use3D) {
				$image.css({				
					'-webkit-backface-visibility': 'hidden',
					'-webkit-perspective': 1000
				});
			}	
			
			//Start displaying the image		
			$image.css({
					position: 'absolute',
					'z-index': 2,
					left: '0px',
					top: '0px',
					'-webkit-box-shadow': '1px 1px rgba(0,0,0,0)'
				})
				.hide()
				.fadeIn(500, function () {
					$holder.css('background-image', 'none');					
				});
			
			//Create Control buttons and events				
			var self = self,
				bs = self.bu_size,
				iSize = 50,
				sDiff = 2,
				bSpace = 3,
				mSize = Math.ceil(self.bu_size / 4),
				iconOff = bs < 16 ? 50 : 0,
				bsDiff = bs - sDiff;

			//Show all buttons		
			if (pan_show) {
				if (zoom_show) {
					cBW = parseInt(bs + (bs * .85) + (bsDiff * 3) + (bSpace * 2) + (mSize * 2));
				} else {
					cBW = parseInt((bsDiff * 3) + (bSpace * 2) + (mSize * 2));
				}
				cBH = parseInt((bsDiff * 3) + (bSpace * 2) + (mSize * 2));

				//Show zoom buttons only		
			} else {
				if (zoom_show) {
					cBW = parseInt(bs + mSize * 2);
					cBH = parseInt(bs * 2 + mSize * 3);
					cBW = parseInt(cBW / 2) * 2;
					cBH = parseInt(cBH / 2) * 2;
				} else {
					cBW = 0;
					cBH = 0;
				}
			}

			var pOff = (iSize - bs) / 2,
				resetCenterX = cBW - ((bs - (pan_show ? sDiff : 0)) * 2) - mSize - bSpace,
				resetCenterY = (cBH / 2) - ((bs - (pan_show ? sDiff : 0)) / 2);

			var hProp, vProp, hVal, vVal;
			//Align button set as per settings
			if (bu_align[0] == 'top') {
				vProp = 'top';
				vVal = bu_margin;
			} else if (bu_align[0] == 'center') {
				vProp = 'top';
				vVal = parseInt((sH - cBH) / 2);
			} else {
				vProp = 'bottom';
				vVal = bu_margin;
			}
			if (bu_align[1] == 'right') {
				hProp = 'right';
				hVal = bu_margin;
			} else if (bu_align[1] == 'center') {
				hProp = 'right';
				hVal = parseInt((sW - cBW) / 2);
			} else {
				hProp = 'left';
				hVal = bu_margin;
			}

			//Buttons Container		
			$controls = $(
				'<div style="position: absolute; ' + hProp + ':' + hVal + 'px; ' + vProp + ': ' + vVal + 'px; width: ' + cBW + 'px; height: ' + cBH + 'px; z-index: 20;" class="noSel">\
					<div class="noSel controlsBg" style="position: relative; width: 100%; height: 100%; z-index: 1;">\
					</div>\
				</div>'
			);
			
			$holder.append($controls);
			var $controlsBg = $controls.find('.controlsBg');
			
			//Make the corners rounded
			if (self.bu_round) {
				if (prop_radius) {					
					$controlsBg
						.css(prop_radius, (iconOff > 0 ? 4 : 5) + 'px')
						.css('background-color', self.bu_bg);
				} else {				
					self.roundBG(
						$controlsBg,
						'cBg',
						cBW,
						cBH,
						iconOff > 0 ? 4 : 5,
						375,
						self.bu_bg,
						self.bu_icon,
						1, 
						iconOff ? 50 : 0
					);
				}
			} else {
				$controlsBg.css('background-color', self.bu_bg);
			}
			
			$controlsBg.css('opacity', self.bu_bg_alpha);
			
			//Generating Button properties	(7 buttons)			
			buttons[0] = {
				_var: '_zi',
				l: mSize,
				t: pan_show ? (cBH - (bs * 2) - (bSpace * 2) + 2) / 2 : mSize,
				w: bs,
				h: bs,
				bx: -pOff,
				by: -pOff - iconOff
			};

			buttons[1] = {
				_var: '_zo',
				l: mSize,
				t: pan_show ? ((cBH - (bs * 2) - (bSpace * 2) + 2) / 2) + bs + (bSpace * 2) - 2 : cBH - bs - mSize,
				w: bs,
				h: bs,
				bx: -iSize - pOff,
				by: -pOff - iconOff
			};

			buttons[2] = {
				_var: self.pan_rev? '_ml' : '_mr',
				l: resetCenterX - bsDiff - bSpace,
				t: resetCenterY,
				w: bsDiff,
				h: bsDiff,
				bx: -(sDiff / 2) - iSize * 2 - pOff,
				by: -(sDiff / 2) - pOff - iconOff
			};

			buttons[3] = {
				_var: self.pan_rev? '_mr' : '_ml',
				l: resetCenterX + bsDiff + bSpace,
				t: resetCenterY,
				w: bsDiff,
				h: bsDiff,
				bx: -(sDiff / 2) - iSize * 3 - pOff,
				by: -(sDiff / 2) - pOff - iconOff
			};

			buttons[4] = {
				_var: self.pan_rev? '_md' : '_mu',
				l: resetCenterX,
				t: resetCenterY + bsDiff + bSpace,
				w: bsDiff,
				h: bsDiff,
				bx: -(sDiff / 2) - iSize * 4 - pOff,
				by: -(sDiff / 2) - pOff - iconOff
			};

			buttons[5] = {
				_var: self.pan_rev? '_mu' : '_md',
				l: resetCenterX,
				t: resetCenterY - bsDiff - bSpace,
				w: bsDiff,
				h: bsDiff,
				bx: -(sDiff / 2) - iSize * 5 - pOff,
				by: -(sDiff / 2) - pOff - iconOff
			};

			buttons[6] = {
				_var: '_rs',
				l: resetCenterX,
				t: resetCenterY,
				w: bsDiff,
				h: bsDiff,
				bx: -(sDiff / 2) - iSize * 6 - pOff,
				by: -(sDiff / 2) - pOff - iconOff
			};

			for (var i = 0; i < 7; i++) {
				buttons[i].$ob = $(
						'<div style="position: absolute; display: ' + (i < 2 ? zoom_show ? 'block' : 'none' : pan_show ? 'block' : 'none') + '; left: ' + (buttons[i].l - 1) + 'px; top: ' + (buttons[i].t - 1) + 'px; width: ' + (buttons[i].w + 2) + 'px; height: ' + (buttons[i].h + 2) + 'px; z-index:' + (i + 1) + ';" class="noSel">\
						</div>'
					)
				.css('opacity', .7)
				.bind('mouseover.sz mouseout.sz '+self.event_down, {
					id: i
					
				}, function (e) {
					self._onfocus = false;
					var $this = $(this);
					
					//Button over 
					if (e.type == 'mouseover') {
						if ($this.css('opacity') > .5){
							 $this.css('opacity', 1);
						}
					
					//Button out 
					} else if (e.type == 'mouseout') {
						if ($this.css('opacity') > .5) {
							$this.css('opacity', .7);
						}
					
					//Button press/down
					} else if (e.type == 'mousedown' || e.type == 'touchstart' || e.type == self.pointerDown) {
						self.cButtId = e.data.id;
						self._onButton = true;
						self._wheel = false;	
						
						//If NOT already down..
						if ($this.css('opacity') > .5) {
							$this.css('opacity', 1);
							$holder.find('#' + buttons[self.cButtId]._var + 'norm').hide();
							$holder.find('#' + buttons[self.cButtId]._var + 'over').show();
							
							//CASE 1: If zoomIn pressed and single step zoom enabled
							if (self.cButtId <= 1 && self.zoom_single){								
								if (!cFlag[buttons[self.cButtId]._var]) {									
									self.sRed = 300;
									cFlag[buttons[self.cButtId]._var] = true;
								}
								
							//CASE 2: If any button except RESET pressed
							} else if (self.cButtId <6) {
								cFlag[buttons[self.cButtId]._var] = true;
								
							//CASE 3: RESET pressed							
							} else {
								cFlag._rs = true;
								self.rA = self.rR;							
								if (self.reset_align[0] == 'top') {
									self.fY = (self.sH/2)*(self.rA/2);
								} else if (self.reset_align[0] == 'bottom') {
									self.fY = -(self.sH/2)*(self.rA/2);
								} else {
									self.fY = 0;
								}							
								if (self.reset_align[1] == 'left') {
									self.fX = (self.sW/2)*(self.rA/2);
								} else if (self.reset_align[1] == 'right') {
									self.fX = -(self.sW/2)*(self.rA/2);
								} else {
									self.fX = 0;
								}							
							}
							
							self.focusOffX = self.focusOffY = 0;
							self.changeOffset(true, true);
							if(!self._playing) {
								self.Animate();
							}
						}
						e.preventDefault();
						e.stopPropagation();						
					}
				});

				//Make 2 BGs for Button Normal and Over state
				//Button BG normal
				var tpm = $(
					'<div id="' + buttons[i]._var + 'norm" style="position: absolute; left: 1px; top: 1px; width: ' + buttons[i].w + 'px; height: ' + buttons[i].h + 'px; '+(prop_radius || !self.bu_round ? 'background:'+self.bu_color : '')+'">\
					</div>'
				);

				//Button BG hover
				var tpmo = $(
					'<div id="' + buttons[i]._var + 'over" style="position: absolute; left: 0px; top: 0px; width: ' + (buttons[i].w + 2) + 'px; height: ' + (buttons[i].h + 2) + 'px; display: none; '+(prop_radius || !self.bu_round ? 'background:'+self.bu_color : '')+'">\
					</div>'
				);

				//Add the button icons
				var cont = $(
					'<div id="' + buttons[i]._var + '_icon" style="position: absolute; left: 1px; top: 1px; width: ' + buttons[i].w + 'px; height: ' + buttons[i].h + 'px; background: transparent url(' + self.bu_icon + ') ' + buttons[i].bx + 'px ' + buttons[i].by + 'px no-repeat;" >\
					</div>'
				);
				
				buttons[i].$ob.append(tpm, tpmo, cont);
				$controls.append(buttons[i].$ob);

				//Apply corner radius
				if (self.bu_round) {
					if (prop_radius) {						
						tpm.css(prop_radius , '2px');				
						tpmo.css(prop_radius , '2px');						
					} else {
						self.roundBG(
							tpm,
							buttons[i]._var + "norm",
							buttons[i].w,
							buttons[i].h,
							2,
							425,
							self.bu_color,
							self.bu_icon,
							i + 1,
							iconOff ? 50 : 0
						);
						self.roundBG(
							tpmo,
							buttons[i]._var + "over",
							buttons[i].w + 2,
							buttons[i].h + 2,
							2,
							425,
							self.bu_color,
							self.bu_icon,
							i + 1,
							iconOff ? 50 : 0
						);
					}
				}
			}

			//Add Events for mouse drag / touch swipe action
			$(document).bind(self.event_up + self.id, {self: self}, self.mouseUp);
			
			if ((self.mouse_drag && !self.hasTouch) || (self.touch_drag && self.hasTouch)) {						
				self.$holder.bind(self.event_down, {self: self}, self.mouseDown);
				if (self.hasTouch) {
					$(document).bind(self.event_move + self.id, {self: self}, self.mouseDrag);
				}				
			}		

			//Add Double click / Double tap zoom
			if (self.mouse_dbl_click) {
				var dClickedX,
					dClickedY,
					dbl_click_dir = 1;
					
				self.$holder.bind('dblclick.sz', function (e) {					
					self.focusOffX = e.pageX - $holder.offset().left - (self.sW / 2);
					self.focusOffY = e.pageY - $holder.offset().top - (self.sH / 2);
					self.changeOffset(true, true);
					self._wheel = false;
					
					if (self.rA < self.zoom_max && dbl_click_dir == -1 && dClickedX != self.focusOffX && dClickedY != self.focusOffY) {
						dbl_click_dir = 1;
					}
					
					dClickedX = self.focusOffX;
					dClickedY = self.focusOffY;

					if (self.rA >= self.zoom_max && dbl_click_dir == 1) {
						dbl_click_dir = -1;
					}					
					if (self.rA <= self.rF && dbl_click_dir == -1) {
						dbl_click_dir = 1;
					}
					if (dbl_click_dir > 0) {
						self.rA *= 2;
						self.rA = self.rA > self.zoom_max ?  self.zoom_max : self.rA;
						cFlag._zi = true;
						clearTimeout(self.ani_timer);
						self._playing = true;
						self.Animate();
						cFlag._zi = false;

					} else {
						self.rA /= 2;
						self.rA =  self.rA < self.rF ? self.rF : self.rA;
						cFlag._zo = true;
						clearTimeout(self.ani_timer);
						self._playing = true;
						self.Animate();
						cFlag._zo = false;
					}
					e.preventDefault();		
					e.stopPropagation();								
				});
			}

			//Add mouse wheel event if enabled
			if (self.mouse_wheel) {
				 $holder.bind('mousewheel.sz', {self: this}, self.mouseWheel);
			}

			//Auto Hide the control buttons if enabled
			if (self.bu_auto) {
				$holder.bind('mouseleave.sz', {self: this}, self.autoHide);
			}

			//Prevent Controls Bg from start dragging image
			$controls.bind(self.event_down, function (e) {
				e.preventDefault();
				e.stopPropagation();				
			});

			//Prevent Controls Bg from double click zoom
			if (self.mouse_dbl_click) {
				$controls.bind('dblclick.sz', function (e) {
					e.preventDefault();
					e.stopPropagation();					
				});
			}

			//Prevent text selection for smoother dragging and button focus
			$('.noSel').each(function () {
				this.onselectstart = function () {
					return false;
				};
			});

			self.$holder = $holder;
			self.$controls = $controls;
			self.sW = sW;
			self.sH = sH;
			self.cBW = cBW;
			self.cBH = cBH;

			//Apply initial transformation
			self.Animate();
		},
		
		
		/*Prepare the container (holder) element and get landmarks if available
		***********************************************************************************************************************/
		setContainer: function () {			
			var self = this,
				$image = self.$image,
				bord_size = self.bord_size,
				border = self.border,
				$holder = self.$holder;

			//Wrap a container for image or get the container if specified through options:
			if (self.container == '' && self.image_url == '') {
				$holder = self.$image.wrap(
					'<div class="noSel smooth_zoom_preloader">\
					</div>'
				).parent();
				
			} else {
				if (self.image_url == ''){
					$holder = $('#'+self.container);
				} else {
					$holder = self.$elem;
				}
				$holder.addClass('noSel smooth_zoom_preloader');
				self.locations = [];
				self.$loc_cont = $holder.find('.landmarks');
				if (self.$loc_cont[0]) {
					var locs = self.$loc_cont.children('.item');
					self.loc_clone = self.$loc_cont.clone();
					self.show_at_zoom = parseInt(self.$loc_cont.data('show-at-zoom'),10) / 100;
					self.allow_scale = checkBoolean(self.$loc_cont.data('allow-scale'));
					self.allow_drag = checkBoolean(self.$loc_cont.data('allow-drag'));					
					locs.each(function () {	
						self.setLocation($(this));			
					});
				}
			}
						
			$holder.css({
				'position': 'relative',
				'overflow': 'hidden',
				'text-align': 'left',
				'-moz-user-select': 'none',
				'-khtml-user-select': 'none',
				'-webkit-user-select': 'none',
				'user-select': 'none',					
				'-webkit-touch-callout': 'none',
				'-ms-touch-action': 'none',
				'-webkit-tap-highlight-color': 'rgba(255, 255, 255, 0)', 
				'background-color': self.bg_color,
				'background-position': 'center center',
				'background-repeat': 'no-repeat'				
			})

			self.$hitArea = $('<div style="position: absolute; z-index: 1; top: 0px; left: 0px; width: 100%; height: 100%;" ></div>').appendTo($holder);
			
			self.getContainerSize(self.sW, self.sH, $holder, self.w_max, self.h_max);	
								
			if (self.responsive) {
				$(window).bind("orientationchange.sz" + self.id+" resize.sz" + self.id, {self: self}, self.resize);
			}
			var sW = self.sW;
			var sH = self.sH;	

			//Add Image container properties			
			$holder.css({
				'width': sW,
				'height': sH
			});

			//Add border if needed
			if (bord_size > 0) {
				border[0] = $('<div style="position: absolute;	width: ' + bord_size + 'px; height: ' + sH + 'px;	top: 0px; left: 0px; z-index: 3; background-color: ' + self.bord_color + ';"></div>').css('opacity', self.bord_alpha);
				border[1] = $('<div style="position: absolute;	width: ' + bord_size + 'px; height: ' + sH + 'px;	top: 0px; left: ' + (sW - bord_size) + 'px; z-index: 4; background-color: ' + self.bord_color + ';"></div>').css('opacity', self.bord_alpha);
				border[2] = $('<div style="position: absolute;	width: ' + (sW - (bord_size * 2)) + 'px; height: ' + bord_size + 'px; top: 0px; left: ' + bord_size + 'px; z-index: 5; background-color: ' + self.bord_color + '; line-height: 1px;"></div>').css('opacity', self.bord_alpha);
				border[3] = $('<div style="position: absolute;	width: ' + (sW - (bord_size * 2)) + 'px; height: ' + bord_size + 'px; top: ' + (sH - bord_size) + 'px; left: ' + bord_size + 'px; z-index: 6; background-color: ' + self.bord_color + '; line-height: 1px;"></div>').css('opacity', self.bord_alpha);
				$holder.append(border[0], border[1], border[2], border[3]);
			}

			//Get Image maps if exists
			if ($image.attr('usemap') != undefined) {
				self.mapAreas = $("map[name='" + ($image.attr('usemap').split('#').join('')) + "']").children('area');
				self.mapAreas.each(function (i) {					
					var area = $(this);
					area.css('cursor', 'pointer');
					if (self.mouse_drag) {
						area.bind(self.event_down, {self: self}, self.mouseDown);
					}
					if (self.mouse_wheel) {
						area.bind('mousewheel.sz', {self: self}, self.mouseWheel);
					}
					self.map_coordinates.push(area.attr('coords').split(','));
				});
			}	
			
			self.$holder = $holder;
			self.sW = sW;
			self.sH = sH;
		},
		
		getContainerSize: function (sW, sH, $holder, w_max, h_max){
			if (sW === '' || sW === 0) {				
				if (this.image_url == '') {					
					sW = Math.max($holder.parent().width(), 100);
				} else {									
					sW = Math.max($holder.width(), 100);
				}				
				
			} else if (!isNaN(sW) || String(sW).indexOf('px') > -1) {
				sW = this.oW = parseInt(sW);
				if (this.responsive) {
					sW = Math.min($holder.parent().width(), sW);
				}
			} else if (String(sW).indexOf('%') > -1) {
				sW = $holder.parent().width() * (sW.split('%')[0] / 100);			
			} else {
				sW = 100;
			}
			if (w_max !== 0 && w_max !== '') {
				sW = Math.min(sW, w_max);
			}
			if (sH === '' || sH === 0) {
				if (this.image_url == '') {				
					sH = Math.max($holder.parent().height(), 100);
				} else {					
					sH = Math.max($holder.height(), 100);
				}				
			} else if (!isNaN(sH) || String(sH).indexOf('px') > -1) {
				sH = this.oH = parseInt(sH);
		
			} else if (String(sH).indexOf('%') > -1) {
				sH = $holder.parent().height() * (sH.split('%')[0] / 100);				
			} else {
				sH = 100;
			}
			if (h_max !== 0 && h_max !== '') {
				sH = Math.min(sH, h_max);
			}

			if (this.oW && sW !== this.oW) {				
				if (this.oH && this.maintain_ratio) {				
					sH = sW/(this.oW/this.oH);
				}
			}			
			
			this.sW = sW;
			this.sH = sH;
		},
		
		
		/*Each landmark / location / lable initiated here
		***********************************************************************************************************************/
		setLocation: function (lc){
			var self = this,
				ob = lc,
				w2, h2, pos, sc;
			
			if (prop_origin) {
				ob.css(prop_origin, '0 0');
			}
			
			ob.css({
				'display': 'block',
				'z-index': 2					
			})				
			if (self.use3D) {
				ob.css({			
					'-webkit-backface-visibility': 'hidden',
					'-webkit-perspective': 1000
				});
			}
					
			w2 = ob.outerWidth() / 2;
			h2 = ob.outerHeight() / 2;
			pos = ob.data('position').split(',');	
			sc = ob.data('allow-scale');
			if (sc == undefined) {
				sc = self.allow_scale;				
			} else {
				sc = checkBoolean(sc);
			}
			
			if (ob.hasClass('mark')) {
				var imgw = ob.find('img').css('vertical-align', 'bottom').width();
				$(ob.children()[0]).css({
					'position': 'absolute',
					'left': (-ob.width()/2),
					'bottom': parseInt(ob.css('padding-bottom'))*2
				});	
				var txt = ob.find('.text');					
				self.locations.push({
					ob: ob,
					x: parseInt(pos[0]),
					y: parseInt(pos[1]),
					w2: w2,
					h2: h2,
					w2pad: w2+(txt[0] ? parseInt(txt.css('padding-left')) : 0),
					vis: false,
					lab: false,
					lpx: '0',
					lpy: '0',
					showAt: isNaN(ob.data('show-at-zoom'))? self.show_at_zoom : parseInt(ob.data('show-at-zoom'),10) / 100,
					scale: sc
				});				
				
			} else if (ob.hasClass('lable')){
				var bg = ob.data('bg-color'),
					opacity = ob.data('bg-opacity'),						
					cont = $(ob.eq(0).children()[0])
							.css({
							'position': 'absolute',
							'z-index': 2,
							left: -w2, 
							top: -h2
						});		
							
				self.locations.push({
					ob: ob,
					x: parseInt(pos[0]),
					y: parseInt(pos[1]),
					w2: w2,
					h2: h2,
					w2pad: w2,
					vis: false,
					lab: true,
					lpx: '0',
					lpy: '0',
					showAt: isNaN(ob.data('show-at-zoom'))? self.show_at_zoom : parseInt(ob.data('show-at-zoom'),10) / 100,
					scale: sc
				});

				if (bg !=="") {
					if (!bg) {
						bg = "#000000";
						opacity = .7;
					}							
					var bgob = $('<div style="position: absolute; left: ' + (-w2)+'px; top: ' + (-h2)+'px; width: ' + ((w2-parseInt(cont.css('padding-left'))) * 2) + 'px; height:' + ((h2-parseInt(cont.css('padding-top'))) * 2) + 'px; background-color: ' + bg + ';"></div>').appendTo(ob);
					if (opacity) {
						bgob.css('opacity', opacity);
					}
				}
			}
			ob.hide();
			if(prop_transform) {
				ob.css('opacity', 0);
			}	
			if (!self.allow_drag) {
				ob.bind(self.event_down, function (e) {				
					//e.preventDefault();
					e.stopPropagation();					
				})				
			}
		},

		/*Storing the original style of image (needed only when destroying)
		***********************************************************************************************************************/
		getStyle: function () {
			var el = this.$image;
			return {
				prop_origin: [prop_origin, prop_origin !== false && prop_origin !== undefined ? el.css(prop_origin) : null],
				prop_transform: [prop_transform, prop_transform !== false && prop_transform !== undefined ? el.css(prop_transform) : null],
				'position': ['position', el.css('position')],
				'z-index': ['z-index', el.css('z-index')],
				'cursor': ['cursor', el.css('cursor')],
				'left': ['left', el.css('left')],
				'top': ['top', el.css('top')],
				'width': ['width', el.css('width')],
				'height': ['height', el.css('height')]
			};
		},

		/*Find the scale ratios
		***********************************************************************************************************************/
		checkRatio: function (sW, sH, iW, iH, zoom_fit) {
			var rF;
			if (iW == sW && iH == sH) {
				rF = 1;				
			} else if (iW < sW && iH < sH) {
				rF = sW / iW;				
				if (zoom_fit) {
					if (rF * iH > sH) {
						rF = sH / iH;
					}
				} else {
					if (rF * iH < sH) {
						rF = sH / iH;
					}
					if (sW / iW !== sH / iH && this.mouse_drag) {
						this._moveCursor = true;
						this.$image.css('cursor', 'move');
						this.$hitArea.css('cursor', 'move');
					}
				}
			} else {
				
				rF = sW / iW;
				if (zoom_fit) {
					if (rF * iH > sH) {
						rF = sH / iH;
					}
					if (rF< this.init_zoom && this.mouse_drag) {
						this._moveCursor = true;
						this.$image.css('cursor', 'move');
						this.$hitArea.css('cursor', 'move');
					}
				} else {
					if (rF * iH < sH) {
						rF = sH / iH;
					}
					if (sW / iW !== sH / iH && this.mouse_drag) {
						this._moveCursor = true;
						this.$image.css('cursor', 'move');
						this.$hitArea.css('cursor', 'move');
					}
				}
			}
			return rF;
		},
		
		
		/*Returns distance between 2 points (used for touch gesture)
		***********************************************************************************************************************/
		getDistance: function (x1,y1,x2,y2) {
			return Math.sqrt(Math.abs(((x2-x1)*(x2-x1)) + ((y2-y1)*(y2-y1))));
		},
		

		/*Image Events for Dragging and Mouse Wheel
		***********************************************************************************************************************/
		mouseDown: function (e) {
			var self = e.data.self,	
			te = e.originalEvent,
			touches, fingers, pointerMouse;	
			self._onfocus = self._dragging = false;
			
			if (self.cFlag._nd) {				
				self._onHitArea = true;		
				self.samePointRelease = false;				
				if (self.fixMoz) {
					self.correctTransValue();	
				}
				if (e.type == self.pointerDown){						
					pointerMouse = (te.MSPOINTER_TYPE_MOUSE && te.pointerType === te.MSPOINTER_TYPE_MOUSE) || te.pointerType == 'mouse';
					self.pointers.push({pageX: te.pageX, pageY:te.pageY, id: te.pointerId});
					fingers = self.pointers.length;
					touches = self.pointers;
				}				
				if (e.type == 'mousedown' || pointerMouse){	
					self.stX = te.pageX || e.pageX;
					self.stY = te.pageY || e.pageY;		
					self.offX = self.stX - self.$holder.offset().left - self.$image.position().left;
					self.offY = self.stY - self.$holder.offset().top - self.$image.position().top;					
					$(document).bind(self.event_move + self.id, {self: self}, self.mouseDrag);
					
				} else {	
					if (e.type == 'touchstart')	{
						fingers = te.targetTouches.length;
						touches = te.touches;
					}
					if (fingers > 1) {
						self._pinching = true;	
						self._rA = self.rA;				
						self.dStart = self.getDistance(touches[0].pageX, touches[0].pageY, touches[1].pageX, touches[1].pageY);						
					} else {						
						self.offX = touches[fingers-1].pageX - self.$holder.offset().left - self.$image.position().left;
						self.offY = touches[fingers-1].pageY - self.$holder.offset().top - self.$image.position().top;
						self.setDraggedPos(touches[fingers-1].pageX - self.$holder.offset().left - self.offX, touches[fingers-1].pageY - self.$holder.offset().top - self.offY, self._sc);
						self._recent = 'drag';
						self._dragging = true;					
					}							
				}
				
			}
			if (e.type == 'mousedown'  || e.type == self.pointerDown) {
				e.preventDefault();
			}		
		},		
		
		
		/*Mouse Drag / Touch swipe operations handled here
		***********************************************************************************************************************/
		mouseDrag: function (e) {
			var self = e.data.self,
			te = e.originalEvent,
			touches, fingers;
			
			//Mouse
			if (e.type == 'mousemove') {
				self.setDraggedPos(e.pageX - self.$holder.offset().left - self.offX, e.pageY - self.$holder.offset().top - self.offY, self._sc);				
				self._recent = 'drag';
				self._dragging = true;
				if(!self._playing) {
					self.Animate();
				}
				return false;
			
			//Touch and pointer		
			} else {
				if (self._dragging || self._pinching) {	
					e.preventDefault();								
				}				
				if (self._onHitArea) {
					
					//Pointer				
					if (e.type == self.pointerMove){						
						for (var j=0; j<self.pointers.length; j++){
							if (te.pointerId == self.pointers[j].id) {						
								self.pointers[j].pageX = te.pageX;
								self.pointers[j].pageY = te.pageY;
							}
						}	
						touches = self.pointers;
						fingers = self.pointers.length;	
						
					//Touch		
					} else {					
						touches = te.touches;	
						fingers = touches.length;					
					}	
					
					//Multi finger movement / pinch zoom			
					if (fingers > 1) {
						if (!self._pinching) {
							self._pinching = true;
							self._rA = self.rA;								
							self.dStart = self.getDistance(touches[0].pageX, touches[0].pageY, touches[1].pageX, touches[1].pageY);									
						}						
						self._centx = (touches[0].pageX + touches[1].pageX) / 2;
						self._centy = (touches[0].pageY + touches[1].pageY) / 2;
						self.focusOffX = self._centx - self.$holder.offset().left - (self.sW / 2);
						self.focusOffY = self._centy - self.$holder.offset().top - (self.sH / 2);
						self.changeOffset(true, true);
						self._wheel = true;
						self._dragging = false;						
						if (self.zoom_single){													
							self.sRed = 300;																				
						} else {
							self.dEnd = self.getDistance(touches[0].pageX, touches[0].pageY, touches[1].pageX, touches[1].pageY);						
							self.rA = self._rA * (self.dEnd/self.dStart);
							self.rA = self.rA > self.zoom_max ? self.zoom_max : self.rA;
							self.rA = self.rA < self.rF ? self.rF : self.rA;
						}
						if (self._sc < self.rA) {
							self.cFlag._zo = false;
							self.cFlag._zi = true;
						} else {
							self.cFlag._zi = false;
							self.cFlag._zo = true;
						}
						if (!self._playing) {
							self.Animate();
						}
						
					//Single finer / pointer Drag
					} else {							
						self.setDraggedPos(touches[0].pageX - self.$holder.offset().left - self.offX, touches[0].pageY - self.$holder.offset().top - self.offY, self._sc);
						self._recent = 'drag';
						self._dragging = true;
						if(!self._playing) {
							self.Animate();
						}
						return false;
					}
				}
				
			}
		},
		
		
		/*Global Mouse Up / Touch End
		***********************************************************************************************************************/
		mouseUp: function (e) {
			var self = e.data.self;
			self.pointers = [];
			//If one of the buttons released
			if (self._onButton) {
				self.$holder.find('#' + self.buttons[self.cButtId]._var + 'norm').show();
				self.$holder.find('#' + self.buttons[self.cButtId]._var + 'over').hide();
				if (self.cButtId !== 6) {
					self.cFlag[self.buttons[self.cButtId]._var] = false;
				}
				if (e.type == 'touchend' && self.buttons[self.cButtId].$ob.css('opacity') > .5){
					self.buttons[self.cButtId].$ob.css('opacity', .7);
				}
				self._onButton = false;
				e.stopPropagation();
				return false;
				
			//If the mouse drag or touch swipe completed
			} else if (self._onHitArea) {
				if (!self.hasTouch){					
					$(document).unbind(self.event_move + self.id);
				}
				if (self.mouse_drag || self.touch_drag) {
					
					//Mouse					
					if (e.type == 'mouseup') {										
						if (self.stX ==  e.pageX && self.stY == e.pageY) {
							self.samePointRelease = true;
						}				
						self._recent = 'drag';
						self._dragging = false;
						if(!self._playing) {
							self.Animate();
						}
						
					//Touch & Pointers
					} else {
						e.preventDefault();
						self._dragging = false;
						if (self._pinching) {
							self._pinching = false;
							self._wheel = false;
							self.cFlag._nd = true;
							self.cFlag._zi = false;
							self.cFlag._zo = false;
						} else {
							self._recent = 'drag';
							if(!self._playing) {
								self.Animate();
							}
						}			
					}
					self._onHitArea = false;
				}
			}
		},
		
		
		/*Mouse wheel zoom in-out
		***********************************************************************************************************************/
		mouseWheel: function (e, delta) {
			var self = e.data.self;
			self._onfocus = self._dragging = false;
			if (self.mouse_wheel_cur) {
				self.focusOffX = e.pageX - self.$holder.offset().left - (self.sW / 2);
				self.focusOffY = e.pageY - self.$holder.offset().top - (self.sH / 2);
				self.changeOffset(true, true);
			}
			
			self._dragging = false;
			if (delta > 0) {
				if (self.rA != self.zoom_max) {
					if (self.zoom_single){													
						if(!self._wheel) {
							self.sRed = 300;	
						}
					} else {				
						self.rA *= delta < 1 ? 1 + (.3 * delta) : 1.3;
						self.rA = self.rA > self.zoom_max ? self.zoom_max : self.rA;						
					}
					self._wheel = true;
					self.cFlag._zi = true;
					clearTimeout(self.ani_timer);
					self._playing = true;
					self.Animate();
					self.cFlag._zi = false;
				}
			} else {
				if (self.rA != self.rF) {
					if (self.zoom_single){													
						if(!self._wheel) {
							self.sRed = 300;
						}
					} else {	
						self.rA /= delta > -1 ? 1 + (.3 * -delta) : 1.3;
						self.rA = self.rA < self.rF ? self.rF : self.rA;
					}
					self._wheel = true;
					self.cFlag._zo = true;
					clearTimeout(self.ani_timer);
					self._playing = true;
					self.Animate();
					self.cFlag._zo = false;
				}
			}
			return false;
		},
		

		/*Control buttons Auto hide
		***********************************************************************************************************************/
		autoHide: function (e) {
			var self = e.data.self;

			clearTimeout(self.auto_timer);
			self.auto_timer = setTimeout(function () {
				self.$controls.fadeOut(600);
			}, self.bu_delay);

			self.$holder.bind('mouseenter.sz', function (e) {
				clearTimeout(self.auto_timer);
				self.$controls.fadeIn(300);
			});
		},
		

		/*Mozilla works differently than others when getting translated positions. So this correction needed
		***********************************************************************************************************************/
		correctTransValue: function () {
			var v = this.$image.css('-moz-transform').toString().replace(')', '').split(',');
			this.transOffX = parseInt(v[4]);
			this.transOffY = parseInt(v[5]);
		},


		/*Make sure the dragged position obeying limits
		***********************************************************************************************************************/
		setDraggedPos: function (xp, yp, s) {
			var self = this;
			
			if (xp !== '') {
				self.dX = xp + self.transOffX;
				if (self.pan_limit) {
					self.dX = self.dX + (s * self.iW) < self.sW ? self.sW - (s * self.iW) : self.dX;
					self.dX = self.dX > 0 ? 0 : self.dX;
					if ((s * self.iW) < self.sW) {
						self.dX = (self.sW - (s * self.iW)) / 2;
					}
				} else {
					self.dX = self.dX + (s * self.iW) < self.sW / 2 ? (self.sW / 2) - (s * self.iW) : self.dX;
					self.dX = self.dX > self.sW / 2 ? self.sW / 2 : self.dX;
				}
			}
			if (yp !== '') {
				self.dY = yp + self.transOffY;
				if (self.pan_limit) {
					self.dY = self.dY + (s * self.iH) < self.sH ? self.sH - (s * self.iH) : self.dY;
					self.dY = self.dY > 0 ? 0 : self.dY;
					if ((s * self.iH) < self.sH) {
						self.dY = (self.sH - (s * self.iH)) / 2;
					}
				} else {
					self.dY = self.dY + (s * self.iH) < self.sH / 2 ? (self.sH / 2) - (s * self.iH) : self.dY;
					self.dY = self.dY > self.sH / 2 ? self.sH / 2 : self.dY;
				}
			}
		},

		/*Called to animate image transformation whenever the navigation events occur
		***********************************************************************************************************************/
		Animate: function () {

			var self = this;
			var pixTol = .5;

			self.cFlag._nd = true;
			self.ani_end = false;
			
			//Zoom In
			if (self.cFlag._zi) {
				if (!self._wheel && !self.zoom_single) {
					self.rA *= self.zoom_speed;
				}
				if (self.rA > self.zoom_max) {
					self.rA = self.zoom_max;
				}
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'zoomIn';
				self._onfocus = self._dragging = false;
			}

			//Zoom Out
			if (self.cFlag._zo) {
				if (!self._wheel && !self.zoom_single) {
					self.rA /= self.zoom_speed;
				}
				if (self.zoom_min !=0 ) {
					if (self.rA < self.zoom_min) {
						self.rA = self.zoom_min;
					}					
				} else {					
					if (self.rA < self.rF) {
						self.rA = self.rF;
					}
				}
				
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'zoomOut';
				self._onfocus = self._dragging = false;
			}
			
			//Zoom In or Out - Single Step
			if (self.zoom_single && !self.cFlag._rs) {
				if (self._recent == 'zoomIn'){
					self.sRed +=(10-self.sRed)/6;
					self.rA += (self.zoom_max - self.rA)/(((1/(self.pan_speed_o+1))*self.sRed)+1);

				} else if (self._recent == 'zoomOut'){
					self.sRed +=(3-self.sRed)/3;
					self.rA += (self.rF - self.rA)/(((1/self.pan_speed_o+1)*self.sRed)+1);
				}
			}
			
			//Pan speed needs to adjust according to application dimension and zoom level
			self.pan_speed = (Math.max(1, 1+((self.sW + self.sH) / 500))+ (self.pan_speed_o * self.pan_speed_o / 4)) / Math.max(1, self.rA/2);

			//Move Left
			if (self.cFlag._ml) {
				self.oX -= self.pan_speed;
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'left';
				self._onfocus = self._dragging = false;
			}

			//Move Right
			if (self.cFlag._mr) {
				self.oX += self.pan_speed;
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'right';
				self._onfocus = self._dragging = false;
			}

			//Move Up
			if (self.cFlag._mu) {
				self.oY -= self.pan_speed;
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'up';
				self._onfocus = self._dragging = false;
			}

			//Move Down
			if (self.cFlag._md) {
				self.oY += self.pan_speed;
				self.cFlag._nd = false;
				self.cFlag._rs = false;
				self._recent = 'down';
				self._onfocus = self._dragging = false;
			}

			//Reset
			if (self.cFlag._rs) {				
				self.oX += (self.fX - self.oX) / 8;
				self.oY += (self.fY - self.oY) / 8;				
				self.cFlag._nd = false;
				self._recent = 'reset';
				self._onfocus = self._dragging = false;
			}

			//Find scale value, width and height
			//Case 1: Single Step Zoom
			if (self.zoom_single && (self._recent !== 'reset')) {
				if (self._onfocus){
					self._sc += (self.rA - self._sc) / self.reduction;
				} else {
					self._sc = self.rA;
				}
			
			//Case 2: Normal Zoom
			} else {
				self._sc += (self.rA - self._sc) / (self.ani_smooth/(self._onfocus? self.reduction : 1));
			}
			
			self._w = self._sc * self.iW;
			self._h = self._sc * self.iH;

			//Dragging
			if (self._dragging) {
				self.tX = self.dX;
				self.tY = self.dY;
				self.changeOffset(true, true);
			}

			//Check if Zoom In completed
			if (self._recent == "zoomIn") {
				if (self._w > (self.rA * self.iW) - pixTol && !self.zoom_single) {
					if (self.cFlag._nd) {
						self.ani_end = true;
					}
					self._sc = self.rA;					
				} else if (self._w > (self.zoom_max * self.iW) - pixTol && self.zoom_single) {
					if (self.cFlag._nd) {
						self.ani_end = true;
					}
					self._sc = self.rA = self.zoom_max;					
				}
				if (self.ani_end){
					self._w = self._sc * self.iW;
					self._h = self._sc * self.iH;
				}

			//Check if Zoom Out completed
			} else if (self._recent == "zoomOut") {
				if (self._w < (self.rA * self.iW) + pixTol  && !self.zoom_single) {
					if (self.cFlag._nd) {
						self.ani_end = true;
					}
					self._sc = self.rA;					
				} else if (self._w < (self.rF * self.iW) + pixTol  && self.zoom_single) {
					if (self.cFlag._nd) {
						self.ani_end = true;
					}
					self._sc = self.rA = self.rF;					
				}
				if (self.ani_end){
					self._w = self._sc * self.iW;
					self._h = self._sc * self.iH;
				}
			}

			//Move image according to boundary limits
			self.limitX = (((self._w - self.sW) / (self._w / self.sW)) / 2);
			self.limitY = (((self._h - self.sH) / (self._h / self.sH)) / 2);

			if (!self._dragging) {
				if (self.pan_limit) {
					if (self.oX < -self.limitX - self.focusOffX) {
						self.oX = -self.limitX - self.focusOffX;
					}
					if (self.oX > self.limitX - self.focusOffX) {
						self.oX = self.limitX - self.focusOffX;
					}
					if (self._w < self.sW) {
						self.tX = (self.sW - self._w) / 2;
						self.changeOffset(true, false);
					}
					if (self.oY < -self.limitY - self.focusOffY) {
						self.oY = -self.limitY - self.focusOffY;
					}
					if (self.oY > self.limitY - self.focusOffY) {
						self.oY = self.limitY - self.focusOffY;
					}
					if (self._h < self.sH) {
						self.tY = (self.sH - self._h) / 2;
						self.changeOffset(false, true);
					}
				} else {
					if (self.oX < -self.limitX - (self.focusOffX / self._w * self.sW) - ((self.sW / 2) / (self._w / self.sW))) {
						self.oX = -self.limitX - (self.focusOffX / self._w * self.sW) - ((self.sW / 2) / (self._w / self.sW));
					}

					if (self.oX > self.limitX - (self.focusOffX / self._w * self.sW) + ((self.sW / 2) / (self._w / self.sW))) {
						self.oX = self.limitX - (self.focusOffX / self._w * self.sW) + ((self.sW / 2) / (self._w / self.sW));
					}

					if (self.oY < -self.limitY - (self.focusOffY / self._h * self.sH) - (self.sH / (self._h / self.sH * 2))) {
						self.oY = -self.limitY - (self.focusOffY / self._h * self.sH) - (self.sH / (self._h / self.sH * 2));
					}

					if (self.oY > self.limitY - (self.focusOffY / self._h * self.sH) + (self.sH / (self._h / self.sH * 2))) {
						self.oY = self.limitY - (self.focusOffY / self._h * self.sH) + (self.sH / (self._h / self.sH * 2));
					}
				}
			}
			if (!self._dragging && self._recent != "drag") {
				self.tX = ((self.sW - self._w) / 2) + self.focusOffX + (self.oX * (self._w / self.sW));
				self.tY = ((self.sH - self._h) / 2) + self.focusOffY + (self.oY * (self._h / self.sH));							
				if (self.ani_smooth === 1) {
					self.cFlag._nd = true;
					self.ani_end = true;
				}
			}
			if (self._recent == "zoomIn" || self._recent == "zoomOut" || self.cFlag._rs) {				
				self._x = self.tX;
				self._y = self.tY;
			} else {
				self._x += (self.tX - self._x) / (self.ani_smooth/(self._onfocus? self.reduction : 1));
				self._y += (self.tY - self._y) / (self.ani_smooth/(self._onfocus? self.reduction : 1));				
			}
			
			//Check if Left movement completed
			if (self._recent == "left") {
				if (self._x < self.tX + pixTol || self.ani_smooth === 1) {
					self.cFlag._nd ? self.ani_end = true : "";
					self._recent = '';
					self._x = self.tX;
				}

			//Check if Right  movement completed
			} else if (self._recent == "right") {
				if (self._x > self.tX - pixTol || self.ani_smooth === 1) {
					self.cFlag._nd ? self.ani_end = true : "";
					self._recent = '';
					self._x = self.tX;
				}

				//Check if Up movement completed
			} else if (self._recent == "up") {
				if (self._y < self.tY + pixTol || self.ani_smooth === 1) {
					self.cFlag._nd ? self.ani_end = true : "";
					self._recent = '';
					self._y = self.tY;
				}

				//Check if Down movement completed
			} else if (self._recent == "down") {
				if (self._y > self.tY - pixTol || self.ani_smooth === 1) {
					self.cFlag._nd ? self.ani_end = true : "";
					self._recent = '';
					self._y = self.tY;
				}

				//Check if Dragging completed
			} else if (self._recent == "drag") {
				if (self._x + pixTol >= self.tX && self._x - pixTol <= self.tX && self._y + pixTol >= self.tY && self._y - pixTol <= self.tY || self.ani_smooth === 1) {
					if (self._onfocus) {
						self._dragging = false;
					}
					self.cFlag._nd ? self.ani_end = true : "";
					self._recent = '';
					self._x = self.tX;
					self._y = self.tY;
				}
			}

			//Check if Reset completed
			if (self.cFlag._rs && self._w + pixTol >= (self.rA * self.iW) && self._w - pixTol <= (self.rA * self.iW) && self.oX <= self.fX+pixTol && self.oX >= self.fX-pixTol && self.oY <= self.fY+pixTol && self.oY >= self.fY-pixTol) {
				self.ani_end = true;
				self._recent = '';
				self.cFlag._rs = false;
				self.cFlag._nd = true;
				self._x = self.tX;
				self._y = self.tY;
				self._sc = self.rA;
				self._w = self._sc * self.iW;
				self._h = self._sc * self.iH;
	