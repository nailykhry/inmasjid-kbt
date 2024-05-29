<style>
  footer .inner-content {
      border-top: 1px solid #eee;
      margin-top: 50px;
      padding-top: 10px;
      color: black;
  }

  /* Checkout */
  .bg-blue-white-gradient {
      /* margin-bottom: 150px; */
      background: linear-gradient(to bottom, #0e73b9, white);
  }

  .bg-white-blue-gradient {
      /* margin-bottom: 150px; */
      background: linear-gradient(to bottom, white, #0e73b9);
  }

  .list-group-item {
    padding: 5px 0 !important;
    border: none !important;
    background: none !important;
  }

  .list-group-item a {
    text-decoration: none !important;
    color: #000 !important;
  }

  .container-footer {
    margin-top: 120px;
    margin-bottom: 160px;
  }
</style>

{{-- <footer class="container px-5 mt-5">
    <div class="d-flex justify-content-between flex-column flex-lg-row px-5">
      <div class="text-lg-start text-center">
        <h3 style="font-weight:bold">MySpareLog</h3>
        <div style="font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 16px;">
          <h6>Jl. Perak Timur No. 610, Perak Utara</h6>          
          <h6>Surabaya, Jawa Timur</h6>
          <h6>60165</h6>
          <h6 class="my-3">(031) 3298631</h6>
        </div>
      </div>
      <div class="text-lg-start text-center">
        <div class="fs-3 fw-bold">
          <p>Connect with us</p>
          <a href="https://facebook.com/"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://twitter.com/"><i class="fa-brands fa-square-x-twitter"></i></a>
          <a href="https://mail.google.com/"><i class="fa-solid fa-square-envelope"></i></a>
          <a href="https://instagram.com/"><i class="fa-brands fa-square-instagram"></i></a>
        </div>
      </div>
    </div>
    
    <div class="fs-6 text-center py-3 fw-bold">
      2023 MySpareLog. All rights reverved
    </div>
  
</footer> --}}

<footer class="container">
  <div class="container-footer">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h5 class="mb-4">COMPANY</h5>
        <div class="row">
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="#">About us</a></li>
              <li class="list-group-item"><a href="#">Partner program</a></li>
              <li class="list-group-item"><a href="#">Contact us</a></li>
              <li class="list-group-item"><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="#">Pricing</a></li>
              <li class="list-group-item"><a href="#">Reviews</a></li>
              <li class="list-group-item"><a href="#">Direct Mail</a></li>
              <li class="list-group-item"><a href="#">Terms & conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="mb-4">CONTACT</h5>
        <div class="row">
          <div class="col-md-12">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="#"><img src="{{ asset('assets/images/email.png') }}" alt="Email">&nbsp;support@inmasjid.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fs-6 text-center py-3">
    © 2024 inMasjid. All rights reserved.
  </div>
</footer>