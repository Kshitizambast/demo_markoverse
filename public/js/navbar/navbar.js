
resizeLogic(); // on load
$(window).resize(resizeLogic); // on window resize


function resizeLogic() {

    var x = $( window ).width();    

    if(x <= 767.98){
         
        // Add search bar here without changing the component display property   
        
        var user = $('.user-links').html();

        $('.sidenavUserPanel').html(user);

        var categoryBrowser = $('.category-chart-dropdown-content').html();

        $('.sidenavCategoryBrowser').html(categoryBrowser);          
        
        $('div.nav-pills a.nav-link').click(function(){
            var tabContent = document.getElementById("v-pills-tabContent");
            tabContent.scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
        });

        var markoverseFeatureBtn = $('.markoverseFeatureBtn').html();

        $('.sidenav-markoverseFeatureBtn').html(markoverseFeatureBtn);

    } else if(x >= 768){

 
    }  
  };

    

    function openNav() {
        
        document.getElementById("mySidenav").style.left = "0px";
        document.getElementById("overlay").style.display= "block";
        $('#mySidenav').addClass("sidenav-shadow");
    }
      
    function closeNav() {
        document.getElementById("mySidenav").style.left = "-330px";
        document.getElementById("overlay").style.display = "none";
        $('#mySidenav').removeClass("sidenav-shadow");
    }


    window.onscroll = function() {myFunction()};

        
        // Get the navbar
        var navbar = document.getElementById("navbar-search");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
        if (window.pageYOffset > sticky) {

            navbar.classList.add("sticky")

            // Add sidenav trigger btn and cart btn here

            var sidebarTrigger = $('.sidebarTrigger').html();

            $('.sticky-sidbarBtn').html(sidebarTrigger);

            $(".sticky-sidbarBtn").addClass("pr-1 ml-2");

            var stickyCart = $('a.nav-link.cart-btn').html();

            $('.sticky-cart').html(stickyCart);

            $(".sticky-cart").addClass("sticky-cart-style");

        } else if (window.pageYOffset <= sticky) {
            navbar.classList.remove("sticky");

            $('.sticky-sidbarBtn').html(" ");

            $(".sticky-sidbarBtn").removeClass("pr-1 ml-2");

            $('.sticky-cart').html(" ");

            $(".sticky-cart").removeClass("sticky-cart-style");
        }
    }


    

    $(".slide_control-btn-right").click(function () {
        var ctrl_id = $(this).attr('id');
        var control = ctrl_id.slice(6);
        var slide_id = control + "_slide";            
        document.getElementById(slide_id).scrollLeft += 100;
    });
    
    $(".slide_control-btn-left").click(function () {
        var ctrl_id = $(this).attr('id');
        var control = ctrl_id.slice(6);
        var slide_id = control + "_slide";            
        document.getElementById(slide_id).scrollLeft -= 100;
    });
