<section id="maincontent" style="background-color:#8bd5fc">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                <hr>
                <hr>
                  <h2>Sign Up Success!</h2>
                  <br/>
                  <p>
                    Login to continue!
                  </p>
                </div>
                <div align="center">
                <form action="<?php echo base_url().'index.php/accountctl/checkingLogin';?>" method="post">
                  <table>
                    <tr>
                    <td>username</td>
                    <td><input type="text" id="username" name="username" width="100"></td>
                    </tr>
                     <tr>
                <td>password</td>
                <td><input type="text" id="password" name="password" width="100"></td>
                 </tr>
           
                 </table>
                	<input type="submit" value="Log In">
                </form>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>
      
    </div>
  </section>
