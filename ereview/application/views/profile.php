<section id="maincontent" style="background-color:#8bd5fc">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Profile Page</h2>
                  <br/>
                  <p stlye="color:red">
                  <?php echo $error;?>
                  </p>
                </div>
            <div align="center">
              <table>
                <tr>
                  <td width="60%">
                  <?php echo form_open_multipart(base_url().'index.php/accountctl/signingUp');?>
                  <table style="font-size:18px;font-family:sans serif;line-height:40px">
                  <tr>
                    <td>Nama    </td>
                    <td><?php echo $user['nama'];?></td>
                  </tr>
                  <tr>
                    <td>Username </td>
                    <td><?php echo $user['username'];?></td>
                  </tr>
                  <tr>
                    <td>Surel </td>
                    <td><?php echo $user['email'];?></td>
                  </tr>
                  <tr>
                    <td>Peran  </td>
                    <td>
                      <?php foreach($roles as $role)
                          echo $role['nama_grup'] . " "; 
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Profile Picture</td>
                    <td>
                      <label for="photo"><?php echo $user['photo'];?></label>
                    </td>
                  </tr>
                  </table>
                    </form>
                    </td>
                    <td width="30%">
                    <img src="<?php echo base_url(). '/photos/' . $user['photo']?>" width="150">
                    </td>
                </tr>
              </table>
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


