const srcWrapperEl = document.querySelector( '#system_requirements_check' );

// check screen resolution if enabled
const checkScreen = () => {
    const screenCheck = srcWrapperEl.dataset.screenCheck;

    if ( screenCheck != '0' ) {

        const screenCardEl = srcWrapperEl.querySelector( '.screen' );
        const screenWidth = window.screen.width;
        const screenHeight = window.screen.height;
        const targetScreen = screenCheck.split( 'x' );
        let result = '';
        
        if ( screenWidth >= targetScreen[0] && screenHeight >= targetScreen[1] ) {

            screenCardEl.classList.add( 'success' );
            result = "<p><span class=\"icon-checkmark big green\"></span> <span class=\"icon-display big\"></span><strong>Screen resolution (" + screenWidth + "&times;" + screenHeight + ") is optimal for viewing.</strong></p><p>Recommended screen resolution is " + targetScreen[0] + "&times;" + targetScreen[1] + " or greater.</p>";
            
        } else {
            
            screenCardEl.classList.add( 'danger' );
            result = "<p><span class=\"icon-danger big red\"></span> <span class=\"icon-display big\"></span><strong>Screen resolution (" + screenWidth + "&times;" + screenHeight + ") is not optimal for viewing.</strong></p><p>Recommended screen resolution is " + targetScreen[0] + "&times;" + targetScreen[1] + " or greater.</p>";
            
        }

        screenCardEl.innerHTML = result;

    }
};

// check JavaScript if enabled
const checkJavaScript = () => {
    const jsCheck = srcWrapperEl.dataset.jsCheck;
    
    if ( jsCheck != '0' ) {
        const jsCardEl = srcWrapperEl.querySelector( '.javascript' );

        jsCardEl.classList.add( 'success' );
        jsCardEl.innerHTML = '<p><span class=\"icon-checkmark big green\"></span><span class=\"icon-javascript big\"></span><strong>JavaScript is enabled!</strong></p>';
    }
};

if ( srcWrapperEl ) {
    checkScreen();
    checkJavaScript();
}