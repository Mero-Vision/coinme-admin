<!DOCTYPE html>
<html lang="en">

<head>
    @include('homeLayouts.header')
    @stack('title')
    <title>Coin Me | Contact Us</title>
    @livewireStyles()


</head>

<body class="home">

    @include('homeLayouts.nav')


    <!-- section -->
      <section class="layout_padding theme_color_bg white_fonts ambess_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text_align_center">
                  <div class="full">
                     <h2>Contact</h2>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end section -->

      <!-- section -->
      <section class="layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="heading_main text_align_center">
                        <h2><span>GET IN TOUCH</span></h2>
                        <p>We Provide High Quality Services</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row margin_top_30">
               <div class="col-md-4">
                  <div class="contact_information">
                     <div class="row">
                        <div class="col-md-12 col-xs-12 adress_cont">
                           <div class="information_bottom text_align_center">
                              <div class="icon_bottom">
                                 <i class="fa fa-road" aria-hidden="true"></i>
                              </div>
                              <div class="info_cont">
                                 <h4>427 Schoen Circles Suite 124</h4>
                                 <p>Melbourne Australia</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 col-xs-12 adress_cont">
                           <div class="information_bottom text_align_center">
                              <div class="icon_bottom">
                                 <i class="fa fa-user" aria-hidden="true"></i>
                              </div>
                              <div class="info_cont">
                                 <h4>0011 234 56789</h4>
                                 <p>Mon-Fri 8:30am-6:30pm</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 col-xs-12 adress_cont">
                           <div class="information_bottom text_align_center">
                              <div class="icon_bottom">
                                 <i class="fa fa-envelope" aria-hidden="true"></i>
                              </div>
                              <div class="info_cont">
                                 <h4><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b3f7d6dedcf3d4ded2dadf9dd0dcde">[email&#160;protected]</a></h4>
                                 <p>24/7 online support</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="contact_form">
                     <div class="form_section">
                        @livewire('contact_us')



                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!-- end section -->


   

    @include('homeLayouts.footer')
    @livewireScripts()
</body>

</html>
