<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <!-- Coustom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Amar Vote</title>

    <style>
      .bg_color {
        background: linear-gradient(to bottom,#0b9444, #0b9444);
        color: #fff;
      }
      .slider_img {
        height: 100vh;
      }




      html {
        scroll-behavior: smooth;
      }

      #section1 {
        height: 100vh;
      }
      #section2 {
        height: 100vh;
      }
      #section3 {
        height: 100vh;
      }
      #section4 {
        height: 100vh;
        background: gray;
      }

.logo_box {
  background: #fff;
  width: 300px;
  height: 80px;
  border-radius: 10px;
  margin-top: 25px;
  box-shadow: 4px 4px #ed1c24;

}

.logo_size {
  width:90%;
  margin-left: 8px;
}

.speakUpbd {
  font-weight: 800;
  font-size: 40px;
  padding-top: 40px;
  color: #000;
  text-shadow: 1px 1px #fbfbfb;
}

.cover_text {
  font-size: 20px;
  color: #fafafaf
}

.form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #fff;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.form-control:focus{
  background: #ced4da;
}

.input-group>.custom-select:not(:first-child), .input-group>.form-control:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    color: #0b9444;
}

.fa, .fas {
    font-weight: 900;
    color: #ed1c24;
}


    </style>

  </head>
  <body>

    <div class="container-fluid">


    <!--  Part 3  -->
    <div id="section3" class="row bg_color">
      <div class="col-md-5 mx-auto text-left">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="logo_box mx-auto">
              <img class="logo_size" src="img/logo.png">
            </div>
          </div>
        </div>
        
        <h1 class="text-center speakUpbd mb-5 pt-0">Your Opinion is Important</h1>
      <form>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Full Name">
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-comments"></i></span>
          </div>
          <textarea type="text" rows="3" class="form-control" placeholder="Your Idea"></textarea>
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Location">
        </div>
        
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example 2</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
  
  

        <div class="form-group">
          <input type="submit" value="Next" class="btn btn-outline-light pl-5 pr-5 float-right login_btn">
        </div>
      </form>

        <a href="#section4" type="button" class="btn btn-light mt-5 mb-0"><i class="fas fa-arrow-circle-down"></i></a>

      </div>

      <div class="col-md-7 mx-auto text-center pl-0">
        <img class="d-block w-100 slider_img" src="img/bg_img.jpg" alt="Second slide">
      </div>
    </div>

      
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>