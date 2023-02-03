jQuery(function () {
    "use strict";

    var $win = $(window), $doc = $(document), $body = $('body'), 
    $navbar = $('.nk-navbar'),
    $navbar_toggle = $('.toggle'), 
    $main_navbar = $('.nk-navbar-menu'),
    _has_fixed = "has-fixed",
    _nav_overlay = "navbar-overlay",
    _menu_open = "menu-open",
    _mobile_menu = "mobile-menu";

    ////////
    function sticky(elem, ofset){
        var _top = $(window).scrollTop();
        if(_top > ofset.top){
            if(!elem.hasClass(_has_fixed)) {
                elem.addClass(_has_fixed);
            }
        } else {
            if(elem.hasClass(_has_fixed)) {
                elem.removeClass(_has_fixed);
            }
        }
    }
    function sticky_navbar(){
        var $is_sticky = $('.is-sticky');
        if ($is_sticky.length > 0 ) {
            var navm = $is_sticky.offset();
            sticky($is_sticky, navm);
            $(window).on('scroll', function(){
                sticky($is_sticky, navm);
            });
        }
    }
    sticky_navbar();

    function onepage_scroll(){
        var _scroll_tigger = '.scrollto';
        $('a'+ _scroll_tigger +'[href*="#"]:not([href="#"])').on("click", function() {
            var _offset = !$navbar.hasClass(_has_fixed) ? $navbar.innerHeight() - 32 : $navbar.innerHeight() - 2;
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var toHash = this.hash, toHashN = (this.hash.slice(1)) ? $('[name=' + this.hash.slice(1) + ']') : false;
                var $toHash = toHash.length ? $(toHash) : toHashN;
                if ($toHash.length) {
                    $navbar_toggle.removeClass('active');
                    $main_navbar.removeClass(_menu_open);
                    $('.' + _nav_overlay).remove();
                    $body.removeClass('noscroll');
                    $('html, body').delay(150).animate({
                        scrollTop: ($toHash.offset().top - _offset)
                    }, 1000); 
                    return false;
                }
            }
        });
    }
    onepage_scroll();

    function menu_spy(){
        var _navbar_id = $main_navbar.attr('id');
        $body.scrollspy({ 
            target: '#' + _navbar_id,
            offset: $navbar.innerHeight(),
        });
    }
    menu_spy();
    
    function navigation_menu(){
        if($navbar_toggle.length > 0 ){
            $navbar_toggle.on('click', function(e){
                var $self = $(this), _self_toggle = ($self.data('menu-toggle'));
                    $self.toggleClass('active');
                    $('#' + _self_toggle).toggleClass(_menu_open);
                    $('#' + _self_toggle).after('<div class=' + _nav_overlay +'></div>');
                    if(!$main_navbar.hasClass(_menu_open)){
                        $('.' + _nav_overlay).remove();
                    }
                    $body.toggleClass('noscroll');
                e.preventDefault();
            });
        }
        
        $doc.on('click', 'body', function(e){
            if (!$navbar_toggle.is(e.target) && $navbar_toggle.has(e.target).length===0 && !$main_navbar.is(e.target) && $main_navbar.has(e.target).length===0 && $win.width() < 992)  {
                $navbar_toggle.removeClass('active');
                $main_navbar.removeClass(_menu_open);
                $('.' + _nav_overlay).remove();
                $body.removeClass('noscroll');
            }
        });

        function mobile_nav(){
            if($win.width() < 992){
                $main_navbar.delay(500).addClass(_mobile_menu);
            }else{
                $main_navbar.delay(500).removeClass(_mobile_menu);
                $main_navbar.removeClass(_menu_open);
            }
        }
        mobile_nav();
        $win.on('resize', function(){
            mobile_nav();
        });
    }
    navigation_menu();
    
    function offCanvas(){
        var $toggle = $('.toggle-offcanvas'), $offcanvas = $('.nk-offcanvas'); 

        if($toggle.length > 0 ){
            $toggle.on('click', function(e){
                var $self = $(this), _self_toggle = ($self.data('offcanvas-toggle'));
                    $self.toggleClass('active');
                    $('#' + _self_toggle).toggleClass('offcanvas-shown');
                    $('#' + _self_toggle).after('<div class="offcanvas-overlay"></div>');
                    if(!$('#' + _self_toggle).hasClass('offcanvas-shown')){
                        $('.offcanvas-overlay').remove();
                    }
                    $body.toggleClass('noscroll');
                e.preventDefault();
            });
        }
        
        $doc.on('click', 'body', function(e){
            if (!$toggle.is(e.target) && $toggle.has(e.target).length===0 && !$offcanvas.is(e.target) && $offcanvas.has(e.target).length===0)  {
                $toggle.removeClass('active');
                $offcanvas.removeClass('offcanvas-shown');
                $('.offcanvas-overlay').remove();
                $body.removeClass('noscroll');
            }
        });
    }
    offCanvas();

    function menu_toggle(){
        var $menu_toggle = $('.nk-menu-toggle');
        if ($menu_toggle.length > 0) {
            $menu_toggle.on("click",function(e){
                var $parent = $(this).parent();
                if ($win.width() < 992) {
                    $parent.children('.nk-menu-dropdown').slideToggle(400);
                    $parent.siblings().children('.nk-menu-dropdown').slideUp(400);
                    $parent.toggleClass('nk-menu-opened');
                    $parent.siblings().removeClass('nk-menu-opened');
                }
                e.preventDefault();
            });
        }
    }
    menu_toggle();

    function form_submit(){
        var $form = $('.nk-form-submit');
        
        if( !$().validate && !$().ajaxSubmit ) {
            console.log('jQuery Form and Form Validate not Defined.');
            return true;
        }
        
        if ($form.length > 0) {
            $form.each(function(){
                var $self = $(this), _result = $self.find('.form-results');
                $self.validate({
                    ignore: [],
                    invalidHandler: function () { _result.slideUp(400); },
                    submitHandler: function(form) {
                    _result.slideUp(400);
                    $(form).ajaxSubmit({
                        target: _result, dataType: 'json',
                        success: function(data) {
                            var type = (data.result==='error') ? 'alert-danger' : 'alert-success';
                            _result.removeClass( 'alert-danger alert-success' ).addClass( 'alert ' + type ).html(data.message).slideDown(400);
                            if (data.result !== 'error') { $(form).clearForm().find('input').removeClass('input-focused'); }
                        }
                    });
                    }
                });
                $self.find('.select').on('change', function() { $(this).valid(); });
            });
        }
    }
    form_submit();

    function video_popup() {
        var $video_popup     = $('.video-popup');
        if ($video_popup.length > 0) {
            $video_popup.each(function(){
                $(this).magnificPopup({
                    type: 'iframe',
                    removalDelay: 160,
                    preloader: true,
                    fixedContentPos: false,
                    callbacks: {
                        beforeOpen: function() {
                            this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                            this.st.mainClass = this.st.el.attr('data-effect');
                        }
                    },
                });
            });
        }
    }
    video_popup();

    function covid_stats_ph() {
        var $covid = $('[data-covid="PH"]'), cov_c = '.covid-stats-cases', cov_d = '.covid-stats-death', cov_r = '.covid-stats-recovered';
        if($covid.length > 0) {
            $covid.each(function(){
                var $this = $(this), covid = $this.data('covid'), $uid = ($this.data('covid-update')) ? $('#'+$this.data('covid-update')) : false;
                if (covid) {
                    $.ajax({
                        url: "https://api.covid19api.com/live/country/Philippines",
                        //https://documenter.getpostman.com/view/10808728/SzS8rjbc
                        //https://covid19api.com/
                        headers: {  
                            'Access-Control-Allow-Origin': '*',
                            'Content-Type': 'application/json' 
                        },
                        success: function(getData){
                                
                            if(getData.length > 0) {                                                           
                               const foundData = getData[getData.length - 1 ] //- latest or today
                               //const foundData = getData[16] //- custom array
                               
                               //get data print console
                               //console.log(foundData);

                                if (foundData.ID != null) {
                                    var $c = $this.find(cov_c), $d = $this.find(cov_d), $r = $this.find(cov_r), $u = $this.find('.covid-update-time');
                                    if(foundData.Active != null) { 
                                        $c.text(Nio.addComma(foundData.Active)); 
                                    }
                                    if(foundData.Deaths != null) { 
                                        $d.text(Nio.addComma(foundData.Deaths));
                                    }
                                    if(foundData.Recovered != null) {      
                                        //console.log(foundData.Recovered)                                    
                                            $r.text(Nio.addComma(foundData.Recovered));                                               
                                    }
                                    if(foundData.Date != null) { 
                                        var dateData = foundData.Date;
                                        var dateDatax = dateData.substring(0, dateData.length - 10);
                                        if($u.length > 0) { 
                                            $u.text(dateDatax); 
                                        } 
                                        else { 
                                            if($uid && $uid.length > 0) { 
                                                $uid.text(dateDatax); } 
                                            }
                                    }

                                    $this.find('.count').rCounter({duration: 30});
                                }
                            }
                        }, 
                        error: function(){
                            console.log('Unable to load data.')
                        }
                    });
                }
            });
        }
    }
    covid_stats_ph();
    
    function covid_stats_ww() {
        var $covid = $('[data-covid="world"]'), cov_c = '.covid-stats-cases', cov_d = '.covid-stats-death', cov_r = '.covid-stats-recovered';
        if($covid.length > 0) {
            $covid.each(function(){
                var $this = $(this), covid = $this.data('covid'), $uid = ($this.data('covid-update')) ? $('#'+$this.data('covid-update')) : false;
                if (covid) {
                    $.ajax({
                        url: "https://api.covid19api.com/summary",
                        //https://documenter.getpostman.com/view/10808728/SzS8rjbc
                        //https://covid19api.com/
                        headers: {  
                            'Access-Control-Allow-Origin': '*',
                            'Content-Type': 'application/json' 
                        },
                        success: function(getData){
                            //console.log(getData.Global)
                            if(getData) {                                                           
                               const foundData = getData.Global //- latest or today
                               //const foundData = getData[16] //- custom array
                               
                               //get data print console
                               //console.log(foundData);
    
                                if (foundData) {
                                    var $c = $this.find(cov_c), $d = $this.find(cov_d), $r = $this.find(cov_r), $u = $this.find('.covid-update-time');
                                    if(foundData.TotalConfirmed != null) { 
                                        $c.text(Nio.addComma(foundData.TotalConfirmed)); 
                                    }
                                    if(foundData.TotalDeaths != null) { 
                                        $d.text(Nio.addComma(foundData.TotalDeaths));
                                    }
                                    if(foundData.TotalRecovered != null) {      
                                        //console.log(foundData.Recovered)                                    
                                            $r.text(Nio.addComma(foundData.TotalRecovered));                                               
                                    }
                                    if(foundData.Date != null) { 
                                        var dateData = foundData.Date;
                                        var dateDatax = dateData.substring(0, dateData.length - 0);
                                        if($u.length > 0) { 
                                            $u.text(dateDatax); 
                                        } 
                                        else { 
                                            if($uid && $uid.length > 0) { 
                                                $uid.text(dateDatax); } 
                                            }
                                    }
    
                                    $this.find('.count').rCounter({duration: 30});
                                }
                            }
                        }, 
                        error: function(){
                            console.log('Unable to load data.')
                        }
                    });
                }
            });
        }
    }
    covid_stats_ww();    
}()); 