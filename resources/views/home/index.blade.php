<!DOCTYPE html>
<html lang="en">
   <head>

    @include('home.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="theme/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->

      {{-- header --}}
      <header>
        @include('home.header')
      </header>
      {{-- header end --}}

      <!-- banner -->
      @include('home.slider')
      <!-- end banner -->
      <!-- about -->
      @include('home.about')
      <!-- end about -->
      <!-- our_room -->
      @include('home.rooms')
      <!-- end our_room -->
      <!-- gallery -->
      @include('home.gallery')
      <!-- end gallery -->
      <!-- blog -->
      @include('home.blog')
      <!-- end blog -->
      <!--  contact -->
      @include('home.contact')
      <!-- end contact -->
      <!--  footer -->
      <footer>
        @include('home.footer')
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      @include('home.js')
   </body>
</html>
