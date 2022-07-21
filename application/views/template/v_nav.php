 <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?=base_url()?>template/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="<?php echo (uri_string() == 'home') ?'active-menu':''?> btn-nav" href="<?=base_url('home')?>"><i class="fa fa-globe"></i> View Map</a>
                    </li>
                    <li>
                        <a class="<?php echo (uri_string() == 'home/marker') ?'active-menu':''?> btn-nav" href="<?=base_url('home/marker')?>"><i class="fa fa-globe"></i> View Marker</a>
                    </li>
                    <li>
                        <a class="<?php echo (uri_string() == 'home/usaha') ?'active-menu':''?> btn-nav" href="<?=base_url('home/usaha')?>"><i class="fa fa-globe"></i> View Usaha</a>
                    </li>
                    <li>
                        <a class="<?php echo (uri_string() == 'home/route') ?'active-menu':''?> btn-nav" href="<?=base_url('home/route')?>"><i class="fa fa-globe"></i> View Route</a>
                    </li>
                    <li>
                        <a class="<?php echo (uri_string() == 'home/coordinate') ?'active-menu':''?> btn-nav" href="<?=base_url('home/coordinate')?>"><i class="fa fa-globe"></i> View Coordinate</a>
                    </li>

                    <li>
                        <a class="<?php echo (uri_string() == 'home/geojson') ?'active-menu':''?> btn-nav" href="<?=base_url('home/geojson')?>"><i class="fa fa-globe"></i> View Jakbar</a>
                    </li>
                  <li>
                        <a class="btn-nav"  href="blank.html"><i class="fa fa-square-o"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

        <script>
            // Get the container element
            var btnContainer = document.getElementById("main-menu");

            // Get all buttons with class="btn" inside the container
            var btns = btnContainer.getElementsByClassName("btn-nav");

            // Loop through the buttons and add the active class to the current/clicked button
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName(" active-menu");
                current[0].className = current[0].className.replace(" active-menu", "");
                this.className += " active-menu";
            });
            }     
        </script>

        <!-- /. NAV SIDE  -->

          <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?= $title?></h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />