<section id="maincontent" style="background-color:#8bd5fc">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Create Account in Ereview</h2>
                  <br/>
                  <p stlye="color:red">
                  <?php echo $error;?>
                  </p>
                </div>
                <p>
                  <strong>Please fill with your account details! Field with <span style="color : red">*</span> is mandatory</strong>
                </p>
            <div align="center">
            <?php echo form_open_multipart(base_url().'index.php/accountctl/signingUp');?>
          <table>
            <tr>
                <td>Nama :</td>
                <td><input type="text" id="nama" name="nama" width="100" placeholder="Nama*"></td>
            </tr>
            <tr>
                <td>Username :</td>
                <td><input type="text" id="username" name="username" width="100" placeholder="Username*"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" id="katasandi" name="katasandi" width="100" placeholder="Password*"></td>
            </tr>
            <tr>
                <td>Surel :</td>
                <td><input type="text" id="email" name="email" width="100" placeholder="Surel*" ></td>
            </tr>
            <tr>
                <td>Peran  :</td>
                <td>
                    <input type="checkbox" id="editor" value="1" name="roles[]" checked >Editor<br>
                    <input type="checkbox" id="reviewer" value="2" name="roles[]">reviewer
                </td>
            </tr>
            <tr>
                <td>Profile Picture*  :</td>
                <td>
                    <input type="file" id="userfile" name="userfile" width="20">
                </td>
            </tr>
        </table>
	
	<input style ="background-color:black; color:white; font-size:17px" type="submit" value="Submit">
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


