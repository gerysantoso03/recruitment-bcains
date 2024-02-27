@extends('layout.user-master')
@section('content')
<!-- Hero section -->
<section>
  <div class="inline">
    <img src="{{ asset('images/dashboard.jpg') }}">
  </div>
</section>
<!-- Available position section -->
<section id="jobs">
  <div class="font-sans text-2xl sm:text-lg md:text-xl lg:text-2xl text-sky-800 font-bold text-center px-10 py-10 bg-slate-200">
    <div>
      <h1 class="font-sans mb-6 mt-2">Recently Job Available</h1>
      <p class="font-sans text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mb-10">The following are the jobs available in our company,
        make sure you are wise in choosing the available jobs.</p>
    </div>
    <div class="flex justify-around grid grid-cols-3 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-14 sm:gap-x-8 md:gap-x-10 gap-y-8 sm:gap-y-4">
      <div class="max-w-sm p-6 bg-white rounded-lg border border-sky-800">
        <h2 class="mb-2 text-xl sm:text-base md:text-lg lg:text-xl font-bold tracking-tight text-sky-800">Business Analayst</h2>
        <p class="mb-4 ml-2 mr-2 mt-2 text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500">"Job description : Lorem ipsum dolor sit amet,
          consectetur adipiscing elit. Proin eu accumsan ipsum, quis malesuada enim. Fusce id blandit neque. In molestie
          dictum mauris aliquet molestie."</p>
        <a href="#"
          class="inline-flex items-center px-3 py-2 text-sm sm:text-[10px] md:text-xs lg:text-sm font-medium text-center text-white bg-sky-800 rounded-lg hover:bg-sky-500">
          Apply
        </a>
      </div>
      <div class="max-w-sm p-6 bg-white rounded-lg border border-sky-800">
        <h2 class="mb-2 text-xl sm:text-base md:text-lg lg:text-xl font-bold tracking-tight text-sky-800">Web Developer</h2>
        <p class="mb-4 ml-2 mr-2 mt-2 text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500">"Job description : Lorem ipsum dolor sit amet,
          consectetur adipiscing elit. Proin eu accumsan ipsum, quis malesuada enim. Fusce id blandit neque. In molestie
          dictum mauris aliquet molestie."</p>
        <a href="#"
          class="inline-flex items-center px-3 py-2 text-sm text-sm sm:text-[10px] md:text-xs lg:text-sm font-medium text-center text-white bg-sky-800 rounded-lg hover:bg-sky-500">
          Apply
        </a>
      </div>
      <div class="max-w-sm p-6 bg-white rounded-lg border border-sky-800">
        <h2 class="mb-2 text-xl sm:text-base md:text-lg lg:text-xl font-bold tracking-tight text-sky-800">Accounting Staff</h2>
        <p class="mb-4 ml-2 mr-2 mt-2 text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500">"Job description : Lorem ipsum dolor sit amet,
          consectetur adipiscing elit. Proin eu accumsan ipsum, quis malesuada enim. Fusce id blandit neque. In molestie
          dictum mauris aliquet molestie."</p>
        <a href="#"
          class="inline-flex items-center px-3 py-2 text-sm sm:text-[10px] md:text-xs lg:text-sm font-medium text-center text-white bg-sky-800 rounded-lg hover:bg-sky-500">
          Apply
        </a>
      </div>
    </div>
  </section>
<!-- Advantages section -->
<section id="benefits">
  <div class="font-sans text-2xl text-2xl sm:text-lg md:text-xl lg:text-2xl text-white font-bold text-center px-10 py-10 bg-gradient-to-b from-sky-400 to-sky-700">
    <h1 class="font-sans mb-1 mt-2">You find it everywhere,</h1>
    <h1 class="font-sans mb-5">but nothing more special than at BCAinsurance</h1>
    <p class="font-sans text-base sm:text-xs md:text-sm lg:text-base font-normal text-center mb-10">At BCAinsurance, you're much more than your job title.
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
                <i class="fa fa-book m-6" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-2">Learning &
                    Growth</a></i>
                <a class="flex text-sm sm:text-[10px] md:text-xs lg:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">You can freely put your
                  fresh
                  thinking into action to create a real impact. We learn and grow together in this adventure.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-magic m-6" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-2">Creative
                    Culture</a></i>
                <a class="flex text-sm sm:text-[10px] md:text-xs lg:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Here, we continously build
                  human
                  connections, celebrate moments of inspiration, and make an inclusive workplace for you.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-desktop m-6" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-2">Tech for
                    Good</a></i>
                <a class="flex text-sm sm:text-[10px] md:text-xs lg:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Not only grow your career,
                  but your
                  work will also help to make a positive impact. Together we can bring our purpose of life.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-level-up m-6" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-2">Great
                    Experience</a></i>
                <a class="flex text-sm sm:text-[10px] md:text-xs lg:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">
                  Here, you will get interesting work experience. Together we create a pleasant working atmosphere
                  here.</a>
              </div>
            </article>
            <article class="cCarousel-item">
              <div class="text-sky-800 text-center">
                <i class="fa fa-hourglass-half m-6" aria-hidden="true"><a
                    class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-2">Effective Workhour</a></i>
                <a class="flex text-sm sm:text-[10px] md:text-xs lg:text-sm text-left font-normal text-slate-500 ml-8 mr-8 mb-6">Effective working hours
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
    height: 280px;
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

<!-- Recruitment process section -->
<section id="process">
  <div class="font-sans text-2xl sm:text-lg md:text-xl lg:text-2xl text-white font-bold text-center px-10 py-10 bg-gradient-to-b from-sky-700 to-sky-400">
    <h1 class="font-sans mb-5 mt-2">Our Recruitment Process</h1>
    <p class="font-sans text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-center mb-20">We commit to buildin a home that belongs to everyone.
      We tune out ears, mouth, and eyes to dicover your potential.</p>
      
    <!-- Recruitment step -->
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
          border: 4px solid #075985;
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

    <body>
      <div class="timeline text-sky-800">
        <div class="container left">
          <div class="content">
            <i class="fa fa-file-text" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Apply CV & Appl.
                Form</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Applicants send CV and application form on the attached
              website. Make sure your CV and application form are sent in PDF format.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-users" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">HR Interview</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Applicants are expected to have an interview with HR
              (human resources). Make sure you look neat according to the regulations.</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-pencil" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Psikotest</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Then, the applicant will take the psychological test
              given. Complete it carefully.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-user" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">User Interview</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Applicants are expected to have an interview with Head
              User of the position applied for. Make sure you look neat according to the regulations.</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-thumbs-up" aria-hidden="true"><a
                class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold mb-2 ml-4">Offering</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Applicants are given notification that the applicant is
              accepted at our company. Make sure to check messages regularly for further notifications about the next
              step.</p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <i class="fa fa-medkit" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Medical
                Check-up</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Newly hired employees will be scheduled for medical
              check-up. Make sure you take care of your health</p>
          </div>
        </div>
        <div class="container left">
          <div class="content">
            <i class="fa fa-handshake" aria-hidden="true"><a class="font-sans text-lg sm:text-sm md:text-base lg:text-lg font-bold ml-4">Joined</a></i>
            <p class="text-sm sm:text-[10px] md:text-xs lg:text-sm font-normal text-slate-500 mt-4">Congratulations, you are accepted into our company! We
              hope you are comfortable working at our company</p>
          </div>
        </div>
      </div>
    </body>
</section>
@endsection