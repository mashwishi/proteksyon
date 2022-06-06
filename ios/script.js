// Detects if device is on iOS 
const isIos = () => {
const userAgent = window.navigator.userAgent.toLowerCase();
return /iphone|ipad|ipod/.test( userAgent );
}

// Detects if device is in standalone mode
const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);

// Checks if should display install popup notification:
if (isIos() && !isInStandaloneMode()) {
    // offer app installation here
    jQuery(document).ready(function($) {
        // auto timer
        setTimeout(function() {
            $('#lab-slide-bottom-popup').modal('show');
        }, 1000); // optional - automatically opens in xxxx milliseconds
        
        $(document).ready(function() {
            $('.lab-slide-up').find('a').attr('data-toggle', 'modalx');
            $('.lab-slide-up').find('a').attr('data-target', '#lab-slide-bottom-popup');
        });
        
        });
}