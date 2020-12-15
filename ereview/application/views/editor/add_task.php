<section id="maincontent" style="background-color:#8bd5fc">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Add New Reviewing Task</h2>
                  <br/>
                  <p stlye="color:red">
                  <?php echo $error;?>
                  </p>
                </div>
                <p>
                  <strong>Please fill in data about the article that you would like to be reviewed!</strong>
                </p>
            <div align="center">
            <?php echo form_open_multipart(base_url().'index.php/editorctl/addingTask');?>
          <table>
            <tr>
                <td>Judul :</td>
                <td><input type="text" id="judul" name="judul" width="100" placeholder="Judul"></td>
            </tr>
            <tr>
                <td>Kata kunci :</td>
                <td><input type="text" id="katakunci" name="katakunci" width="100" placeholder="Katakunci"></td>
            </tr>
            <tr>
                <td>Jumlah Halaman :</td>
                <td><input type="text" id="Halaman" name="halaman" width="100" placeholder="Halaman"></td>
            </tr>
            <tr>
                <td>Authors :</td>
                <td><input type="text" id="authors" name="authors" width="100" placeholder="Authors"></td>
            </tr>
            <tr>
                <td>Article:</td>
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


