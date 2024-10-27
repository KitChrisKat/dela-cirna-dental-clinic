<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dela Cirna Dental Clinic: Record Management System with Community Forum</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>

<!--navbar-->
<body class="antialiased bg-white ">
 <main class="w-full">
   <header class="bg-white border-gray-200 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="http://127.0.0.1:8000" class="flex items-center space-x-3">
        <img src="{{ asset('images/logoname1.png') }}" class="h-8" alt="DelaCirna logo" />
      </a>
                @if (Auth::check())
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @if(Auth::user()->usertype == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin Dashboard</a>
                        @elseif(Auth::user()->usertype == 'patient')
                            <a href="{{ route('patient.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Patient Dashboard</a>
                        @elseif(Auth::user()->usertype == 'dentistrystudent')
                            <a href="{{ route('dentistrystudent.communityforum') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dentistry Student Dashboard</a>
                        @endif
                    </div>
                @else
              
                    <ul class="flex space-x-5">
                      <li>
                        <a href="{{ route('login') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Log in</a>
                      </li>
                      <li>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Register</a>
                        @endif
                      </li>
                    </lu>
                
                @endif
      </div>
   </header>

<!--hero-->
   <section class="bg-cover  relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex items-center"" style="background-image: url('images/background1.png')" >  
                <div class="container bg-fixed grid grid-cols-1 md:grid-cols-2 gap-6 w-full mx-6">
                        <div>
                            <h1 class="text-4x1 font-bold leading-tight text-4xl md:text-4xl xl:text-6xl mb-3">WELCOME TO THE COMMUNITY FORUM!</h1>
                             <p class="text-base mb-5">Join our vibrant community of dental enthusiasts, professionals, and patients! Share your experiences, ask questions, and discover tips for maintaining a healthy smile. Whether you're looking for expert advice or personal stories, you'll find a supportive space here.</p>
                             <button  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Explore Now</button>
                        </div>
                        <div class="bg-white rounded-lg p-2 shadow-lg z-10">
                            <div style="background-color: #4b9cd3; box-shadow: 0 2px 4px rgba(0,0,0,0.4);" class="py-4 px-6 flex justify-between items-center text-white text-2xl font-semibold rounded-lg mb-5">
                                 <h4><i class="fa-regular fa-comments"></i> Community Forum</h4>
                            </div>    
                        @foreach ($communityforums as $communityforum)
                                <div class="bg-white rounded-lg p-4 mb-5 shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <div>
                                             <span class="text-blue-800 font-bold">{{ $communityforum->user->name }}</span>
                                             <span class="text-gray-500">{{ $communityforum->created_at->setTimezone('Asia/Manila')->format('F d, Y h:i A') }}</span>      
                                        </div>
                                    </div>
                                    <div class="mt-2 text-sm leading-relaxed">
                                        <p>{{ $communityforum->topic }}</p>
                                    </div>
                                </div>
                                @endforeach
                                {{ $communityforums->links() }}
                        </div>
                </div>
     </section>
<!---->
  <section class="bg-cover relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-11" style="background-image: url('images/background2.png')">
   <div class="flex flex-col md:flex-row lg:-mx-8">
       <div class="w-full lg:w-1/2 lg:px-8">
        <img class="" src="{{ asset('images/people.png')}}">
       </div>
        <div class="w-full lg:w-1/2 lg:p-14">
          <h6 class="text-sm uppercase font-semibold tracking-widest">Purpose of this Project</h6>
          <h2 class="text-3xl leading-tight font-bold mt-4">About Us</h2>
          <p class="mt-2 leading-relaxed">We created this website to provide a supportive space where patients, 
            students and dental professionals can connect, share experiences, and access valuable insights on oral health. 
            Dental care can be intimidating and confusing, so our goal is to simplify it by building a community where patients can ask questions, 
            share their stories, and get advice from experts. For professionals, it's a platform to exchange ideas, discuss industry advancements, 
            and collaborate on cases. Ultimately, we aim to bridge the gap between dental knowledge and practice, 
            empowering everyone to take charge of their dental health with confidence.</p>
        </div>
      </div>
  </section>

<!--Treatments-->
 <div class="bg-cover relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-12" style="background-image: url('images/background3.png')">
        <h1 class="text-center font-bold text-4xl">TREATMENTS</h1>
        <p class="mt-2 leading-relaxed text-center mx-4">We use only the best quality materials on the market in order to provide the best products to our patients.</p>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 mx-4">
  <!-- First row: 3 Cards -->
  <div class="bg-white shadow-lg rounded-xl p-6 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
    <img src="{{ asset('images/picture1.jpg')}}" alt="Card Image" class="rounded-t-xl mb-4 w-full object-cover h-48">
    <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Dentures</h2>
    <p class="text-gray-600 mb-4 text-center">Dental appliances designed to replace missing teeth and restore both functionality and aesthetics to the mouth.</p>
  </div>

  <div class="bg-white shadow-lg rounded-xl p-6 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
    <img src="{{ asset('images/picture2.jpg')}}" alt="Card Image" class="rounded-t-xl mb-4 w-full object-cover h-48">
    <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Crown and Bridges</h2>
    <p class="text-gray-600 mb-4 text-center">Crowns restore damaged teeth, while bridges replace missing teeth by anchoring to adjacent healthy teeth.</p>
  </div>

  <div class="bg-white shadow-lg rounded-xl p-6 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
    <img src="{{ asset('images/picture3.jpg')}}" alt="Card Image" class="rounded-t-xl mb-4 w-full object-cover h-48">
    <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Oral Prophylaxis</h2>
    <p class="text-gray-600 mb-4 text-center">Cleaning of teeth and gums by a dental professional, is essential for preventing cavities, gum disease, and maintaining overall oral hygiene.</p>
  </div>
  </div>
  <!-- Second row: 2 Cards in 2 Columns Centered -->
  <div class="max-w-4xl mx-auto gap-6 pb-8">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 mx-4">
    <div class="bg-white shadow-lg rounded-xl p-6 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
      <img class="w-full h-48 object-cover rounded-t-lg mb-4" src="{{ asset('images/picture4.jpg')}}" alt="Placeholder Image">
      <div class="p-4">
        <h2 class="text-xl font-bold mb-2 text-center">Aesthetic Restoration</h2>
        <p class="text-gray-600 text-center">improves the appearance of teeth through procedures like veneers, bonding, and whitening, achieving a natural and attractive smile.</p>
      </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-xl p-6 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
      <img class="w-full h-48 object-cover rounded-t-lg mb-4" src="{{ asset('images/picture5.jpg')}}" alt="Placeholder Image">
      <div class="p-4">
        <h2 class="text-xl font-bold mb-2 text-center">Tooth Restoration</h2>
        <p class="text-gray-600 text-center">dental procedures, such as fillings aimed at repairing damaged teeth to restore their function, appearance, and overall oral health.</p>
      </div>
    </div>
  </div>
  </div>
  </div>

  <!--footer -->

  <footer class="relative bg-gray-700 text-white px-4 sm:px-10 lg:px-16 xl:px-20 2xl:px-40 py-12 lg:py-16">
      <div class="flex flex-col md:flex-row">
        <div class="w-full lg:w-2/6 lg:mx-4 lg:pr-8 mt-5 ">
          <h3 class="font-bold text-2xl">Dela Cirna Dental Clinic</h3>
          <p class="text-gray-400">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy.</p>
        </div>

        <div class="w-full lg:w-2/6 lg:mx-4 lg:pr-8 mt-5">
          <h5 class="uppercase tracking-wider font-semibold text-2xl">Contact Details</h5>
          <ul class="mt-4">
            <li>
              <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                    <path d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                  </svg>
                </span>
                <span class="ml-3">
                  Old National Road, Mulawin, Orani, Bataan
                </span>
              </a>
            </li>
            
            <li class="mt-4">
              <a  title="" class="flex items-center opacity-75 hover:opacity-100 divider">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                      d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                  </svg>
                </span>
                <span class="ml-3">
                  (0948) 659 3662
                </span>
              </a>
            </li>
            <li class="mt-4">
              <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                      d="M20,4H4C2.896,4,2,4.896,2,6v12c0,1.104,0.896,2,2,2h16c1.104,0,2-0.896,2-2V6C22,4.896,21.104,4,20,4z M20,8.7l-8,5.334 L4,8.7V6.297l8,5.333l8-5.333V8.7z" />
                  </svg>
                </span>
                <span class="ml-3">
                  dentalpro@example.com
                </span>
              </a>
            </li>
          </ul>
        </div>

        <div class="w-full lg:w-2/6 lg:mx-4 lg:pr-8 mt-5">
          <h5 class="uppercase tracking-wider font-semibold text-2xl">Opening Hours</h5>
         
              <a title="" class=" flex items-center opacity-75 hover:opacity-100">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                      d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
                    <path d="M13 7L11 7 11 13 17 13 17 11 13 11z" /></svg>
                </span>
                <span class="ml-3">
                   Monday - Saturday:<br>
                   Morning: 8:00 AM- 12:00PM<br>
                   Afternoon: 3:00PM - 8:00PM<br>
                  Closed on Sundays<br>
                </span>
              </a>
            
          <p class="text-sm text-gray-400 mt-3">© 2024 Dela Cirna Dental Clinic. <br class="hidden lg:block">All Rights Reserved.
          </p>
        </div>
      </div>

        </footer>
    <!-- Footer -->
 </main>
</body>
</html>