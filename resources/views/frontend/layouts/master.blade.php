 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
     <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
     <meta name="author" content="ashishmaraviya">
     <title>@yield('title')</title>
     @include('frontend.layouts.inc.style')
 </head>

 <body class="body-bg-6">
     <!-- Loader -->
     @include('frontend.layouts.inc.loader')
     <!-- Header -->
     @include('frontend.layouts.inc.header')

     <!-- Mobile menu -->
     @include('frontend.layouts.inc.mobile_menu')

     @yield('content')
     <!-- Footer -->
     @include('frontend.layouts.inc.footer')

     <!-- Tab to top -->
     <a href="#Top" class="back-to-top result-placeholder">
         <i class="ri-arrow-up-line"></i>
         <div class="back-to-top-wrap">
             <svg viewBox="-1 -1 102 102">
                 <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
             </svg>
         </div>
     </a>

     @include('frontend.layouts.inc.modal')
     @include('frontend.layouts.inc.script')
 </body>

 </html>
