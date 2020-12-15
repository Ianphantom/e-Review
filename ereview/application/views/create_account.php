<section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Create Account in Ereview</h2>
                  <br/>
                  <p style="color:red">
                  <?php echo $msg;?>
                  </p>
                </div>
                <form action="<?php echo base_url().'index.php/accountctl/creatingAccount';?>" method="post">
        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" id="nama" name="nama" width="100"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" id="username" name="username" width="100"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" id="katasandi" name="katasandi" width="100"></td>
            </tr>
            <tr>
                <td>surel</td>
                <td><input type="text" id="email" name="email" width="100"></td>
            </tr>
            <tr>
                <td>Peran:</td>
                <td>
                    <select id="peran" name="peran">
               <option value="1" >Editor</option>
               <option value="2" >Reviewer</option>
            </select>
         </td>
            </tr>
        </table>
	
	<input type="submit" value="Submit">
</form>
                </div>
              </div>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>
      
    </div>
  </section>


