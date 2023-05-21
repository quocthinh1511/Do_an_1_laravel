
<><template>
<!-- Navbar -->         
          
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home" class="nav-link">Home</a>
      </li>
      

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fa fa-search" aria-hidden="true"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm" style="background-color: azure;">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      
      <!-- Logout -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="nav-link dropdown-toggle" style="padding:0">
            <a href="" class="user" style="color: black;text-decoration: none;font-family: 'Times New Roman', Times, serif;display: inline;font-size: 1rem;">{{ users }}</a>
          </i>
        </a>
        <div class="dropdown-menu" style="text-align: center">
          <!-- <a href="#" class="dropdown-item"> -->
            <button class="Logout" type="submit" @click="Logout">Logout</button>
          <!-- </a> -->
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="fa fa-comments-o" aria-hidden="true"></i>
          <span style='--bs-badge-padding-x: 0.2em; --bs-badge-padding-y: 0.01em;' class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>
      
      <!-- fullscreen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fa fa-arrows-alt" aria-hidden="true"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->
</template>

<script> 
      export default{
        data () {
          return {
            users:[]
      }
    },
        methods:{
          read(){
            axios.get('/show_name').then(({data}) =>{
              this.users=data;
            })
          },

          Logout(){
             axios.post('logout').then(window.location.reload());
          }
        },
        mounted(){
          this.read()
        }
      }
</script> </>

