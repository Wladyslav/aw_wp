// if(document.body.classList.contains('dark-m')){
//     window.localStorage.setItem('website_theme','dark-m');
// }else{
//     window.localStorage.setItem('website_theme','default');
// }



document.addEventListener('DOMContentLoaded', function () {
    if (document.readyState === "interactive") {
        // darkmode
        var dark_mode_input=document.getElementById('darkmode');
        var body=document.querySelector('body');
        dark_mode_input.addEventListener( 'change', function() {
            if(this.checked) {
                // Checkbox is checked..
                body.classList.add('dark-m');
                window.localStorage.setItem('website_theme','dark-m');
            } else {
                body.classList.remove('dark-m');
                window.localStorage.setItem('website_theme','default');
            }
        });
        function retrieve_theme(){
            var theme = localStorage.getItem('website_theme');
            if(theme != null){
                document.body.classList.remove('default', 'dark-m'); 
                document.body.classList.add(theme);
                if(theme=="dark-m")  dark_mode_input.checked = true;
            }else{
                // nie ustawiono na stronie więc sprawdzam preferencje przeglądarki
                console.log('nie ustawiono');
                if (window.matchMedia && (window.matchMedia('prefers-color-scheme: dark').matches)||window.matchMedia('prefers-dark-interface').matches) {
                    // dark mode
                    console.log('systemowy czarny');
                    dark_mode_input.checked = true;
                    document.body.classList.add('dark-m');
                    window.localStorage.setItem('website_theme','dark-m');
                }
                if(window.matchMedia) console.log('math');
                // window.matchMedia('(prefers-color-scheme: dark)')
                // .addEventListener('change', event => {
                //     console.log('nie ustawiono 2');
                //     if (event.matches) {
                //         body.classList.add('dark-m');
                //         window.localStorage.setItem('website_theme','dark-m');
                //     } else {
                //     //light mode
                //     }
                // });
            }
        }
        retrieve_theme();
        window.addEventListener("storage",function(){
            retrieve_theme();
        },false);
        //end --- darkmode

        
    }
},false);