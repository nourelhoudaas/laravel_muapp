<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/lib/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/main/user/user.js')}}"></script>
<script src="{{ asset('assets/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>
<script>
   const hamBurger = document.querySelector(".toggle-btn");
   hamBurger.addEventListener("click", function () {
   document.querySelector("#sidebar").classList.toggle("expand");
   });
</script>
