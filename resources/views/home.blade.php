@extends('layout.user-master')
@section('content')

<!-- Hero section -->
<section>
  
@if (session('application-success'))
        <div id="success-application" class="bg-sky-800 text-center py-4 lg:px-4">
            <div class="p-2 bg-sky-700 items-center text-sky-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span
                    class="flex text-[1.2rem] rounded-full bg-sky-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
                <span class="font-semibold mr-2 text-left flex-auto text-sm">{{ session('application-success') }}</span>
            </div>
        </div>
    @endif
  <div class="inline">
    <img src="{{ asset('images/dashboard.jpg') }}">
  </div>
</section>

<!-- Benefits section -->
<section id="benefits">
  <div class="font-sans text-2xl sm:text-lg md:text-xl lg:text-2xl text-white font-bold text-center px-10 py-10 bg-gradient-to-b from-sky-400 to-sky-700">
    <h1 class="font-sans mb-2 mt-6">You find it everywhere,</h1>
    <h1 class="font-sans mb-6">but nothing more special than at BCAinsurance</h1>
    <p class="font-sans text-md sm:text-xs md:text-sm font-normal text-center mb-20">At BCAinsurance, you're much more than your job title.
      Here, we embady the values to build a body of people, a home for gig economy, and equitable workplace</p>
    
      <!-- Card slider  -->
    <section>
      <div id="cCarousel">
        <div class="arrow" id="prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="arrow" id="next"><i class="fa-solid fa-chevron-right"></i></div>

        <div id="carousel-vp">
          <div id="cCarousel-inner">
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-book m-6" aria-hidden="true"><a class="font-sans text-base sm:text-xs md:text-sm font-bold ml-4">Learning &
                    Growth</a></i>
                <a class="flex text-md sm:text-xs md:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">You can freely put your
                  fresh
                  thinking into action to create a real impact. We learn and grow together in this adventure.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-magic m-6" aria-hidden="true"><a class="font-sans text-base sm:text-xs md:text-sm font-bold ml-4">Creative
                    Culture</a></i>
                <a class="flex text-md sm:text-xs md:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Here, we continously build
                  human
                  connections, celebrate moments of inspiration, and make an inclusive workplace.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-desktop m-6" aria-hidden="true"><a class="font-sans text-base sm:text-xs md:text-sm font-bold ml-4">Tech for
                    Good</a></i>
                <a class="flex text-md sm:text-xs md:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Not only grow your career,
                  but your
                  work will also help to make a positive impact. Together we can bring our purpose of life.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-level-up m-6" aria-hidden="true"><a class="font-sans text-base sm:text-xs md:text-sm font-bold ml-4">Great
                    Experience</a></i>
                <a class="flex text-md sm:text-xs md:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">
                  Here, you will get interesting work experience. Together we create a pleasant working atmosphere
                  here.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-hourglass-half m-6" aria-hidden="true"><a class="font-sans text-base sm:text-xs md:text-sm font-bold ml-4">Effective Workhour</a></i>
                <a class="flex text-md sm:text-xs md:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Effective working hours
                  allow you to work efficiently. Let's make good use of our time for a job well.</a>
              </div>
            </article>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- Carousel Style -->
<style>
  *,
  ::before,
  ::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: #222;
  }

  #cCarousel {
    position: relative;
    max-width: 900px;
    margin: auto;
  }

  #cCarousel .arrow {
    position: absolute;
    top: 50%;
    display: flex;
    width: 30px;
    height: 30px;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    z-index: 1;
    font-size: 15px;
    color: #ffffff;
    background: #0c4a6e;
    cursor: pointer;
    transition: 0.3s ease;
}

#cCarousel .arrow:hover {
    background: #0ea5e9;
}
  #cCarousel #prev {
    left: 0px;
  }

  #cCarousel #next {
    right: 0px;
  }

  #carousel-vp {
    width: 770px;
    height: 230px;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    margin: auto;
  }

  @media (max-width: 770px) {
    #carousel-vp {
      width: 510px;
    }
  }

  @media (max-width: 510px) {
    #carousel-vp {
      width: 250px;
    }
  }

  #cCarousel #cCarousel-inner {
    display: flex;
    position: absolute;
    transition: 0.3s ease-in-out;
    gap: 10px;
    left: 0px;
  }

  .cCarousel-item {
    width: 250px;
    height: 220px;
    background-color: #ffffff;
    border: 2px solid #38bdf8;
    border-radius: 15px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }
</style>

<!-- Carousel Function -->
<script>
  ev = document.querySelector("#prev");
  const next = document.querySelector("#next");

  let carouselVp = document.querySelector("#carousel-vp");

  let cCarouselInner = document.querySelector("#cCarousel-inner");
  let carouselInnerWidth = cCarouselInner.getBoundingClientRect().width;

  let leftValue = 0;

  // Variable used to set the carousel movement value (card's width + gap)
  const totalMovementSize =
    parseFloat(
      document.querySelector(".cCarousel-item").getBoundingClientRect().width,
      10
    ) +
    parseFloat( 
      window.getComputedStyle(cCarouselInner).getPropertyValue("gap"),
      10
    );

  prev.addEventListener("click", () => {
    if (!leftValue == 0) {
      leftValue -= -totalMovementSize;
      cCarouselInner.style.left = leftValue + "px";
    }
  });

  next.addEventListener("click", () => {
    const carouselVpWidth = carouselVp.getBoundingClientRect().width;
    if (carouselInnerWidth - Math.abs(leftValue) > carouselVpWidth) {
      leftValue -= totalMovementSize;
      cCarouselInner.style.left = leftValue + "px";
    }
  });

  const mediaQuery510 = window.matchMedia("(max-width: 510px)");
  const mediaQuery770 = window.matchMedia("(max-width: 770px)");

  mediaQuery510.addEventListener("change", mediaManagement);
  mediaQuery770.addEventListener("change", mediaManagement);

  let oldViewportWidth = window.innerWidth;

  function mediaManagement() {
    const newViewportWidth = window.innerWidth;

    if (leftValue <= -totalMovementSize && oldViewportWidth < newViewportWidth) {
      leftValue += totalMovementSize;
      cCarouselInner.style.left = leftValue + "px";
      oldViewportWidth = newViewportWidth;
    } else if (
      leftValue <= -totalMovementSize &&
      oldViewportWidth > newViewportWidth
    ) {
      leftValue -= totalMovementSize;
      cCarouselInner.style.left = leftValue + "px";
      oldViewportWidth = newViewportWidth;
    }
  }
</script>

<!-- Recruitment Process Section -->
<section id="process">
  <div class="font-sans text-2xl sm:text-lg md:text-xl lg:text-2xl text-white font-bold text-center px-10 py-10 bg-gradient-to-b from-sky-700 to-sky-400">
    <h1 class="font-sans mb-6 mt-10">Our Recruitment Process</h1>
    <p class="font-sans text-md sm:text-xs md:text-sm font-normal text-center mb-20">We commit to buildin a home that belongs to everyone.
      We tune out ears, mouth, and eyes to dicover your potential.</p>
      
    <!-- Recruitment Step -->
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        * {
          box-sizing: border-box;
        }

        body {
          background-color: #474e5d;
          font-family: Helvetica, sans-serif;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline {
          position: relative;
          max-width: 1000px;
          margin: 0 auto;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
          content: '';
          position: absolute;
          width: 6px;
          background-color: white;
          top: 0;
          bottom: 0;
          left: 50%;
          margin-left: -3px;
        }

        /* Container around content */
        .container {
          padding: 10px 40px;
          position: relative;
          background-color: inherit;
          width: 50%;
        }

        /* The circles on the timeline */
        .container::after {
          content: '';
          position: absolute;
          width: 25px;
          height: 25px;
          right: -12px;
          background-color: white;
          border: 3px solid #075985;
          top: 15px;
          border-radius: 50%;
          z-index: 1;
        }

        /* Place the container to the left */
        .left {
          left: 0;
        }

        /* Place the container to the right */
        .right {
          left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left::before {
          content: " ";
          height: 0;
          position: absolute;
          top: 22px;
          width: 0;
          z-index: 1;
          right: 30px;
          border: medium solid white;
          border-width: 10px 0 10px 10px;
          border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right::before {
          content: " ";
          height: 0;
          position: absolute;
          top: 22px;
          width: 0;
          z-index: 1;
          left: 30px;
          border: medium solid white;
          border-width: 10px 10px 10px 0;
          border-color: transparent white transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
          left: -16px;
        }

        /* The actual content */
        .content {
          padding: 20px 30px;
          background-color: white;
          position: relative;
          border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {

          /* Place the timelime to the left */
          .timeline::after {
            left: 31px;
          }

          /* Full-width containers */
          .container {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
          }

          /* Make sure that all arrows are pointing leftwards */
          .container::before {
            left: 60px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
          }

          /* Make sure all circles are at the same spot */
          .left::after,
          .right::after {
            left: 15px;
          }

          /* Make all right containers behave like the left ones */
          .right {
            left: 0%;
          }
        }
      </style>
    </head>

    <!-- Recruitment Content -->
    <body>
      <div class="timeline text-sky-800">
        <div class="container left">
          <div class="content">
            <i class="fa fa-file-text" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Apply CV & Appl.
                Form</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Applicants send CV and application form on the attached
              website. Make sure your CV and application form are sent in PDF format.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-users" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">HR Interview</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Applicants are expected to have an interview with HR
              (human resources). Make sure you look neat according to the regulations.</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-pencil" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Psikotest</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Then, the applicant will take the psychological test
              given. Complete it carefully.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-user" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">User Interview</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Applicants are expected to have an interview with Head
              User of the position applied for. Make sure you look neat according to the regulations.</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-thumbs-up" aria-hidden="true"><a
                class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold mb-2 ml-4">Offering</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Applicants are given notification that the applicant is
              accepted at our company. Make sure to check messages regularly for further notifications about the next
              step.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-medkit" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Medical
                Check-up</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Newly hired employees will be scheduled for medical
              check-up. Make sure you take care of your health</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-handshake" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Joined</a></i>
            <p class="text-md sm:text-xs md:text-sm font-normal text-slate-500 mt-4">Congratulations, you are accepted into our company! We
              hope you are comfortable working at our company</p>
          </div>
        </div>
      </div>
    </body>
</section>

<!-- Available Jobs Section -->
<section id="jobs">
  <div class="font-sans text-2xl sm:text-lg md:text-xl lg:text-2xl text-sky-800 font-bold text-center px-10 py-10 bg-slate-200">
    <div>
      <h1 class="font-sans mb-4 mt-10">Recently Job Available</h1>
      <p class="font-sans text-md sm:text-xs md:text-sm font-normal text-center mb-20">The following are the jobs available in our company,
        make sure you are wise in choosing the available jobs.</p>
    </div>

    <!-- Search Bar -->
    <div class="ml-20 sm:ml-10 md:ml-12 mr-10 sm:mr-2 md:mr-6 my-10 px-14">
      <div class="relative mb-4 flex w-full flex-wrap items-stretch">
        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
          <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 1 0-14 0 7 7 0 0 0 14 0z" />
          </svg>
        </div>
        <input type="search"
          id="searchInput"
          class="relative m-0 -ml-8 block min-w-0 flex-auto rounded-md border border-2 border-sky-800 bg-transparent bg-clip-padding px-20 py-[0.25rem] text-md font-normal font-sans text-sky-800 leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-sky-600 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
          placeholder="Search position name, e.g. 'marketing, manajement, etc.'" aria-label="Search"
          aria-describedby="button-addon1" oninput="myFunction(this.value)" />
      </div>
    </div>

    <!-- Search Bar Function -->
    <script>
      function myFunction(searchValue) {
        var filter = searchValue.toUpperCase();
        var table = document.getElementById("jobTable");
        var tbodyRows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // Reset to show only the first 5 rows if the search value is empty
        if (filter === '') {
          for (var i = 0; i < tbodyRows.length; i++) {
            if (i < 5) {
              tbodyRows[i].style.display = '';
            } else {
              tbodyRows[i].style.display = 'none';
            }
          }
          // Show the View More button container
          document.getElementById("viewMoreContainer").style.display = "block";
        } else {
          for (var i = 0; i < tbodyRows.length; i++) {
            var found = false;
            // Loop through each cell in the row
            for (var j = 0; j < tbodyRows[i].cells.length; j++) {
              var td = tbodyRows[i].cells[j];
              if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  // If the filter matches any cell, display the row
                  found = true;
                  break;
                }
              }
            }
            // Display or hide the row based on whether it was found
            tbodyRows[i].style.display = found ? "" : "none";
          }
          // Hide the View More button container when searching
          document.getElementById("viewMoreContainer").style.display = "none";
        }
      }
    </script>

    <!-- Job List -->
    <div class="flex justify-center items-center">
      <div class="w-[110rem] place-content-center bg-white border border-gray-200 rounded-[4rem] shadow-lg mb-10">
        <h3 class="flex text-left text-black ml-14 my-14 text-xl sm:text-md md:text-base">All Open Positions</h3>
        <div class="relative overflow-x-auto rounded-md mx-10 my-10">
          <table id="jobTable" class="relative w-full text-sm text-left rtl:text-right text-gray-400 rounded-lg">
            <thead class="text-md text-white uppercase bg-white text-left">
              <tr class="header text-sky-800 text-base sm:text-sm md:text-md">
                <th scope="col" class="px-4 py-6" style="width:45%">Position Name</th>
                <th scope="col" class="py-6" style="width:25%">Department</th>
                <th scope="col" class="py-6" style="width:25%">Branch</th>
                <th scope="col" class="py-6" style="width:5%"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobs as $index => $job)
              <tr class="row text-md sm:text-xs md:text-sm text-sky-800 font-normal {{ $index % 2 <= 0 ? 'bg-slate-100' : 'bg-slate-50' }} text-left hover:bg-slate-200 cursor-pointer">
                <td class="font-bold px-4 py-6">{{$job['position_name']}}</td>
                <td class="py-6">{{ $job->department['department_name'] }}</td>
                <td class="py-6">{{ $job->branch['branch_name'] }}</td>
                <td>
                  <a href="{{ route('job-detail-applicant', $job['id']) }}" class="py-6 hover:text-sky-500">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M7.293 6.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L10.586 11 7.293 7.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <!-- View More Button -->
          <div id="viewMoreContainer" class="font-bold text-lg sm:text-md md:text-base my-10">
            <a id="viewMoreButton" class="hover:text-sky-500 cursor-pointer">View 5 more jobs <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- View 5 Jobs Function -->
    <script>
      // Get all rows except header
      var rows = document.querySelectorAll("#jobTable tbody tr");

      // Hide rows after the fifth row
      for (var i = 5; i < rows.length; i++) {
        rows[i].style.display = "none";
      }

      // Add event listener to "View 5 more Jobs" link
      document.getElementById("viewMoreButton").addEventListener("click", function() {
        // Count how many rows are already displayed
        var displayedRowCount = document.querySelectorAll("#jobTable tbody tr:not([style*='display: none'])").length;

        // Add 5 rows
        for (var i = displayedRowCount; i < displayedRowCount + 5 && i < rows.length; i++) {
          rows[i].style.display = "";
        }

        // Hide the link if all rows are displayed
        if (displayedRowCount + 5 >= rows.length) {
          document.getElementById("viewMoreContainer").style.display = "none";
        }
      });
    </script>
  </div>
</section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the alert element
            var alertElement = document.getElementById('success-application');

            // Hide the alert after 5 seconds
            setTimeout(function() {
                alertElement.classList.add('hidden');
            }, 2000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endsection
