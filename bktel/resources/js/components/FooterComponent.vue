<template>
    <!-- Footer -->
    <mdb-footer style='background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHfhBU8PPHr50EMutAn2gBf0j4EqV3MfyaSQ&usqp=CAU);
     background-repeat: no-repeat; background-position: center; margin-top: 0px !important ;margin-bottom: -25px !important; clear:both' class="font-small pt-4 mt-4">
      <mdb-container class="text-left">
        <mdb-row>
          <mdb-col sm="6">
            <h5 class="title">BK Learning</h5>
            <p>Khoa Điện - Điện Tử</p>
          </mdb-col>
          <mdb-col sm="6">
            <h5 class="title">Địa chỉ</h5>
            <ul>
              <li class="list-unstyled"><a href="#!">268 Lí Thường Kiệt</a></li>
              <li class="list-unstyled"><a href="#!">Quận 10</a></li>

            </ul>
          </mdb-col>
        </mdb-row>
          <mdb-col sm="6">
            <h5 class="title">Contact</h5>
            <ul>
              <li class="list-unstyled"><a href="#!">Facebook</a></li>
              <li class="list-unstyled"><a href="#!">Zalo</a></li>
              <li class="list-unstyled"><a href="#!">Instagram</a></li>
              <li class="list-unstyled"><a href="#!">Likelink</a></li>
            </ul>
          </mdb-col>
        </mdb-row>
      </mdb-container>
      <div class="footer-copyright text-center py-3">
        <mdb-container fluid>
          &copy; 2020 Copyright: <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>
        </mdb-container>
      </div>
    </mdb-footer>
    <!-- Footer -->
  </template>
  <script>

  import {
    mdbFooter,
    mdbContainer,
    mdbRow,
    mdbCol
  } from 'mdbvue';
  
  export default {
    name: 'FooterPage',
    components: {
      mdbFooter,
      mdbContainer,
      mdbRow,
      mdbCol
    }
  }
</script>