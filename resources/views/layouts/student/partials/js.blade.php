 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <!-- Chart JS CDN -->

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 {{-- Sweet Alert --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 {{-- Student js --}}

 <script src="{{ asset('student/js/student.js') }}"></script>

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const offcanvasTrigger = document.getElementById("offcanvasTrigger");
         const offcanvasElement = document.getElementById("offcanvasExample");

         offcanvasTrigger.addEventListener("click", function(event) {
             if (window.innerWidth >= 768) {
                 event.preventDefault();
                 // You can add other functionality for desktop view here
                 console.log("Offcanvas is disabled on desktop view.");
             } else {
                 // Allow the default behavior (open the offcanvas) on mobile view
                 const bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
                 bsOffcanvas.show();
             }
         });
     });
 </script>
